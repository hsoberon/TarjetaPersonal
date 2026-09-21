<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Entity\Card;
use App\Model\Entity\CardLink;

/**
 * Builds a vCard 3.0 file from a card and its other links.
 */
class VCardBuilder
{
    public const TYPE_PHONE = 1;
    public const TYPE_EMAIL = 2;
    public const TYPE_WHATSAPP = 3;
    public const TYPE_CONTACT = 4;

    /**
     * @param list<string> $imageDirectories
     */
    public function __construct(private array $imageDirectories = [])
    {
        if ($this->imageDirectories === []) {
            $this->imageDirectories = [
                ROOT . DS . 'plugins' . DS . 'Modern' . DS . 'webroot' . DS . 'img',
                WWW_ROOT . 'img',
            ];
        }
    }

    public function filename(Card $card): string
    {
        $slug = strtolower(trim((string)$card->url));
        $slug = $slug !== '' ? $slug : 'contacto';

        return $slug . '.vcf';
    }

    public function hasContactLink(Card $card): bool
    {
        foreach ($this->links($card) as $link) {
            if ((int)$link->type_id === self::TYPE_CONTACT) {
                return true;
            }
        }

        return false;
    }

    public function build(Card $card): string
    {
        $links = $this->links($card);
        $fullName = $this->clean((string)$card->name);
        [$family, $given] = $this->nameParts($fullName);
        $title = $this->role($card);
        $note = $this->note($card, $title);

        $lines = [
            'BEGIN:VCARD',
            'VERSION:3.0',
            'PRODID:-//Tarjeta Personal//ES',
            'N:' . $this->escape($family) . ';' . $this->escape($given) . ';;;',
            'FN:' . $this->escape($fullName),
        ];

        if ($title !== '') {
            $lines[] = 'TITLE:' . $this->escape($title);
        }
        if ($note !== '') {
            $lines[] = 'NOTE:' . $this->escape($note);
        }

        $item = 1;
        foreach ($this->emails($links) as $index => $email) {
            $pref = $index === 0 ? ';type=pref' : '';
            $lines[] = 'item' . $item . '.EMAIL;type=INTERNET' . $pref . ':' . $this->escape($email);
            $item++;
        }

        foreach ($this->phones($links) as $index => $phone) {
            $types = $index === 0
                ? 'TEL;type=IPHONE;type=CELL;type=VOICE;type=pref:'
                : 'TEL;type=CELL;type=VOICE:';
            $lines[] = $types . $this->escape($phone);
        }

        foreach ($this->urls($links) as $urlLink) {
            $lines[] = 'item' . $item . '.URL:' . $this->escape($urlLink['url']);
            $lines[] = 'item' . $item . '.X-ABLabel:' . $this->escape($urlLink['label']);
            $item++;
        }

        $photo = $this->photoLine($card->image);
        if ($photo !== null) {
            $lines[] = $photo;
        }

        $lines[] = 'END:VCARD';

        return implode("\r\n", $lines) . "\r\n";
    }

    /**
     * Writes webroot/contacts/{url}.vcf when the card has a contact link.
     */
    public function store(Card $card, ?string $directory = null): ?string
    {
        if (!$this->hasContactLink($card)) {
            return null;
        }

        $dir = $directory ?? (WWW_ROOT . 'contacts');
        if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
            return null;
        }

        $path = $dir . DS . $this->filename($card);
        file_put_contents($path, $this->build($card));

