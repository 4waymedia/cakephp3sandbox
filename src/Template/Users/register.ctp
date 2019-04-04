<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="large-3 medium-4 columns" id="actions-sidebar">
<p>By filling out and submitting this form, you accept our terms and conditions. Furthermore, you agree to use our service morally.</p>
</div>
<div class="users form large-9 medium-8 columns content">
    <h1>Register a NEW account</h1>
    <?php echo$this->Form->create(); ?>
    <fieldset>
        <legend><?php echo __('User Credentials') ?></legend>
        <?php
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        ?>
    </fieldset>
    <fieldset>
        <legend><?php echo __('Business Info') ?></legend>
        <?php
        echo $this->Form->control('Business.name');
        echo $this->Form->control('Business.phone_number');
        echo $this->Form->control('Business.city');
        echo $this->Form->control('Business.state');
        ?>
    </fieldset>
    <?php echo$this->Form->button(__('Submit')) ?>
    <?php echo$this->Form->end() ?>
</div>