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
        <h4>Jobs</h4>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">First Job</th>
                <th scope="col">Last Job</th>
                <th scope="col">Job Count</th>
                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $jobs['first']['appointment_date']; ?></td>
                <td><?php echo $jobs['last']['appointment_date']; ?></td>
                <td><?php echo $jobs['count']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h4>Payments</h4>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>

                <th scope="col">First Payment</th>
                <th scope="col">Last Payment</th>
                <th scope="col">Payment Count</th>

                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $payments['first']['date']; ?></td>
                <td><?php echo $payments['last']['date']; ?></td>
                <td><?php echo $payments['count']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
