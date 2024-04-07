<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LinkTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LinkTypesTable Test Case
 */
class LinkTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LinkTypesTable
     */
    protected $LinkTypes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.LinkTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LinkTypes') ? [] : ['className' => LinkTypesTable::class];
        $this->LinkTypes = $this->getTableLocator()->get('LinkTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LinkTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LinkTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
