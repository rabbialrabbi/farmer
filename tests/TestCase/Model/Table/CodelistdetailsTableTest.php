<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CodelistdetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CodelistdetailsTable Test Case
 */
class CodelistdetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CodelistdetailsTable
     */
    protected $Codelistdetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Codelistdetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Codelistdetails') ? [] : ['className' => CodelistdetailsTable::class];
        $this->Codelistdetails = TableRegistry::getTableLocator()->get('Codelistdetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Codelistdetails);

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
