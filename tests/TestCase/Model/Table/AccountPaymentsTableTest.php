<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountPaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountPaymentsTable Test Case
 */
class AccountPaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountPaymentsTable
     */
    public $AccountPayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.account_payments',
        'app.accounts',
        'app.contractors',
        'app.jobs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AccountPayments') ? [] : ['className' => AccountPaymentsTable::class];
        $this->AccountPayments = TableRegistry::getTableLocator()->get('AccountPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountPayments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
