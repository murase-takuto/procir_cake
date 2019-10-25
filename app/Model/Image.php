<?php
App::uses('AppModel', 'Model');
class Image extends AppModel {
	var $name = 'Images';
	public $validate = array(
		'image' => array(
			'rule1' => array(
				'rule' => array(
					'extension',
					array(
						'jpg',
						'jpeg',
						'gif',
						'png'
					)
				),
				'allowEmpty' => false,
				'message' => 'ファイルの形式が不適切です。jpg, jpeg, gif, png 形式のみ利用可能です。'
			),
			'rule2' => array(
				'rule' => array(
					'filesize', '<=', '1000000'
				),
				'message' => '画像サイズは 1MB(1000KB) 以下のみ利用可能です。'
			)
		)
	);
	public $belongsTo = 'User';
}
?>
