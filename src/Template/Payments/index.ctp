<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payments index large-9 medium-8 columns content">
    <h3><?= __('Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Transaction_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Order_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Product_Details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total_product_charges') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total_promotional_rebates') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Amazon_fees') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?= $this->Number->format($payment->id) ?></td>
                <td><?= h($payment->Date) ?></td>
                <td><?= h($payment->Transaction_type) ?></td>
                <td><?= h($payment->Order_ID) ?></td>
                <td><?= h($payment->Product_Details) ?></td>
                <td><?= h($payment->Total_product_charges) ?></td>
                <td><?= h($payment->Total_promotional_rebates) ?></td>
                <td><?= h($payment->Amazon_fees) ?></td>
                <td><?= h($payment->Other) ?></td>
                <td><?= h($payment->Total) ?></td>
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
