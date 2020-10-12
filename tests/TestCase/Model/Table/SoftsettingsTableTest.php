<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoftsettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoftsettingsTable Test Case
 */
class SoftsettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SoftsettingsTable
     */
    protected $Softsettings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Softsettings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Softsettings') ? [] : ['className' => SoftsettingsTable::class];
        $this->Softsettings = TableRegistry::getTableLocator()->get('Softsettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Softsettings);

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
