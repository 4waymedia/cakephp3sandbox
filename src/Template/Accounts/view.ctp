<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Account Payments'), ['controller' => 'AccountPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account Payment'), ['controller' => 'AccountPayments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accounts view large-9 medium-8 columns content">
    <h3><?= h($account->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($account->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($account->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($account->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Account Payments') ?></h4>
        <?php if (!empty($account->account_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Contractor Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Order ID') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->account_payments as $accountPayments): ?>
            <tr>
                <td><?= h($accountPayments->id) ?></td>
                <td><?= h($accountPayments->account_id) ?></td>
                <td><?= h($accountPayments->contractor_id) ?></td>
                <td><?= h($accountPayments->job_id) ?></td>
                <td><?= h($accountPayments->order_id) ?></td>
                <td><?= h($accountPayments->amount) ?></td>
                <td><?= h($accountPayments->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AccountPayments', 'action' => 'view', $accountPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AccountPayments', 'action' => 'edit', $accountPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccountPayments', 'action' => 'delete', $accountPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
