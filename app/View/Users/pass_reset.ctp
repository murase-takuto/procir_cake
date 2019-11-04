<?php echo $this->Form->create(); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('パスワードを更新する'); ?>
<?php echo $this->Html->link(
	'ログイン画面に戻る',
	array(
		'controller' => 'Users',
		'action' => 'login'
	)
);
?>
