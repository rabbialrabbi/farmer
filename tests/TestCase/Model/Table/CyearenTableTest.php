<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CyearenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CyearenTable Test Case
 */
class CyearenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CyearenTable
     */
    protected $Cyearen;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Cyearen',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cyearen') ? [] : ['className' => CyearenTable::class];
        $this->Cyearen = TableRegistry::getTableLocator()->get('Cyearen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Cyearen);

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
