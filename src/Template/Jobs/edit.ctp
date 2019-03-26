<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]
            )
        ?></li>
        <li><?php echo $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
        <li><?php echo $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?php echo $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs form large-9 medium-8 columns content">
    <?php echo $this->Form->create($job) ?>
    <fieldset>
        <legend><?php echo __('Edit Job') ?></legend>
        <?php
            echo $this->Form->control('order_created_time');
            echo $this->Form->control('service_order_id');
            echo $this->Form->control('job_id');
            echo $this->Form->control('service_asin');
            echo $this->Form->control('job_name');
            echo $this->Form->control('job_status');
            echo $this->Form->control('appointment_date');
            echo $this->Form->control('appointment_start_time');
            echo $this->Form->control('appointment_end_time');
            echo $this->Form->control('product_order_id');
            echo $this->Form->control('product_asin');
            echo $this->Form->control('product_name');
            echo $this->Form->control('product_quantity_purchased');
            echo $this->Form->control('product_order_status');
            echo $this->Form->control('technician');
            echo $this->Form->control('buyer_phone_number');
            echo $this->Form->control('ship_address_line_1');
            echo $this->Form->control('ship_address_line_2');
            echo $this->Form->control('ship_postal_code');
            echo $this->Form->control('ship_city');
            echo $this->Form->control('coverage_area');
            echo $this->Form->control('buyer_id');
            echo $this->Form->control('defect');
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit')) ?>
    <?php echo $this->Form->end() ?>
</div>
