<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TlhtJob[]|\Cake\Collection\CollectionInterface $tlhtJobs
 */
?>
<style>
    .danger {
        color:red;
        font-weight: bold;
    }
    .red{
        background-color: #ffd2d2 !important;
        border-top: 2px solid red;
    }

</style>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Importer'), ['controller'=>'Content','action' => 'index']) ?></li>
        <li><a href="/businesses/">My Business</a></li>
        <li><a href="/accountPayments/">Expense Payments</a></li>
        <li><a href="/jobs/">Jobs</a></li>
        <li><a href="/payments/">Payments</a></li>
        <li><a href="/contractors/">Contractors</a></li>
        <li><a href="/tlht/reports">Reports</a></li>
    </ul>
</nav>

<div class="tlhtJobs index large-10 medium-9 columns content">
    <div class="box no-shadow ">
        <div class="box-header bg-transparent">
            <!-- tools box -->
            <div class="pull-right box-tools"> <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                                    </span> <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                                    </span> </div>
            <h3 class="box-title"><i class="ti-view-list"></i>
                <?php echo $this->Html->link('Pay Periods', ['controller' => 'pay_periods', 'action' => 'index', '_full' => true]);?>
            </h3> </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- modal -->
            <div class="row">
                <div class="large-3 columns">

                    <p><strong><?php echo $payPeriod->start_date . ' - ' . $payPeriod->end_date; ?></strong> </p>
                    <p>These are your active Pay Periods. You can change the status if needed.</p>
                </div>
                <div class="large-9 columns">
                    <table cellpadding="0" cellspacing="0">
                        <?php

                        echo $this->Html->tableHeaders(['Ends', 'Status', 'Completed', 'Cancelled', 'Pending', 'Payment(s)']);

                            echo $this->Html->tableCells([
                                [
                                    $payPeriod->end_date,
                                    $payPeriod->status,
                                    $payPeriod->jobs_completed,
                                    $payPeriod->jobs_cancelled,
                                    $payPeriod->jobs_pending,
                                    $this->Html->link('PAY', ['controller'=>'payments', 'action' => 'auto', $payPeriod->id])
                                ]
                            ]);
                        ?>
                    </table>
                </div>
            </div>
            <!-- end Modal -->
        </div>
        <!-- /.box-body -->
    </div>
    <div>

    <h3><?php echo __('Current Pay Period') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?php echo $this->Paginator->sort('appointment_date', 'Date'); ?></th>
            <th scope="col"><?php echo $this->Paginator->sort('technician'); ?></th>
            <th scope="col"><?php echo $this->Paginator->sort('service_order_id', 'Service ID'); ?></th>
            <th>Status</th>
            <th scope="col">Net</th>
            <th>Expense(s)</th>
            <th>Profit</th>
            <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job) {
            $row_class = '';
            // Check for payment on completed job
            if($job->job_status == 'COMPLETED'){
                $row_class = count($job['payments']) < 1 ? 'red': '';
            }

            $profit = 0;
            ?>
            <tr class="<?php echo $row_class;?>" id="job-id<?php echo $job->id;?>">
                <td><?php echo h($job->appointment_date); ?></td>
                <td><?php echo explode('-', $job->technician)[0]; ?></td>
                <td><?php echo  $this->Html->link($job->service_order_id, ['controller'=>'jobs', 'action' => 'view', $job->id]) ?></td>
                <td><?php echo $job->job_status; ?></td>
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
                    <?php if(!empty($job['payments'])){echo $this->Html->link(__('Make Payment'), ['controller'=>'account-payments', 'action' => 'add', $job->id]);}  ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('first')) ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
            <?php echo $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?php echo $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    </div>
</div>

