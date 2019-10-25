<h1>マイページ</h1>
<?php echo '投稿者：' . $user['User']['name']; ?>
<br>
<?php
echo 'ユーザー画像：';

if (!empty($image['Image']['name'])) {
	echo $this->Html->image(
		'../img/' . $image['Image']['name'],
		array(
			'alt' => 'CakePHP'
		)
	);
} else {
	echo '未登録';
}
?>
<br>
<?php echo 'メールアドレス：' . $user['User']['mail']; ?>
<br>
<?php
echo '一言コメント：';
if ($user['User']['comment']) {
	echo $user['User']['comment'];
} else {
	echo '未登録';
}
?>
<br>
<?php
echo $this->Html->link(
	'マイページを編集',
	array(
		'controller' => 'Users',
		'action' => 'edit',
		$user['User']['id']
	)
);
?>
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
