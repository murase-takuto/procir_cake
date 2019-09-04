<?php
class SignupController extends AppController {

	public $name = 'Signup';
	public $uses = array('User');
	public $components = array(
		'Security',
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->blackHoleCallback = 'blackhole';
	}

	public function index() {

		if (!$this->request->data) {
			$this->render();
			return;
		}

		$this->User->set($this->request->data);

		if ($this->User->validates()) {
			$this->User->create();
			$user = array('User' => $this->request->data['User']);
			$this->User->save($user);
			$this->render('thanks');
		}
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
