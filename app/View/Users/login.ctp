<?php echo $this->Form->create(); ?>

<?php echo $this->Form->label('users.mail'); ?>
<?php echo $this->Form->text('users.mail'); ?>

<?php echo $this->Form->label('users.password'); ?>
<?php echo $this->Form->password('users.password'); ?>

<?php echo $this->Form->end('ログイン'); ?>
