<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Edit Contractor'), ['action' => 'edit', $contractor->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Contractor'), ['action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('List Contractors'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Contractor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contractors view large-9 medium-8 columns content">
    <h3><?php echo h($contractor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Technician ID') ?></th>
            <td><?php echo h($contractor->technician_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('First Name') ?></th>
            <td><?php echo h($contractor->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Last Name') ?></th>
            <td><?php echo h($contractor->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Email') ?></th>
            <td><?php echo h($contractor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Nickname') ?></th>
            <td><?php echo h($contractor->nickname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Amazon Id') ?></th>
            <td><?php echo h($contractor->technician_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $this->Number->format($contractor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Role Id') ?></th>
            <td><?php echo $contractor['role']['name'] ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Created') ?></th>
            <td><?php echo h($contractor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Modified') ?></th>
            <td><?php echo h($contractor->modified) ?></td>
        </tr>
    </table>


    <div class="related">
        <h4><?php echo __('Related Payments') ?></h4>
        <?php if (!empty($contractor->account_payments)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?php echo __('Id') ?></th>
                    <th scope="col"><?php echo __('Account Id') ?></th>
                    <th scope="col"><?php echo __('Contractor Id') ?></th>
                    <th scope="col"><?php echo __('Job Id') ?></th>
                    <th scope="col"><?php echo __('Order ID') ?></th>
                    <th scope="col"><?php echo __('Amount') ?></th>
                    <th scope="col"><?php echo __('Name') ?></th>
                    <th scope="col" class="actions"><?php echo __('Actions') ?></th>
                </tr>
                <?php foreach ($contractor->account_payments as $accountPayments): ?>
                    <tr>
                        <td><?php echo h($accountPayments->id) ?></td>
                        <td><?php echo h($accountPayments->account_id) ?></td>
                        <td><?php echo h($accountPayments->contractor_id) ?></td>
                        <td><?php echo h($accountPayments->job_id) ?></td>
                        <td><?php echo h($accountPayments->order_id) ?></td>
                        <td><?php echo h($accountPayments->amount) ?></td>
                        <td><?php echo h($accountPayments->name) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), ['controller' => 'AccountPayments', 'action' => 'view', $accountPayments->id]) ?>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</div>

