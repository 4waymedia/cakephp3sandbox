<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $business->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Businesses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pay Periods'), ['controller' => 'PayPeriods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Period'), ['controller' => 'PayPeriods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businesses form large-9 medium-8 columns content">
    <?= $this->Form->create($business) ?>
    <fieldset>
        <legend><?= __('Edit Business') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->hidden('first_pay_period_date');
            echo $this->Form->control('business_name');
            echo $this->Form->control('phone_number');
            echo $this->Form->control('address_1');
            echo $this->Form->control('address_2');
            echo $this->Form->control('city');
            echo $this->Form->control('state');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
