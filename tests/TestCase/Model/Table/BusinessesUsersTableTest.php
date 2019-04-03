<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessesUsersTable Test Case
 */
class BusinessesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessesUsersTable
     */
    public $BusinessesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.businesses_users',
        'app.businesses',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BusinessesUsers') ? [] : ['className' => BusinessesUsersTable::class];
        $this->BusinessesUsers = TableRegistry::getTableLocator()->get('BusinessesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessesUsers);

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
