<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessesUser $businessesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Businesses User'), ['action' => 'edit', $businessesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Businesses User'), ['action' => 'delete', $businessesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Businesses Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Businesses User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businessesUsers view large-9 medium-8 columns content">
    <h3><?= h($businessesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Business') ?></th>
            <td><?= $businessesUser->has('business') ? $this->Html->link($businessesUser->business->name, ['controller' => 'Businesses', 'action' => 'view', $businessesUser->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $businessesUser->has('user') ? $this->Html->link($businessesUser->user->id, ['controller' => 'Users', 'action' => 'view', $businessesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Business Name') ?></th>
            <td><?= h($businessesUser->business_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number') ?></th>
            <td><?= h($businessesUser->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address 1') ?></th>
            <td><?= h($businessesUser->address_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address 2') ?></th>
            <td><?= h($businessesUser->address_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($businessesUser->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($businessesUser->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($businessesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Pay Period Date') ?></th>
            <td><?= h($businessesUser->first_pay_period_date) ?></td>
        </tr>
    </table>
</div>
