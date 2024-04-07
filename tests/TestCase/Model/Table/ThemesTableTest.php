<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThemesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThemesTable Test Case
 */
class ThemesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ThemesTable
     */
    protected $Themes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Themes',
        'app.Cards',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Themes') ? [] : ['className' => ThemesTable::class];
        $this->Themes = $this->getTableLocator()->get('Themes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Themes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ThemesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
