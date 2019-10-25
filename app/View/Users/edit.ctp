<?php
echo $this->Form->create(
	'Image',
	array(
		'type' => 'file',
		'enctype' => 'multipart/form-data'
	)
);
echo $this->Form->input(
	'Image.image',
	array(
		'label' => false,
		'type' => 'file',
		'multiple'
	)
);
echo $this->Form->input('comment', array('rows' => '1', 'label' => '一言コメント'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit(
	'更新する',
	array(
		'name' => 'submit'
	)
);
echo $this->Form->end();
if (!empty($user['User'])) {
	echo $this->Html->link(
		'マイページに戻る',
		array(
			'controller' => 'Users',
			'action' => 'view',
			$user['User']['id']
		)
	);
}
?>
