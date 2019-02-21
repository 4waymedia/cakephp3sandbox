<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Import'), ['controller'=>'content','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payments index large-10 medium-9 columns content">
    <h3><?= __('Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_Details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_product_charges') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_promotional_rebates') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amazon_fees') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>

                <td><?= h($payment->date) ?></td>
                <td><?= h($payment->transaction_type) ?></td>
                <td><?= h($payment->order_id) ?></td>
                <td><?= h($payment->product_Details) ?></td>
                <td><?= h($payment->total_product_charges) ?></td>
                <td><?= h($payment->total_promotional_rebates) ?></td>
                <td><?= h($payment->amazon_fees) ?></td>
                <td><?= h($payment->other) ?></td>
                <td><?= h($payment->total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
