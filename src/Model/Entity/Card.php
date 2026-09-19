<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property int $active
 * @property string $name
 * @property string|null $image
 * @property string $url
 * @property string|null $description
 * @property string|null $position
 * @property int $theme_id
 * @property int $user_id
 * @property string|null $style_bg
 * @property string|null $style_grad_from
 * @property string|null $style_grad_to
 * @property string|null $style_card
 * @property string|null $style_heading
 * @property string|null $style_text
 * @property string|null $style_link
 * @property string|null $style_link_hover
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Theme $theme
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CardLink[] $card_links
 * @property \App\Model\Entity\Visit[] $visits
 */
class Card extends Entity
{
    public const DEFAULT_STYLES = [
        'style_bg' => '#1f253d',
        'style_grad_from' => '#05abe0',
        'style_grad_to' => '#da7bff',
        'style_card' => '#000000',
        'style_heading' => '#ffffff',
        'style_text' => '#6bf8ff',
        'style_link' => '#ffffff',
        'style_link_hover' => '#6bf8ff',
    ];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'active' => true,
        'name' => true,
        'image' => true,
        'url' => true,
        'description' => true,
        'position' => true,
        'theme_id' => true,
        'user_id' => true,
        'style_bg' => true,
        'style_grad_from' => true,
        'style_grad_to' => true,
        'style_card' => true,
        'style_heading' => true,
        'style_text' => true,
        'style_link' => true,
        'style_link_hover' => true,
        'created' => true,
        'modified' => true,
        'theme' => true,
        'user' => true,
        'card_links' => true,
        'visits' => true,
    ];

    public function styleValue(string $field): string
    {
        $value = $this->get($field);

        return $value ? (string)$value : (self::DEFAULT_STYLES[$field] ?? '');
    }

    public function backgroundGradient(): string
    {
        return sprintf(
            'linear-gradient(121deg, %s, %s)',
            $this->styleValue('style_grad_from'),
            $this->styleValue('style_grad_to')
        );
    }

    public function cardBackground(): string
    {
        $hex = $this->styleValue('style_card');
        if (strcasecmp($hex, '#000000') === 0) {
            return 'rgba(0, 0, 0, 0.28)';
        }

        return $hex;
    }
}
