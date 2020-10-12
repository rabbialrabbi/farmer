<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmsdesattachmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmsdesattachmentTable Test Case
 */
class SmsdesattachmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SmsdesattachmentTable
     */
    protected $Smsdesattachment;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Smsdesattachment',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Smsdesattachment') ? [] : ['className' => SmsdesattachmentTable::class];
        $this->Smsdesattachment = TableRegistry::getTableLocator()->get('Smsdesattachment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Smsdesattachment);

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
