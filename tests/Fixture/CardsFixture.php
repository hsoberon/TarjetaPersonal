<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CardsFixture
 */
class CardsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'active' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'url' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'position' => 'Lorem ipsum dolor sit amet',
                'theme_id' => 1,
                'user_id' => 1,
                'created' => '2024-03-29 21:06:10',
                'modified' => '2024-03-29 21:06:10',
            ],
        ];
        parent::init();
    }
}
