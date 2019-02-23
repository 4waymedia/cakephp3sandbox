<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Jobs'), ['controller'=>'Jobs','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Payments'), ['controller'=>'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Contractor Payments'), ['controller'=>'AccountPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Contractors'), ['controller'=> 'Contractors','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Importer'), ['controller'=>'Content','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Roles'), ['controller'=>'Roles','action' => 'index']) ?></li>
    </ul>
</nav>