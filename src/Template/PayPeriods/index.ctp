<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod[]|\Cake\Collection\CollectionInterface $payPeriods
 */

?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('New Pay Period'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payPeriods index large-10 medium-9 columns content">
    <h3><?php echo __('Pay Periods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Process</th>
                <th scope="col"><?php echo $this->Paginator->sort('start_date', ['label'=>'Dates']) ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('contractors_used', ['label'=>'Techs']) ?></th>
                <th scope="col">Payments</th>
                <th scope="col"><?php echo $this->Paginator->sort('jobs_completed', ['label'=>'Completed']) ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('jobs_cancelled', ['label'=>'Cancelled']) ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('jobs_pending', ['label'=>'Pending']); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('calculated') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payPeriods as $payPeriod):
                $class = ($payPeriod->id == $pay_period_id) ? 'updated': '';

                ?>
            <tr class="<?php echo $class; ?>">
                <td><?php echo $this->Html->link(__('> RUN >'), ['action' => 'generateStats', $payPeriod->id], ['class'=>'']) ?></td>
                <td><?php echo h($payPeriod->start_date . ' - ' . $payPeriod->end_date) ?></td>
                <td><?php echo $this->Number->format($payPeriod->contractors_used) ?></td>
                <td><?php echo $this->Number->format($payPeriod->job_payments) ?></td>
                <td><?php echo $this->Number->format($payPeriod->jobs_completed) ?></td>
                <td><?php echo $this->Number->format($payPeriod->jobs_cancelled) ?></td>
                <td><?php echo $this->Number->format($payPeriod->jobs_pending) ?></td>
                <td><?php echo h($payPeriod->calculated) ?></td>
                <td><?php echo h($payPeriod->status) ?></td>
                <td class="actions">
                    <button class="dropdown button" type="button" data-toggle="drop-<?php echo $payPeriod->id; ?>">Actions</button>
                    <div class="dropdown-pane" id="drop-<?php echo $payPeriod->id; ?>" data-dropdown data-auto-focus="true">
                        <?php echo $this->Html->link(__('Auto Pay'), ['controller'=>'payments','action' => 'auto', $payPeriod->id]) ?><br>
                        <?php echo $this->Html->link(__('View'), ['action' => 'view', $payPeriod->id]) ?><br>
                        <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $payPeriod->id]) ?><br>
                        <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $payPeriod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payPeriod->id)]) ?><br>
                    </div>

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
</div>
