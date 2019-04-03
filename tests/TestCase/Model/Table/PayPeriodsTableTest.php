<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayPeriodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayPeriodsTable Test Case
 */
class PayPeriodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayPeriodsTable
     */
    public $PayPeriods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_periods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PayPeriods') ? [] : ['className' => PayPeriodsTable::class];
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayPeriods);

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
}
