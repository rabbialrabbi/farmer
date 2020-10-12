<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CodelistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CodelistTable Test Case
 */
class CodelistTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CodelistTable
     */
    protected $Codelist;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Codelist',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Codelist') ? [] : ['className' => CodelistTable::class];
        $this->Codelist = TableRegistry::getTableLocator()->get('Codelist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Codelist);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
