<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod $payPeriod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Edit Pay Period'), ['action' => 'edit', $payPeriod->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Pay Period'), ['action' => 'delete', $payPeriod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payPeriod->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('List Pay Periods'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Pay Period'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payPeriods view large-9 medium-8 columns content">
    <h3><?php echo h($payPeriod->start_date) . ' - '. h($payPeriod->end_date) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $payPeriod->id ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Status') ?></th>
            <td><?php echo h($payPeriod->status) ?></td>
        </tr>

        <tr>
            <th scope="row"><?php echo __('Contractors Used') ?></th>
            <td><?php echo $this->Number->format($payPeriod->contractors_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Jobs Completed') ?></th>
            <td><?php echo $this->Number->format($payPeriod->jobs_completed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Jobs Cancelled') ?></th>
            <td><?php echo $this->Number->format($payPeriod->jobs_cancelled) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Jobs Pending') ?></th>
            <td><?php echo $this->Number->format($payPeriod->jobs_pending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Calculated') ?></th>
            <td><?php echo h($payPeriod->calculated) ?></td>
        </tr>

    </table>
    <h3><?php echo h('Jobs'); ?></h3>
    <table>
        <thead>
        <tr>
            <th scope="col"><?php echo $this->Paginator->sort('appointment_date'); ?></th>
            <th scope="col"><?php echo $this->Paginator->sort('technician'); ?></th>
            <th scope="col"><?php echo $this->Paginator->sort('service_order_id'); ?></th>
            <th scope="col">Net</th>
            <th>Expense(s)</th>
            <th>Profit</th>
            <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job):
            $profit = 0;
            ?>
            <tr>

                <td><?php echo h($job->appointment_date); ?></td>
                <td><?php echo explode('-', $job->technician)[0]; ?></td>
                <td><?php echo $job->service_order_id; ?></td>
                <td>
                    <?php if(!empty($job['payments'])){?>

                        <?php foreach($job['payments'] as $payment):
                            $profit += str_replace('$', '', $payment->total);

                            ?>
                            <div><?php echo $payment->total;?></div>
                        <?php endforeach; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if(!empty($job['account_payments'])) {
                        $payments_total = 0;
                        foreach ($job['account_payments'] as $payment):
                            $payments_total += $payment->amount;
                        endforeach;
                        $profit = $profit - $payments_total;
                        echo '$' . $payments_total;
                    }

                    ?>
                </td>
                <?php $class = $profit < 0 ? 'danger': ''; ?>
                <td ><div class="<?php echo $class; ?>"><?php echo $profit;?></div></td>


                <td class="actions">
                    <?php echo  $this->Html->link(__('View'), ['controller'=>'jobs', 'action' => 'view', $job->id]) ?>
                    <?php if(!empty($job['payments'])){echo ' | ' .$this->Html->link(__('Make Payment'), ['controller'=>'account-payments', 'action' => 'add', $job->id]);}  ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
