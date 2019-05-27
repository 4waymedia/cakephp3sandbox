<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payments view large-9 medium-8 columns content">
    <h3><?php echo h($payment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Date') ?></th>
            <td><?php echo h($payment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Transaction Type') ?></th>
            <td><?php echo h($payment->transaction_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Order ID') ?></th>
            <td><?php echo h($payment->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Product Details') ?></th>
            <td><?php echo h($payment->product_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Total Product Charges') ?></th>
            <td><?php echo h($payment->total_product_charges) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Total Promotional Rebates') ?></th>
            <td><?php echo h($payment->total_promotional_rebates) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Amazon Fees') ?></th>
            <td><?php echo h($payment->amazon_fees) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Other') ?></th>
            <td><?php echo h($payment->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Total') ?></th>
            <td><?php echo h($payment->total) ?></td>
        </tr>
    </table>
</div>
