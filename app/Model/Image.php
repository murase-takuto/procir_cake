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
				'message' => 'ファイルの形式が不適切です。jpg, jpeg, gi, png 形式のみ利用可能です。'
			),
			'rule2' => array(
				'rule' => array(
					'filesize', '<=', '10MB'
				),
				'message' => '画像サイズは 10MB 以下のみ利用可能です。'
			),
			'rule3' => array(
				'rule' => array(
					'mimetype',
					array(
						'image/jpeg',
						'image/png',
						'image/gif'
					)
				),
				'message' => 'MIME タイプが不適切です。'
			)
		)
	);
	public $belongsTo = 'User';
}
?>
