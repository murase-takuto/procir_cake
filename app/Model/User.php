<?php
class User extends AppModel {
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'A username is required'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'A password is required'
			)
		),
		'role' => array(
			'required' => array(
				'rule' => array(
					'inlist', array(
						'admin',
						'author'
					)
				),
				'message' => 'Please enter a valid role',
				'allowEmpty' => false
			)
		),
	);
}
?>
