<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CardLinksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CardLinksTable Test Case
 */
class CardLinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CardLinksTable
     */
    protected $CardLinks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CardLinks',
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
        $config = $this->getTableLocator()->exists('CardLinks') ? [] : ['className' => CardLinksTable::class];
        $this->CardLinks = $this->getTableLocator()->get('CardLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CardLinks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CardLinksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CardLinksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
