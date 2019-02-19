<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payments view large-9 medium-8 columns content">
    <h3><?= h($payment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($payment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Type') ?></th>
            <td><?= h($payment->transaction_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order ID') ?></th>
            <td><?= h($payment->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Details') ?></th>
            <td><?= h($payment->product_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Product Charges') ?></th>
            <td><?= h($payment->total_product_charges) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Promotional Rebates') ?></th>
            <td><?= h($payment->total_promotional_rebates) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amazon Fees') ?></th>
            <td><?= h($payment->amazon_fees) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other') ?></th>
            <td><?= h($payment->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= h($payment->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
    </table>
</div>
