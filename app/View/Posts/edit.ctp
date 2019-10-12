<h1>投稿編集画面</h1>
<?php
echo '投稿者' . $post['User']['name'];
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('rows' => '3', 'label' => '投稿内容'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('編集内容を反映');
?>
