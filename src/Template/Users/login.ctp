<h1>Login</h1>
<?php echo $this->Form->create() ?>
<?php echo $this->Form->control('email') ?>
<?php echo $this->Form->control('password') ?>
<?php echo $this->Form->button('Login') ?>
<?php echo $this->Form->end() ?>