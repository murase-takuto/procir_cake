<?php
class UsersController extends AppController {
	//コントローラー名
	public $name = 'Users';
	//使用するモデル
	public function beforeFilter() {
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
			//新規登録完了メッセージ
				$this->Session->setFlash('新規登録が完了ました。');
			}
		}
	}
}
?>
