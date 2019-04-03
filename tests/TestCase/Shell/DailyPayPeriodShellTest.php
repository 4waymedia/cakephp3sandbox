<?php
namespace App\Test\TestCase\Shell;

use App\Shell\DailyPayPeriodShell;
use Cake\TestSuite\ConsoleIntegrationTestCase;

/**
 * App\Shell\DailyPayPeriodShell Test Case
 */
class DailyPayPeriodShellTest extends ConsoleIntegrationTestCase
{

    /**
     * ConsoleIo mock
     *
     * @var \Cake\Console\ConsoleIo|\PHPUnit_Framework_MockObject_MockObject
     */
    public $io;

    /**
     * Test subject
     *
     * @var \App\Shell\DailyPayPeriodShell
     */
    public $DailyPayPeriodShell;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMockBuilder('Cake\Console\ConsoleIo')->getMock();
        $this->DailyPayPeriodShell = new DailyPayPeriodShell($this->io);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DailyPayPeriodShell);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
