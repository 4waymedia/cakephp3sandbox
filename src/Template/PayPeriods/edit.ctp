<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod $payPeriod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payPeriod->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payPeriod->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pay Periods'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payPeriods form large-9 medium-8 columns content">
    <?= $this->Form->create($payPeriod) ?>
    <fieldset>
        <legend><?= __('Edit Pay Period') ?></legend>
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
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
