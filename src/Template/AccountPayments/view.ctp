<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountPayment $accountPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(__('Delete Account Payment'), ['action' => 'delete', $accountPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountPayment->id)]) ?> </li>

    </ul>
</nav>
<div class="accountPayments view large-9 medium-8 columns content">
    <h3><?= h($accountPayment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $accountPayment->has('account') ? $this->Html->link($accountPayment->account->name, ['controller' => 'Accounts', 'action' => 'view', $accountPayment->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contractor') ?></th>
            <td><?= $accountPayment->has('contractor') ? $this->Html->link($accountPayment->contractor->id, ['controller' => 'Contractors', 'action' => 'view', $accountPayment->contractor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $accountPayment->has('job') ? $this->Html->link($accountPayment->job->id, ['controller' => 'Jobs', 'action' => 'view', $accountPayment->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order ID') ?></th>
            <td><?= h($accountPayment->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($accountPayment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accountPayment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($accountPayment->amount) ?></td>
        </tr>
    </table>
</div>
