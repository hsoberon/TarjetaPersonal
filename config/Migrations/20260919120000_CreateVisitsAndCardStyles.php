<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVisitsAndCardStyles extends AbstractMigration
{
    public function up(): void
    {
        if (!$this->hasTable('visits')) {
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
        }

        $cards = $this->table('cards');
        $added = false;
        foreach ($this->styleColumns() as $name => $options) {
            if (!$cards->hasColumn($name)) {
                $cards->addColumn($name, 'string', $options);
                $added = true;
            }
        }
        if ($added) {
            $cards->update();
        }
    }

    public function down(): void
    {
        if ($this->hasTable('visits')) {
            $this->table('visits')->drop()->save();
        }

        $cards = $this->table('cards');
        $removed = false;
        foreach (array_keys($this->styleColumns()) as $name) {
            if ($cards->hasColumn($name)) {
                $cards->removeColumn($name);
                $removed = true;
            }
        }
        if ($removed) {
            $cards->update();
        }
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function styleColumns(): array
    {
        $options = ['limit' => 50, 'null' => true, 'default' => null];

        return [
            'style_bg' => $options,
            'style_grad_from' => $options,
            'style_grad_to' => $options,
            'style_card' => $options,
            'style_heading' => $options,
            'style_text' => $options,
            'style_link' => $options,
            'style_link_hover' => $options,
        ];
    }
}
