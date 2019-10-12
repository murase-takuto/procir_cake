<?php
class UsersController extends AppController {

	//コントローラー名
	public $name = 'Users';
	//使用するモデル
//	public $uses = array('User');
	public function beforeFilter() {
//		parent::beforeFilter();
		$this->Auth->allow(
			'add',
			'login',
			'logout'
		);
	}

	public function login() {
		//POSTリクエストかどうか判定
		//$this->Auth->login()で正常にログインできればAuthコンポーネントで指定したリダイレクト先へ遷移
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
			//if ($this->Auth->login($this->request->data['User']['name'], $this->request->data['User']['password'])) {
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('ログインに失敗しました。');
			}
		}
	}

	public function logout() {
		$this->Auth->logout();
		$this->Session->setFlash('ログアウトしました。');
	}

	public function add() {
		//echo 1;
		//exit;
		if ($this->request->is('post')) {
			//入力した内容をセット
			$this->User->set($this->request->data);
			//入力内容をチェック
			if ($this->User->validates()) {
			//	//モデルの状態をリセット
				$this->User->create();
			//	//入力済みデータをモデルにセット
				$user = array('User' => $this->request->data('User'));
			//	//データを保存
				$this->User->save($user);
			//	$this->redirect($this->Auth->redirectUrl());
			//新規登録完了メッセージ
			//	$this->Flash->success(__('新規登録が完了しました。'));
				$this->Session->setFlash('新規登録が完了ました。');
			}
		}
	}
}
?>