        return $path;
    }

    /**
     * @return list<CardLink>
     */
    private function links(Card $card): array
    {
        $links = [];
        foreach ($card->card_links ?? [] as $link) {
            if (!$link instanceof CardLink || empty($link->active)) {
                continue;
            }
            $links[] = $link;
        }

        return $links;
    }

    /**
     * @return array{0: string, 1: string} Family name, given name.
     */
    private function nameParts(string $fullName): array
    {
        $fullName = trim($fullName);
        if ($fullName === '') {
            return ['', ''];
        }

        $parts = preg_split('/\s+/', $fullName) ?: [];
        if (count($parts) === 1) {
            return [$parts[0], ''];
        }

        $family = (string)array_pop($parts);

        return [$family, implode(' ', $parts)];
    }

    private function role(Card $card): string
    {
        $position = $this->clean((string)$card->position);
        if ($position !== '') {
            return $this->limit($position, 250);
        }

        return $this->limit($this->clean((string)$card->description), 250);
    }

    private function note(Card $card, string $title): string
    {
        $description = $this->clean((string)$card->description);
        if ($description === '' || $description === $title) {
            return '';
        }

        return $description;
    }

    /**
     * @param list<CardLink> $links
     * @return list<string>
     */
    private function emails(array $links): array
    {
        $emails = [];
        foreach ($links as $link) {
            if ((int)$link->type_id !== self::TYPE_EMAIL) {
                continue;
            }
            $email = trim((string)$link->content);
            if ($email === '' || !str_contains($email, '@')) {
                continue;
            }
            $emails[] = $email;
        }

        return $emails;
    }

    /**
     * @param list<CardLink> $links
     * @return list<string>
     */
    private function phones(array $links): array
    {
        $phones = [];
        $seen = [];

        $add = function (string $raw) use (&$phones, &$seen): void {
            $formatted = $this->formatPhone($raw);
            $digits = $this->digits($formatted);
            if ($formatted === '' || $digits === '' || isset($seen[$digits])) {
                return;
            }
            $seen[$digits] = true;
            $phones[] = $formatted;
        };

        foreach ($links as $link) {
            if ((int)$link->type_id === self::TYPE_PHONE) {
                $add($this->rawPhone($link));
            }
        }
        foreach ($links as $link) {
            if ((int)$link->type_id === self::TYPE_WHATSAPP) {
                $add($this->rawPhone($link));
            }
        }

        return $phones;
    }

    /**
     * @param list<CardLink> $links
     * @return list<array{url: string, label: string}>
     */
    private function urls(array $links): array
    {
        $urls = [];
        foreach ($links as $link) {
            $type = (int)$link->type_id;
            if (in_array($type, [self::TYPE_PHONE, self::TYPE_EMAIL, self::TYPE_CONTACT], true)) {
                continue;
            }

            $url = $this->linkUrl($link);
            if ($url === null) {
                continue;
            }

            $label = trim((string)$link->title);
            if ($label === '') {
                $label = $type === self::TYPE_WHATSAPP ? 'WhatsApp' : 'Enlace';
            }

            $urls[] = ['url' => $url, 'label' => $label];
        }

        return $urls;
    }

    private function linkUrl(CardLink $link): ?string
    {
        $url = trim((string)$link->url);
        $content = trim((string)$link->content);

        if ((int)$link->type_id === self::TYPE_WHATSAPP) {
            if ($this->isHttp($url)) {
                return $url;
            }
            $digits = $this->digits($content !== '' ? $content : $url);
            if ($digits === '') {
                return null;
            }

            return 'https://wa.me/' . $digits;
        }

        if ($this->isHttp($url)) {
            return $url;
        }

        return null;
    }

    private function rawPhone(CardLink $link): string
    {
        $content = trim((string)$link->content);
        if ($content !== '') {
            return $content;
        }

        return trim((string)$link->url);
    }

    public function formatPhone(string $raw): string
    {
        $digits = $this->digits($raw);
        if (str_starts_with($digits, '57') && strlen($digits) === 12) {
            $local = substr($digits, 2);

            return sprintf('+57(%s) %s-%s', substr($local, 0, 3), substr($local, 3, 3), substr($local, 6, 4));
        }
        if (strlen($digits) === 10) {
            return sprintf('+57(%s) %s-%s', substr($digits, 0, 3), substr($digits, 3, 3), substr($digits, 6, 4));
        }

        $trimmed = trim($raw);
        if ($trimmed === '' || $digits === '') {
            return '';
        }

        return $trimmed;
    }

    private function photoLine(mixed $filename): ?string
    {
        $path = $this->imagePath(is_string($filename) ? $filename : '');
        if ($path === null) {
            return null;
        }

        $bytes = $this->jpegBytes($path);
        if ($bytes === null) {
            return null;
        }

        return 'PHOTO;ENCODING=b;TYPE=JPEG:' . base64_encode($bytes);
    }

    private function imagePath(string $filename): ?string
    {
        $filename = basename($filename);
        if ($filename === '' || $filename === '.' || $filename === '..') {
            return null;
        }

        foreach ($this->imageDirectories as $directory) {
            $path = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $filename;
            if (is_file($path)) {
                return $path;
            }
        }

        return null;
    }

    private function jpegBytes(string $path): ?string
    {
        $info = @getimagesize($path);
        if ($info === false) {
            return null;
        }

        [$width, $height, $type] = $info;
        $max = 2000;
        $needsResize = $width > $max || $height > $max;
        if ($type === IMAGETYPE_JPEG && !$needsResize && (int)filesize($path) <= 450 * 1024) {
            $raw = file_get_contents($path);

            return $raw === false ? null : $raw;
        }

        $src = match ($type) {
            IMAGETYPE_JPEG => @imagecreatefromjpeg($path),
            IMAGETYPE_PNG => @imagecreatefrompng($path),
            IMAGETYPE_GIF => @imagecreatefromgif($path),
            IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false,
            default => false,
        };
        if (!$src) {
            return null;
        }

        $scale = min(1, $max / max($width, $height));
        $nw = max(1, (int)round($width * $scale));
        $nh = max(1, (int)round($height * $scale));
        $dst = imagecreatetruecolor($nw, $nh);
        $white = imagecolorallocate($dst, 255, 255, 255);
        imagefilledrectangle($dst, 0, 0, $nw, $nh, $white);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $width, $height);

        ob_start();
        imagejpeg($dst, null, 82);
        $bytes = ob_get_clean();
        imagedestroy($src);
        imagedestroy($dst);

        return is_string($bytes) && $bytes !== '' ? $bytes : null;
    }

    private function escape(string $value): string
    {
        return str_replace(
            ['\\', "\n", "\r", ';', ','],
            ['\\\\', '\n', '', '\;', '\,'],
            $value
        );
    }

    private function clean(string $value): string
    {
        $value = str_replace(["\r\n", "\r"], "\n", $value);
        $value = preg_replace("/[ \t]+/", ' ', $value) ?? $value;
        $value = preg_replace("/\n+/", ' ', $value) ?? $value;

        return trim($value);
    }

    private function limit(string $value, int $length): string
    {
        if (mb_strlen($value) <= $length) {
            return $value;
        }

        return rtrim(mb_substr($value, 0, $length - 1)) . '…';
    }

    private function digits(string $value): string
    {
        return preg_replace('/\D+/', '', $value) ?? '';
    }

    private function isHttp(string $url): bool
    {
        return (bool)preg_match('#^https?://#i', $url);
    }
}
