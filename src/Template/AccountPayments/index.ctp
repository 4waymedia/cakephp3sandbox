<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountPayment[]|\Cake\Collection\CollectionInterface $accountPayments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>

        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountPayments index large-9 medium-8 columns content">
    <h3><?= __('Account Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contractor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accountPayments as $accountPayment): ?>
            <tr>
                <td><?= $this->Number->format($accountPayment->id) ?></td>
                <td><?= $accountPayment->has('account') ? $this->Html->link($accountPayment->account->name, ['controller' => 'Accounts', 'action' => 'view', $accountPayment->account->id]) : '' ?></td>
                <td><?= $accountPayment->has('contractor') ? $this->Html->link($accountPayment->contractor->first_name, ['controller' => 'Contractors', 'action' => 'view', $accountPayment->contractor->id]) : '' ?></td>
                <td><?= $accountPayment->has('job') ? $this->Html->link($accountPayment->job->id, ['controller' => 'Jobs', 'action' => 'view', $accountPayment->job->id]) : '' ?></td>
                <td><?= h($accountPayment->order_id) ?></td>
                <td><?= $this->Number->format($accountPayment->amount) ?></td>
                <td><?= h($accountPayment->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accountPayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountPayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountPayment->id)]) ?>
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
