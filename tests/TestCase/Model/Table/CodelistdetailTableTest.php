<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CodelistdetailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CodelistdetailTable Test Case
 */
class CodelistdetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CodelistdetailTable
     */
    protected $Codelistdetail;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Codelistdetail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Codelistdetail') ? [] : ['className' => CodelistdetailTable::class];
        $this->Codelistdetail = TableRegistry::getTableLocator()->get('Codelistdetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Codelistdetail);

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
