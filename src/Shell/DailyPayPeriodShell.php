<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * DailyPayPeriodShell shell command.
 */
class DailyPayPeriodShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Jobs');
    }

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addOptions([
            'dry' => ['short' => 'd', 'help' => 'Dry run'],
            'process' => ['short' => 'p', 'help' => 'Process Pay Period']
        ]);

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {



        $this->out($this->OptionParser->help());
    }

    public function processPayPeriod(){

        // Count Jobs Task

        // Jobs Completed Task

        // Jobs Cancelled Task

        // Jobs Pending

        // Count Contractors Used Task

        // Jobs Profitability Task

    }

    public function processDaily(){

        // Get all business IDs for processing

        // Get Active Pay Period foreach Business

        // Process PayPeriod() foreach Business

        // if last DAY of PayPeriod -> Create NEW PayPeriod
            // Tally up last pay period
            // Notify Admin of Business with report
            // Send notice to Admin with Pay Period stats [completed, pending, payed, not payed etc]

    }
}
