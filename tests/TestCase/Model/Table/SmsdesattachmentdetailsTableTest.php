<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmsdesattachmentdetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmsdesattachmentdetailsTable Test Case
 */
class SmsdesattachmentdetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SmsdesattachmentdetailsTable
     */
    protected $Smsdesattachmentdetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Smsdesattachmentdetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Smsdesattachmentdetails') ? [] : ['className' => SmsdesattachmentdetailsTable::class];
        $this->Smsdesattachmentdetails = TableRegistry::getTableLocator()->get('Smsdesattachmentdetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Smsdesattachmentdetails);

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
