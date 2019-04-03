<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessesUser[]|\Cake\Collection\CollectionInterface $businessesUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Businesses User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessesUsers index large-9 medium-8 columns content">
    <h3><?= __('Businesses Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_pay_period_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessesUsers as $businessesUser): ?>
            <tr>
                <td><?= $this->Number->format($businessesUser->id) ?></td>
                <td><?= $businessesUser->has('business') ? $this->Html->link($businessesUser->business->name, ['controller' => 'Businesses', 'action' => 'view', $businessesUser->business->id]) : '' ?></td>
                <td><?= $businessesUser->has('user') ? $this->Html->link($businessesUser->user->id, ['controller' => 'Users', 'action' => 'view', $businessesUser->user->id]) : '' ?></td>
                <td><?= h($businessesUser->first_pay_period_date) ?></td>
                <td><?= h($businessesUser->business_name) ?></td>
                <td><?= h($businessesUser->phone_number) ?></td>
                <td><?= h($businessesUser->address_1) ?></td>
                <td><?= h($businessesUser->address_2) ?></td>
                <td><?= h($businessesUser->city) ?></td>
                <td><?= h($businessesUser->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessesUser->id)]) ?>
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
