<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business[]|\Cake\Collection\CollectionInterface $businesses
 */

$this->assign('title', 'My Business');

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('List Pay Periods'), ['controller' => 'PayPeriods', 'action' => 'index']); ?></li>
    </ul>
</nav>
<div class="businesses index large-9 medium-8 columns content">
    <h3><?php echo __('Business') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?php echo $this->Paginator->sort('first_pay_period_date') ?></th>
                <th>Pay Periods</th>
                <th>Technicians</th>
                <th scope="col"><?php echo $this->Paginator->sort('business_name') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('phone_number') ?></th>
                <th scope="col">Address</th>
                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businesses as $business): ?>
            <tr>
                <td><?php echo h($business->first_pay_period_date) ?></td>
                <td><?php echo count($business->pay_periods);?></td>
                <td></td>
                <td><?php echo h($business->business_name) ?></td>
                <td><?php echo h($business->phone_number) ?></td>
                <td><?php echo h($business->city) . ', ' .h($business->state); ?></td>

                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['action' => 'view', $business->id]) ?>
                    <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $business->id]) ?>
                    <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <h4>Staff</h4>
    <?php if(isset($staff)):?>



        <?php
        echo $this->Html->tag('table', null, array('class'=>'table-striped table'));
            echo $this->Html->tableHeaders(
                array('Role', 'Name','Email'),
                array(),
                array('class'=>''));

            foreach($staff as $person){


            }

            echo $this->Html->tag('/table');?>

    <?php else : ?>
        <strong>Technicians are added Automatically when you import Jobs.</strong>
    <?php endif; ?>
    </div>

</div>
