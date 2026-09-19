<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Visit Entity
 *
 * @property int $id
 * @property string $page_type
 * @property int|null $card_id
 * @property string $path
 * @property string|null $ip
 * @property string|null $user_agent
 * @property string|null $referer
 * @property \Cake\I18n\DateTime $created
 *
 * @property \App\Model\Entity\Card|null $card
 */
class Visit extends Entity
{
    protected array $_accessible = [
        'page_type' => true,
        'card_id' => true,
        'path' => true,
        'ip' => true,
        'user_agent' => true,
        'referer' => true,
        'created' => true,
        'card' => true,
    ];
}
