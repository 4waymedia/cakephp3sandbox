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
            <td><?= h($payment->Date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Type') ?></th>
            <td><?= h($payment->Transaction_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order ID') ?></th>
            <td><?= h($payment->Order_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Details') ?></th>
            <td><?= h($payment->Product_Details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Product Charges') ?></th>
            <td><?= h($payment->Total_product_charges) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Promotional Rebates') ?></th>
            <td><?= h($payment->Total_promotional_rebates) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amazon Fees') ?></th>
            <td><?= h($payment->Amazon_fees) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other') ?></th>
            <td><?= h($payment->Other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= h($payment->Total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
    </table>
</div>
