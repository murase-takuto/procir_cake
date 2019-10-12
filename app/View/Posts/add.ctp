<h1>新規投稿画面</h1>
<?php
if ($auth) {
	echo '投稿者：' . $auth['name'];
} else {
	echo 'error';
}
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('user_id', array(
	'type' => 'hidden',
	'value' => $auth['id']
));
echo $this->Form->end('投稿する');
?>
