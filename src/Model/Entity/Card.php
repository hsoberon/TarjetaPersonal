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
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Theme $theme
 * @property \App\Model\Entity\User $user
 */
class Card extends Entity
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
        'name' => true,
        'image' => true,
        'url' => true,
        'description' => true,
        'position' => true,
        'theme_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'theme' => true,
        'user' => true,
    ];
}
