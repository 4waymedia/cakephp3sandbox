<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountPayment $accountPayment
 */
$contractor_pay = floor(100 * .8 * str_replace('$', '', $job['payments'][0]['total']))/100;
$techNote = false;

$assigned_contractor = array_search(explode(' ', $job['technician'])[1], $contractors);

// Count Payments to Contractors
$contractor_total = 0;
foreach($paymentsMade as $payment){
    $cells[] = array(
        $contractors[$payment['contractor_id']],
        $payment['amount'],
        $this->Number->toPercentage(($payment['amount'] / $contractor_pay)*100),
        ''
    );
    $contractor_total += $payment['amount'];
}

$payout = $contractor_pay - $contractor_total;
$net_total =$job['payments'][0]['total'] - $contractor_pay;

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Account Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountPayments form large-9 medium-8 columns content">
    <?= $this->Form->create($accountPayment) ?>
    <fieldset>
        <legend><?= __('Job Overview') ?></legend>

        <table>
            <tr>
                <thead>
                    <tr>
                        <th>Job Amount</th>
                        <th>Job Fee</th>
                        <th>Net Amount</th>
                        <th>Contractor Pay</th>
                        <th>Payout Total</th>
                        <th>NET Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $job['payments'][0]['total_product_charges']; ?></td>
                        <td><?php echo $job['payments'][0]['amazon_fees']; ?></td>
                        <td><?php echo $job['payments'][0]['total']; ?></td>
                        <td><?php echo $this->Number->currency($contractor_pay, 'USD'); ?></td>
                        <td><?php echo $this->Number->currency($contractor_total, 'USD'); ?></td>
                        <td><?php echo $this->Number->currency($net_total, 'USD'); ?></td>
                    </tr>
                </tbody>
            </tr>
        </table>

        <?php

        if(count($paymentsMade) > 0):
            $total = 0;
            echo $this->Html->tag('table', null, array('class'=>'table-striped table'));
            echo $this->Html->tableHeaders(
                array('Contractor', 'Pay Amount','Percent','Total'),
                array(),
                array('class'=>''));

            $cells[] = array('','',
                'Payout Percentage: ' . $this->Number->toPercentage(  $contractor_total / $job['payments'][0]['total'] * 100),
                'Total: ' .$this->Number->currency($contractor_total, 'USD'));

            echo $this->Html->tableCells($cells);
            echo $this->Html->tag('/table');

        endif;


            echo $this->Form->hidden('job_id', ['value'=>$job['id']]);
            echo $this->Form->control('account_id', ['options' => $accounts]);
            echo $this->Form->control('service_order_id', ['options'=>array($job['service_order_id'])]);

            if($techNote){
                //echo $this->Form->label('Contractor Not assigned');
            }

            echo $this->Form->control('contractor_id', ['options' => $contractors, 'default'=>$assigned_contractor]);

            echo $this->Form->control('amount', ['value'=>$payout]);
            echo $this->Form->control('confirmation_receipt');

            // Set Date Template
            $this->Form->setTemplates(['dateWidget' => '{{day}}{{month}}{{year}}']);
            echo $this->Form->control('date', ['type'=>'date']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
