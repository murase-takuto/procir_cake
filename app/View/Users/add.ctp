<?php echo $this->Form->create(); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('mail'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('新規登録する'); ?>
<?php
echo $this->Html->link(
	'ログイン画面へ',
	array(
		'controller' => 'Users',
		'action' => 'login'
	)
);
?>
