<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountPayment $accountPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountPayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountPayment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Account Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountPayments form large-9 medium-8 columns content">
    <?= $this->Form->create($accountPayment) ?>
    <fieldset>
        <legend><?= __('Edit Account Payment') ?></legend>
        <?php
            echo $this->Form->control('account_id', ['options' => $accounts]);
            echo $this->Form->hidden('contractor_id', ['options' => $contractors, 'empty' => true]);
            echo $this->Form->hidden('job_id', ['value'=>$accountPayment->job_id]);
            echo $this->Form->control('Order_ID', ['value'=>$accountPayment->order_id]);
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>