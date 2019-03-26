<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business'), ['action' => 'edit', $business->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pay Periods'), ['controller' => 'PayPeriods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Period'), ['controller' => 'PayPeriods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businesses view large-9 medium-8 columns content">
    <h3><?= h($business->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Business Name') ?></th>
            <td><?= h($business->business_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number') ?></th>
            <td><?= h($business->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address 1') ?></th>
            <td><?= h($business->address_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address 2') ?></th>
            <td><?= h($business->address_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($business->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($business->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($business->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($business->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Pay Period Date') ?></th>
            <td><?= h($business->first_pay_period_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($business->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($business->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pay Periods') ?></h4>
        <?php if (!empty($business->pay_periods)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Business Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Contractors Used') ?></th>
                <th scope="col"><?= __('Jobs Completed') ?></th>
                <th scope="col"><?= __('Jobs Cancelled') ?></th>
                <th scope="col"><?= __('Jobs Pending') ?></th>
                <th scope="col"><?= __('Calculated') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('User Modified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($business->pay_periods as $payPeriods): ?>
            <tr>
                <td><?= h($payPeriods->id) ?></td>
                <td><?= h($payPeriods->business_id) ?></td>
                <td><?= h($payPeriods->start_date) ?></td>
                <td><?= h($payPeriods->end_date) ?></td>
                <td><?= h($payPeriods->contractors_used) ?></td>
                <td><?= h($payPeriods->jobs_completed) ?></td>
                <td><?= h($payPeriods->jobs_cancelled) ?></td>
                <td><?= h($payPeriods->jobs_pending) ?></td>
                <td><?= h($payPeriods->calculated) ?></td>
                <td><?= h($payPeriods->status) ?></td>
                <td><?= h($payPeriods->user_modified) ?></td>
                <td><?= h($payPeriods->created) ?></td>
                <td><?= h($payPeriods->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PayPeriods', 'action' => 'view', $payPeriods->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PayPeriods', 'action' => 'edit', $payPeriods->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PayPeriods', 'action' => 'delete', $payPeriods->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payPeriods->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
