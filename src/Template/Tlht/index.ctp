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
</style>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Importer'), ['controller'=>'Content','action' => 'index']) ?></li>
        <li><a href="/accountPayments/">Expense Payments</a></li>
        <li><a href="/roles/">Roles</a></li>
        <li><a href="/users/">Users</a></li>
    </ul>
</nav>
<div class="tlhtJobs index large-10 medium-9 columns content">
    <h3><?php echo __('Tlht Dashboard') ?></h3>
    <table cellpadding="0" cellspacing="0">
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

