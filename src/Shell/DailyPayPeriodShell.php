<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * DailyPayPeriodShell shell command.
 */
class DailyPayPeriodShell extends Shell
{

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

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {

        // get current PayPeriod by todays Date

        // if NONE, create new pay period

            // Tally up last pay period

            // Send notice to Admin with Pay Period stats [completed, pending, payed, not payed etc]

        // for PayPeriod get all jobs within dates

        // Create NEW stats

        // compare changes between entity stats, and NEW stats

        // save stats to PayPeriod

        // notify admin of changes

        $this->out($this->OptionParser->help());
    }
}
