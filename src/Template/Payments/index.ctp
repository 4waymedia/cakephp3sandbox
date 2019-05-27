<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Import'), ['controller'=>'content','action' => 'index']) ?></li>
        <li><?php echo $this->Html->link(__('New Payment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payments index large-10 medium-9 columns content">
    <h3><?php echo __('Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?php echo $this->Paginator->sort('date') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('transaction_type') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('product_Details') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('total_product_charges') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('total_promotional_rebates') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('amazon_fees') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('other') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('total') ?></th>
                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>

                <td><?php echo h($payment->date) ?></td>
                <td><?php echo h($payment->transaction_type) ?></td>
                <td><?php echo h($payment->order_id) ?></td>
                <td><?php echo h($payment->product_Details) ?></td>
                <td><?php echo h($payment->total_product_charges) ?></td>
                <td><?php echo h($payment->total_promotional_rebates) ?></td>
                <td><?php echo h($payment->amazon_fees) ?></td>
                <td><?php echo h($payment->other) ?></td>
                <td><?php echo h($payment->total) ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                    <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>

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
