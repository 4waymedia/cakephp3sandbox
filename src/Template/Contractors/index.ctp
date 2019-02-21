<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor[]|\Cake\Collection\CollectionInterface $contractors
 */

?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo  __('Actions') ?></li>
        <li><?php echo  $this->Html->link(__('New Contractor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contractors index large-10 medium-9 columns content">
    <h3><?php echo  __('Contractors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?php echo  $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?php echo  $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?php echo  $this->Paginator->sort('technician_id',['Label'=>'Technician ID']) ?></th>
                <th scope="col"><?php echo  $this->Paginator->sort('email') ?></th>

                <th scope="col" class="actions"><?php echo  __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contractors as $contractor):

                //debug($contractor->role_id);
                ?>
            <tr>
                <td><?php echo  $contractor->first_name; ?></td>
                <td><?php echo  $contractor->last_name; ?></td>
                <td><?php echo  h($contractor->technician_id) ?></td>
                <td><?php echo  h($contractor->email) ?></td>

                <td class="actions">
                    <?php echo  $this->Html->link(__('View'), ['action' => 'view', $contractor->id]) ?>
                    <?php echo  $this->Html->link(__('Edit'), ['action' => 'edit', $contractor->id]) ?>
                    <?php echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo  $this->Paginator->first('<< ' . __('first')) ?>
            <?php echo  $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo  $this->Paginator->numbers() ?>
            <?php echo  $this->Paginator->next(__('next') . ' >') ?>
            <?php echo  $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?php echo  $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
