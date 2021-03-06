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
            <td><?php echo $this->Phone->link($job->buyer_phone_number); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Ship Postal Code'); ?></th>
            <td><?php echo $job->ship_postal_code; ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Buyer Id'); ?></th>
            <td><?php echo $job->buyer_id; ?></td>
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
        <h4><?php echo __('Payment File') ?></h4>
        <?php if (!empty($job->payments)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?php echo __('Transaction Type') ?></th>
                    <th scope="col"><?php echo __('Payment Type') ?></th>
                    <th scope="col"><?php echo __('Quantity') ?></th>
                    <th scope="col"><?php echo __('Amount') ?></th>
                    <th scope="col"><?php echo __('Total Product Charges') ?></th>
                    <th scope="col"><?php echo __('Total Promotional Rebates') ?></th>
                    <th scope="col"><?php echo __('Amazon Fees') ?></th>
                    <th scope="col" class="actions"><?php echo __('Actions') ?></th>
                </tr>
                <?php foreach ($job->payments as $payment):
                    ?>
                    <tr>
                        <td><?php echo h($payment->transaction_type) ?></td>
                        <td><?php echo h($payment->payment_type) ?></td>
                        <td><?php echo h($payment->quantity) ?></td>
                        <td><?php echo h($payment->amount) ?></td>
                        <td><?php echo h($payment->total_product_charges) ?></td>
                        <td><?php echo h($payment->total_promotional_rebates) ?></td>
                        <td><?php echo h($payment->amazon_fees) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</div>
