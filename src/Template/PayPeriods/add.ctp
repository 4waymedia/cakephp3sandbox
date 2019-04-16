<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod $payPeriod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('List Pay Periods'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payPeriods form large-9 medium-8 columns content">
    <?php echo $this->Form->create($payPeriod) ?>
    <fieldset>
        <legend><?php echo __('Add Pay Period') ?></legend>
        <?php
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('contractors_used');
            echo $this->Form->control('jobs_completed');
            echo $this->Form->control('jobs_cancelled');
            echo $this->Form->control('jobs_pending');
            echo $this->Form->control('calculated');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit')) ?>
    <?php echo $this->Form->end() ?>
</div>
