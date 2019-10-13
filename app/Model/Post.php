<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
	var $name = 'posts';

	public $validate = array(
		'title' => array(
			'rule' => 'notBlank',
			'message' => 'タイトルは必須事項です。'
		),
		'body' => array(
			'rule' => 'notBlank',
			'message' => '本文は必須事項です。'
		)
	);
	public $belongsTo = 'User';

	public function isOwnedBy($post, $user) {
		return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}
}
?>
