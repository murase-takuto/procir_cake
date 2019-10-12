<h1>投稿内容の詳細確認</h1>
<?php echo 'タイトル：' . $post['Post']['title']; ?>
<br>
<?php echo '投稿時間：' . $post['Post']['created']; ?>
<br>
<?php echo '投稿者：' . $post['User']['name']; ?>
<br>
<?php echo '投稿内容：' . $post['Post']['body']; ?>
<br>
<?php
echo $this->Html->link(
	'投稿一覧ページに戻る',
	array(
		'controller' => 'posts',
		'action' => 'index'
	)
);
?>

