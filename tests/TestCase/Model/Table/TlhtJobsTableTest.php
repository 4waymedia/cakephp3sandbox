<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TlhtJobsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TlhtJobsTable Test Case
 */
class TlhtJobsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TlhtJobsTable
     */
    public $TlhtJobs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tlht_jobs',
        'app.service_orders',
        'app.jobs',
        'app.product_orders',
        'app.buyers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TlhtJobs') ? [] : ['className' => TlhtJobsTable::class];
        $this->TlhtJobs = TableRegistry::getTableLocator()->get('TlhtJobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TlhtJobs);

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
