<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TlhtJob[]|\Cake\Collection\CollectionInterface $tlhtJobs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Jobs'), ['controller'=>'Jobs','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Payments'), ['controller'=>'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Contractors'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tlhtJobs index large-9 medium-8 columns content">
    <h3><?= __('Tlht Dashboard') ?></h3>
    <table cellpadding="0" cellspacing="0">

</div>
