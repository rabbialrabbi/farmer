<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmsdesattachmentdetailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmsdesattachmentdetailTable Test Case
 */
class SmsdesattachmentdetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SmsdesattachmentdetailTable
     */
    protected $Smsdesattachmentdetail;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Smsdesattachmentdetail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Smsdesattachmentdetail') ? [] : ['className' => SmsdesattachmentdetailTable::class];
        $this->Smsdesattachmentdetail = TableRegistry::getTableLocator()->get('Smsdesattachmentdetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Smsdesattachmentdetail);

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
