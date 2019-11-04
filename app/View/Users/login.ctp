<?php echo $this->Form->create(); ?>
<?php echo $this->Form->input('mail'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('ログイン'); ?>
<?php
echo $this->Html->link(
	'ユーザー新規登録はこちら',
	array(
		'controller' => 'Users',
		'action' => 'add'
	)
);
?>
<br>
<?php
echo $this->Html->link(
	'投稿閲覧のみの方はこちら',
	array(
		'controller' => 'Posts',
		'action' => 'index'
	)
);
?>
<br>
<?php
echo $this->Html->link(
	'パスワードを忘れた方はこちら',
	array(
		'controller' => 'Users',
		'action' => 'send_mail'
	)
);
?>
