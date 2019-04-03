<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessesUser $businessesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Businesses Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($businessesUser) ?>
    <fieldset>
        <legend><?= __('Add Businesses User') ?></legend>
        <?php
            echo $this->Form->control('business_id', ['options' => $businesses, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('first_pay_period_date', ['empty' => true]);
            echo $this->Form->control('business_name');
            echo $this->Form->control('phone_number');
            echo $this->Form->control('address_1');
            echo $this->Form->control('address_2');
            echo $this->Form->control('city');
            echo $this->Form->control('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
