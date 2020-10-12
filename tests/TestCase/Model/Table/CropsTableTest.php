<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CropsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CropsTable Test Case
 */
class CropsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CropsTable
     */
    protected $Crops;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Crops',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Crops') ? [] : ['className' => CropsTable::class];
        $this->Crops = TableRegistry::getTableLocator()->get('Crops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Crops);

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
