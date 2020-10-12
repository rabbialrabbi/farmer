<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CyearTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CyearTable Test Case
 */
class CyearTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CyearTable
     */
    protected $Cyear;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Cyear',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cyear') ? [] : ['className' => CyearTable::class];
        $this->Cyear = TableRegistry::getTableLocator()->get('Cyear', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Cyear);

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
