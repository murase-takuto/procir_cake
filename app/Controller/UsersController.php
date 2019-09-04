<?php
class UsersController extends AppController {

	public $name = 'Users';
	public $uses = array('User');
	public $components = array(
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish',
					'fields' => array(
						'username' => 'email',
						'password' => 'password',
					),
				),
			),
			'loginAction' => '/users/login',
			'loginRedirect' => '/users/mypage',
		),
		'Session',
		'Security',
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout');
		$this->Security->blackHoleCallback = 'blackhole';
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('ログインに失敗しました。');
			}
		}
	}

	public function logout() {
		$this->Auth->logout();
		$this->render('logout');
	}

	public function mypage() {
	}

	public function blackhole($type) {
		$this->Session->setFlash('不正なリクエストが行われました。');
		$this->redirect(
			array(
				'controller' => $this->controller,
				'action' => $this->action,
			)
		);
	}
}
?>
