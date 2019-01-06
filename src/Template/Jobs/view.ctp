<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions'); ?></li>
        <li><?php echo $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]); ?> </li>
        <li><?php echo $this->Html->link(__('List Jobs'), ['action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Job'), ['action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']); ?> </li>
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?php echo h($job->id); ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Job Id'); ?></th>
            <td><?php echo h($job->job_id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Service Asin'); ?></th>
            <td><?php echo h($job->service_asin); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Job Name'); ?></th>
            <td><?php echo h($job->job_name); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Job Status'); ?></th>
            <td><?php echo h($job->job_status); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Product Asin'); ?></th>
            <td><?php echo h($job->product_asin); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Product Name'); ?></th>
            <td><?php echo h($job->product_name); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Product Order Status'); ?></th>
            <td><?php echo h($job->product_order_status); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Technician'); ?></th>
            <td><?php echo h($job->technician); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Ship Address Line 1'); ?></th>
            <td><?php echo h($job->ship_address_line_1); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Ship Address Line 2'); ?></th>
            <td><?php echo h($job->ship_address_line_2); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Ship City'); ?></th>
            <td><?php echo h($job->ship_city); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Coverage Area'); ?></th>
            <td><?php echo h($job->coverage_area); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Defect'); ?></th>
            <td><?php echo h($job->defect); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Id'); ?></th>
            <td><?php echo $this->Number->format($job->id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Service Order Id'); ?></th>
            <td><?php echo h($job->service_order_id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Product Order Id'); ?></th>
            <td><?php echo $this->Number->format($job->product_order_id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Product Quantity Purchased'); ?></th>
            <td><?php echo $this->Number->format($job->product_quantity_purchased); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Buyer Phone Number'); ?></th>
            <td><?php echo $this->Number->format($job->buyer_phone_number); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Ship Postal Code'); ?></th>
            <td><?php echo $this->Number->format($job->ship_postal_code); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Buyer Id'); ?></th>
            <td><?php echo $this->Number->format($job->buyer_id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Order Created Time'); ?></th>
            <td><?php echo h($job->order_created_time); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Appointment Date'); ?></th>
            <td><?php echo h($job->appointment_date); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Appointment Start Time'); ?></th>
            <td><?php echo h($job->appointment_start_time); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Appointment End Time'); ?></th>
            <td><?php echo h($job->appointment_end_time); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?php echo __('Related Jobs'); ?></h4>
        <?php if (!empty($job->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?php echo __('Id'); ?></th>
                <th scope="col"><?php echo __('Order Created Time'); ?></th>
                <th scope="col"><?php echo __('Service Order Id'); ?></th>
                <th scope="col"><?php echo __('Job Id'); ?></th>
                <th scope="col"><?php echo __('Service Asin'); ?></th>
                <th scope="col"><?php echo __('Job Name'); ?></th>
                <th scope="col"><?php echo __('Job Status'); ?></th>
                <th scope="col"><?php echo __('Appointment Date'); ?></th>
                <th scope="col"><?php echo __('Appointment Start Time'); ?></th>
                <th scope="col"><?php echo __('Appointment End Time'); ?></th>
                <th scope="col"><?php echo __('Product Order Id'); ?></th>
                <th scope="col"><?php echo __('Product Asin'); ?></th>
                <th scope="col"><?php echo __('Product Name'); ?></th>
                <th scope="col"><?php echo __('Product Quantity Purchased'); ?></th>
                <th scope="col"><?php echo __('Product Order Status'); ?></th>
                <th scope="col"><?php echo __('Technician'); ?></th>
                <th scope="col"><?php echo __('Buyer Phone Number'); ?></th>
                <th scope="col"><?php echo __('Ship Address Line 1'); ?></th>
                <th scope="col"><?php echo __('Ship Address Line 2'); ?></th>
                <th scope="col"><?php echo __('Ship Postal Code'); ?></th>
                <th scope="col"><?php echo __('Ship City'); ?></th>
                <th scope="col"><?php echo __('Coverage Area'); ?></th>
                <th scope="col"><?php echo __('Buyer Id'); ?></th>
                <th scope="col"><?php echo __('Defect'); ?></th>
                <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($job->jobs as $jobs): ?>
            <tr>
                <td><?php echo h($jobs->id); ?></td>
                <td><?php echo h($jobs->order_created_time); ?></td>
                <td><?php echo h($jobs->service_order_id); ?></td>
                <td><?php echo h($jobs->job_id); ?></td>
                <td><?php echo h($jobs->service_asin); ?></td>
                <td><?php echo h($jobs->job_name); ?></td>
                <td><?php echo h($jobs->job_status); ?></td>
                <td><?php echo h($jobs->appointment_date); ?></td>
                <td><?php echo h($jobs->appointment_start_time); ?></td>
                <td><?php echo h($jobs->appointment_end_time); ?></td>
                <td><?php echo h($jobs->product_order_id); ?></td>
                <td><?php echo h($jobs->product_asin); ?></td>
                <td><?php echo h($jobs->product_name); ?></td>
                <td><?php echo h($jobs->product_quantity_purchased); ?></td>
                <td><?php echo h($jobs->product_order_status); ?></td>
                <td><?php echo h($jobs->technician); ?></td>
                <td><?php echo h($jobs->buyer_phone_number); ?></td>
                <td><?php echo h($jobs->ship_address_line_1); ?></td>
                <td><?php echo h($jobs->ship_address_line_2); ?></td>
                <td><?php echo h($jobs->ship_postal_code); ?></td>
                <td><?php echo h($jobs->ship_city); ?></td>
                <td><?php echo h($jobs->coverage_area); ?></td>
                <td><?php echo h($jobs->buyer_id); ?></td>
                <td><?php echo h($jobs->defect); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]); ?>
                    <?php echo $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]); ?>
                    <?php echo $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
