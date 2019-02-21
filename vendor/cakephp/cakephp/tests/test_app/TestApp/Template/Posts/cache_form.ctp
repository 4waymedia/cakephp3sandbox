<div class="users form">
    <?php echo  $this->Form->create(false); ?>
        <fieldset>
            <legend><?php echo  __('Add User'); ?></legend>
        </fieldset>
    <?php echo  $this->Form->submit('Submit'); ?>
    <?php echo  $this->Form->end(); ?>
</div>
