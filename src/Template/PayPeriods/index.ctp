<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod[]|\Cake\Collection\CollectionInterface $payPeriods
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pay Period'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payPeriods index large-10 medium-9 columns content">
    <h3><?= __('Pay Periods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractors_used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobs_completed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobs_cancelled') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobs_pending') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calculated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payPeriods as $payPeriod): ?>
            <tr>
                <td><?= h($payPeriod->start_date) ?></td>
                <td><?= h($payPeriod->end_date) ?></td>
                <td><?= $this->Number->format($payPeriod->contractors_used) ?></td>
                <td><?= $this->Number->format($payPeriod->jobs_completed) ?></td>
                <td><?= $this->Number->format($payPeriod->jobs_cancelled) ?></td>
                <td><?= $this->Number->format($payPeriod->jobs_pending) ?></td>
                <td><?= h($payPeriod->calculated) ?></td>
                <td><?= h($payPeriod->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payPeriod->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payPeriod->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payPeriod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payPeriod->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
