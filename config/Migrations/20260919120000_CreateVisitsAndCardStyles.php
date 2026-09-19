<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVisitsAndCardStyles extends AbstractMigration
{
    public function change(): void
    {
        $this->table('visits')
            ->addColumn('page_type', 'string', [
                'limit' => 50,
                'default' => 'home',
                'null' => false,
            ])
            ->addColumn('card_id', 'integer', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('path', 'string', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('ip', 'string', [
                'limit' => 45,
                'null' => true,
                'default' => null,
            ])
            ->addColumn('user_agent', 'string', [
                'limit' => 500,
                'null' => true,
                'default' => null,
            ])
            ->addColumn('referer', 'string', [
                'limit' => 500,
                'null' => true,
                'default' => null,
            ])
            ->addColumn('created', 'datetime', [
                'null' => false,
            ])
            ->addIndex(['card_id'])
            ->addIndex(['page_type'])
            ->addIndex(['created'])
            ->addForeignKey('card_id', 'cards', 'id', [
                'delete' => 'SET_NULL',
                'update' => 'CASCADE',
            ])
            ->create();

        $this->table('cards')
            ->addColumn('style_bg', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_grad_from', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_grad_to', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_card', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_heading', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_text', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_link', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('style_link_hover', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->update();
    }
}
