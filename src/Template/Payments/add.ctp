<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payments form large-9 medium-8 columns content">
    <?= $this->Form->create($payment) ?>
    <fieldset>
        <legend><?= __('Add Payment') ?></legend>
        <?php
            echo $this->Form->control('Date');
            echo $this->Form->control('Transaction_type');
            echo $this->Form->control('Order_ID');
            echo $this->Form->control('Product_Details');
            echo $this->Form->control('Total_product_charges');
            echo $this->Form->control('Total_promotional_rebates');
            echo $this->Form->control('Amazon_fees');
            echo $this->Form->control('Other');
            echo $this->Form->control('Total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
