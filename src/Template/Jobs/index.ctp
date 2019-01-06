<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions'); ?></li>
        <li><?php echo $this->Html->link(__('New Job'), ['action' => 'add']); ?></li>
    </ul>
</nav>
<div class="jobs index large-9 medium-8 columns content">
    <h3><?php echo __('Jobs'); ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?php echo $this->Paginator->sort('id'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('job_status'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('appointment_date'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('product_order_id'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('product_order_status'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('technician'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('ship_city'); ?></th>
                <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?php echo $this->Number->format($job->id); ?></td>
                <td><?php echo h($job->job_status); ?></td>
                <td><?php echo h($job->appointment_date); ?></td>

                <td><?php echo $this->Number->format($job->product_order_id); ?></td>
                <td><?php echo h($job->product_order_status); ?></td>
                <td><?php echo h($job->technician); ?></td>
                <td><?php echo h($job->ship_city); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['action' => 'view', $job->id]); ?>
                    <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]); ?>
                    <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('first')); ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next(__('next') . ' >'); ?>
            <?php echo $this->Paginator->last(__('last') . ' >>'); ?>
        </ul>
        <p><?php echo $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]); ?></p>
    </div>
</div>
