<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?php echo $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?php echo h($role->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Name') ?></th>
            <td><?php echo h($role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $this->Number->format($role->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?php echo __('Related Contractors') ?></h4>
        <?php if (!empty($role->contractors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?php echo __('Id') ?></th>
                <th scope="col"><?php echo __('First Name') ?></th>
                <th scope="col"><?php echo __('Last Name') ?></th>
                <th scope="col"><?php echo __('Email') ?></th>
                <th scope="col"><?php echo __('Nickname') ?></th>
                <th scope="col"><?php echo __('Technician Id') ?></th>
                <th scope="col"><?php echo __('Role Id') ?></th>
                <th scope="col"><?php echo __('Created') ?></th>
                <th scope="col"><?php echo __('Modified') ?></th>
                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
            <?php foreach ($role->contractors as $contractors): ?>
            <tr>
                <td><?php echo h($contractors->id) ?></td>
                <td><?php echo h($contractors->first_name) ?></td>
                <td><?php echo h($contractors->last_name) ?></td>
                <td><?php echo h($contractors->email) ?></td>
                <td><?php echo h($contractors->nickname) ?></td>
                <td><?php echo h($contractors->technician_id) ?></td>
                <td><?php echo h($contractors->role_id) ?></td>
                <td><?php echo h($contractors->created) ?></td>
                <td><?php echo h($contractors->modified) ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['controller' => 'Contractors', 'action' => 'view', $contractors->id]) ?>
                    <?php echo $this->Html->link(__('Edit'), ['controller' => 'Contractors', 'action' => 'edit', $contractors->id]) ?>
                    <?php echo $this->Form->postLink(__('Delete'), ['controller' => 'Contractors', 'action' => 'delete', $contractors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
