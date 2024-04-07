<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CardLink Entity
 *
 * @property int $id
 * @property int $active
 * @property int $card_id
 * @property int $type_id
 * @property int $priority
 * @property string|null $title
 * @property string|null $url
 * @property string|null $content
 * @property string|null $css
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\LinkType $link_type
 */
class CardLink extends Entity
{
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
        'card_id' => true,
        'type_id' => true,
        'priority' => true,
        'title' => true,
        'url' => true,
        'content' => true,
        'css' => true,
        'created' => true,
        'modified' => true,
        'link_type' => true,
    ];
}
