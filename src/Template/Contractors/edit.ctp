<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contractor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="contractors form large-9 medium-8 columns content">
    <?= $this->Form->create($contractor) ?>
    <fieldset>
        <legend><?= __('Edit Contractor') ?></legend>
        <?php
            echo $this->Form->text('technician_id');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('nickname');
            echo $this->Form->control('amazon_id');
            echo $this->Form->hidden('role_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
