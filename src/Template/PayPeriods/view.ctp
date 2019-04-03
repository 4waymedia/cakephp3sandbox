<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod $payPeriod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Period'), ['action' => 'edit', $payPeriod->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Period'), ['action' => 'delete', $payPeriod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payPeriod->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Periods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Period'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payPeriods view large-9 medium-8 columns content">
    <h3><?= h($payPeriod->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($payPeriod->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payPeriod->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contractors Used') ?></th>
            <td><?= $this->Number->format($payPeriod->contractors_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Jobs Completed') ?></th>
            <td><?= $this->Number->format($payPeriod->jobs_completed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Jobs Cancelled') ?></th>
            <td><?= $this->Number->format($payPeriod->jobs_cancelled) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Jobs Pending') ?></th>
            <td><?= $this->Number->format($payPeriod->jobs_pending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($payPeriod->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($payPeriod->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calculated') ?></th>
            <td><?= h($payPeriod->calculated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($payPeriod->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($payPeriod->modified) ?></td>
        </tr>
    </table>
</div>
