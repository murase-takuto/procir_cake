<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');
	//コントローラー名
	public $name = 'Users';
	//使用するモデル
	public $uses = array('User', 'Post', 'Image');

	public function beforeFilter() {
		$this->Auth->allow(
			'add',
			'login',
			'logout',
			'view'
		);
	}

	public function login() {
		//POSTリクエストかどうか判定
		//$this->Auth->login()で正常にログインできればAuthコンポーネントで指定したリダイレクト先へ遷移
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirectUrl());
				$this->set('auth', $this->Auth->user());
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
				//モデルの状態をリセット
				$this->User->create();
				//入力済みデータをモデルにセット
				$user = array('User' => $this->request->data('User'));
				//データを保存
				$this->User->save($user);
				//新規登録完了メッセージ
				$this->Session->setFlash('新規登録が完了ました。');
			}
		}
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->findById($id);
		$image = $this->Image->findByUser_id($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $user);
		$this->set('image', $image);
	}

	public function edit($id = null) {
		//画像の保存
		if (!$id) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
		}
		$image = $this->Image->findByUser_id($id);
		$this->set('user', $user);
		$this->set('image', $image);

		if ($this->request->is('post')) {
			if ($this->request->data['Image']['image']['error'] == 0) {
				$this->Image->set($this->request->data);
				if ($this->Image->validates(array('fieldlist' => array('Image.image')))) {
					//画像保存
					$image = $this->request->data['Image']['image'];
					//画像ファイル名の作成
					$check = substr($image['name'], -3);
					$micro_time = substr(explode('.', microtime(true))[1], 0, 3);
					$upload_name = date('Ymd_H:i:s.') . $micro_time . '.' . $check;
					move_uploaded_file($image['tmp_name'], 'img/' . DS . $upload_name);

					$this->Image->set($this->request->data);

					if ($this->Image->find('first', array('conditions' => array('Image.user_id' => $id)))) {
						//画像更新の場合
						$image_id = $this->Image->find('first');
						$image = array(
							'id' => $image_id['Image']['id'],
							'name' => $upload_name,
							'user_id' => $id
						);
					} else {
						//画像新規登録の場合
						$this->Image->create();
						$image = array('Image' => array(
							'name' => $upload_name,
							'user_id' => $id
						)
						);
					}
					$this->Image->save($image, array('validate' => false));
					$this->Session->setFlash('ユーザー画像を更新しました。');
				} else {
					$errors = $this->Image->validationErrors;
				}
			}
			//コメントについての処理
			if ($this->request->data['Image']['comment'] != $user['User']['comment']) {
				$comment = $this->request->data['Image'];
				$this->User->save(array(
					'id' => $id,
					'comment' => $comment['comment']
				)
				);
				$this->Session->setFlash('コメントを更新しました。');
			}
			if (!$this->request->data) {
				$this->request->data = $user;
			}
		}
	}

	public function isAuthorized($user) {
		if (in_array($this->action, array('edit'))) {
			$login_id = $this->Auth->user('id');
			if ($login_id == $this->params['pass'][0]) {
				return true;
			} else {
				$this->Flash->error(__('不適切なアクセスです。'));
				return $this->redirect(array(
					'controller' => 'Posts',
					'action' => 'index'
				)
				);
			}
		}
		return parent::isAuthorized($user);
	}
}
?>
