<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

class User extends AppModel {

	var $name = 'User';
	var $useTable = 'users';

	public $validate = array(
		//DBに登録する名前の設定
		'name' => array(
			array(
				'rule' => 'notBlank',
				'message' => '氏名が未入力です。'
			),
		),
		//DBに登録するメールアドレスの設定
		'mail' => array(
			array(
				'rule' => 'notBlank',
				'message' => 'メールアドレスが未入力です。'
			),
			array(
				'rule' => 'email',
				'message' => 'メールアドレスが不適切です。'
			),
			array(
				'rule' => 'isUnique',
				'message' => 'このメールアドレスは既に登録されています。'
			),
		),
		//DBに登録するパスワードの設定
		'password' => array(
			array(
				'rule' => 'notBlank',
				'message' => 'パスワードが未入力です。'
			),
		)
	);

	public function beforeSave($options = array()) {

		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
<<<<<<< HEAD
=======

//	public function isOwnedBy($user) {
//		return $this->field('id', array('id' => $user)) !== false;
//	}
>>>>>>> add_process
}
?>
