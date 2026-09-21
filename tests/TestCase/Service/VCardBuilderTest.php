<?php
declare(strict_types=1);

namespace App\Test\TestCase\Service;

use App\Model\Entity\Card;
use App\Model\Entity\CardLink;
use App\Service\VCardBuilder;
use Cake\TestSuite\TestCase;

class VCardBuilderTest extends TestCase
{
    public function testBuildUsesCardAndOtherLinks(): void
    {
        $builder = new VCardBuilder([sys_get_temp_dir()]);
        $card = $this->card();

        $vcf = $builder->build($card);
        $lines = explode("\r\n", trim($vcf));

        $this->assertSame('BEGIN:VCARD', $lines[0]);
        $this->assertSame('VERSION:3.0', $lines[1]);
        $this->assertSame('PRODID:-//Tarjeta Personal//ES', $lines[2]);
        $this->assertSame('N:Gomez;Karina;;;', $lines[3]);
        $this->assertSame('FN:Karina Gomez', $lines[4]);
        $this->assertSame('TITLE:Líder Financiera', $lines[5]);
        $this->assertContains('item1.EMAIL;type=INTERNET;type=pref:karina.gomez208@gmail.com', $lines);
        $this->assertContains('TEL;type=IPHONE;type=CELL;type=VOICE;type=pref:+57(301) 433-9430', $lines);
        $this->assertContains('item2.URL:https://wa.me/573014339430', $lines);
        $this->assertContains('item2.X-ABLabel:WhatsApp', $lines);
        $this->assertContains('item3.URL:https://instagram.com/karina', $lines);
        $this->assertContains('item3.X-ABLabel:Instagram', $lines);
        $this->assertSame('END:VCARD', $lines[array_key_last($lines)]);
        $this->assertNotContains('PHOTO;ENCODING=b;TYPE=JPEG:', $lines);
    }

    public function testPhoneIsNotDuplicatedWhenWhatsappMatches(): void
    {
        $builder = new VCardBuilder([sys_get_temp_dir()]);
        $vcf = $builder->build($this->card());

        $this->assertSame(1, substr_count($vcf, 'TEL;'));
    }

    public function testInactiveLinksAreSkipped(): void
    {
        $builder = new VCardBuilder([sys_get_temp_dir()]);
        $card = $this->card();
        $card->card_links[] = new CardLink([
            'active' => 0,
            'type_id' => VCardBuilder::TYPE_EMAIL,
            'title' => 'Otro',
            'content' => 'otro@example.com',
        ]);

        $vcf = $builder->build($card);

        $this->assertStringNotContainsString('otro@example.com', $vcf);
    }

    public function testFormatColombianMobile(): void
    {
        $builder = new VCardBuilder();

        $this->assertSame('+57(301) 433-9430', $builder->formatPhone('+573014339430'));
        $this->assertSame('+57(301) 433-9430', $builder->formatPhone('3014339430'));
    }

    public function testStoreWritesFileWhenContactLinkExists(): void
    {
        $dir = sys_get_temp_dir() . DS . 'vcf-store-' . uniqid();
        mkdir($dir);
        $builder = new VCardBuilder([sys_get_temp_dir()]);
        $path = $builder->store($this->card(), $dir);

        $this->assertNotNull($path);
        $this->assertSame($dir . DS . 'karina-gomez.vcf', $path);
        $this->assertStringContainsString('FN:Karina Gomez', (string)file_get_contents($path));

        unlink($path);
        rmdir($dir);
    }

    private function card(): Card
    {
        return new Card([
            'name' => 'Karina Gomez',
            'url' => 'karina-gomez',
            'description' => 'Líder Financiera',
            'image' => null,
            'card_links' => [
                new CardLink([
                    'active' => 1,
                    'type_id' => VCardBuilder::TYPE_PHONE,
                    'title' => 'Llamar',
                    'content' => '+573014339430',
                ]),
                new CardLink([
                    'active' => 1,
                    'type_id' => VCardBuilder::TYPE_EMAIL,
                    'title' => 'Correo',
                    'content' => 'karina.gomez208@gmail.com',
                ]),
                new CardLink([
                    'active' => 1,
                    'type_id' => VCardBuilder::TYPE_WHATSAPP,
                    'title' => 'WhatsApp',
                    'content' => '+573014339430',
                ]),
                new CardLink([
                    'active' => 1,
                    'type_id' => 5,
                    'title' => 'Instagram',
                    'url' => 'https://instagram.com/karina',
                ]),
                new CardLink([
                    'active' => 1,
                    'type_id' => VCardBuilder::TYPE_CONTACT,
                    'title' => 'Generar contacto',
                ]),
            ],
        ]);
    }
}
