<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends Appmodel {

	var $name = 'user';
	var $useTable = 'users';

	public $validate = array(
		//メールアドレス入力欄
		'email' => array(
			array(
				'rule' => 'notEmpty',
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
		//パスワード入力欄
		'password' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'パスワードが未入力です。'
			),
			array(
				'rule' => 'alphanumericsymbols',
				'message' => 'パスワードに不適切な文字が含まれています。'
			),
		),
	);

	public function beforeSave($options = arraay()) {

		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}

	public function alphanumericsymbols($check) {
		$value = array_values($check);
		$value = $value[0];
		return preg_match('/^[a-zA-Z0-9\s\x21-\x2f\x3a-\x40\x5b-\x60\x7b-\x7e]+$/', $value);
	}
}
?>
