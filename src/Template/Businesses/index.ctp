<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business[]|\Cake\Collection\CollectionInterface $businesses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Business'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Periods'), ['controller' => 'PayPeriods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Period'), ['controller' => 'PayPeriods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businesses index large-9 medium-8 columns content">
    <h3><?= __('Businesses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
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
            <?php foreach ($businesses as $business): ?>
            <tr>
                <td><?= $this->Number->format($business->id) ?></td>
                <td><?= $this->Number->format($business->user_id) ?></td>
                <td><?= h($business->first_pay_period_date) ?></td>
                <td><?= h($business->business_name) ?></td>
                <td><?= h($business->phone_number) ?></td>
                <td><?= h($business->address_1) ?></td>
                <td><?= h($business->address_2) ?></td>
                <td><?= h($business->city) ?></td>
                <td><?= h($business->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $business->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $business->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?>
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
