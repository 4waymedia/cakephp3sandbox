<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]
            )
        ?></li>
        <li><?php echo $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payments form large-9 medium-8 columns content">
    <?php echo $this->Form->create($payment) ?>
    <fieldset>
        <legend><?php echo __('Edit Payment') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('transaction_type');
            echo $this->Form->control('order_id');
            echo $this->Form->control('product_Details');
            echo $this->Form->control('total_product_charges');
            echo $this->Form->control('total_promotional_rebates');
            echo $this->Form->control('amazon_fees');
            echo $this->Form->control('other');
            echo $this->Form->control('total');
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit')) ?>
    <?php echo $this->Form->end() ?>
</div>
