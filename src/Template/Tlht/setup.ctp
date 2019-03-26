<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Import'), ['controller'=>'content','action' => 'index']) ?></li>
        <li><?php echo $this->Html->link(__('New Payment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payments index large-10 medium-9 columns content">
    <div>
    <?php echo $this->Form->create($userBusiness) ?>
    <fieldset>
        <legend><?php echo __('Edit Business Setup') ?></legend>
        <?php
        echo $this->Form->control('business_name');
        echo $this->Form->control('address_1');
        echo $this->Form->control('address_2');
        echo $this->Form->control('first_pay_period_date',['type'=>'date']);
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit')) ?>
    <?php echo $this->Form->end() ?>
    </div>

</div>
