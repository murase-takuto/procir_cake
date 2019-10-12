<?php
class PostsController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');
	public function index() {
		$this->set('post', $this->Post->find('all'));
	}

	public function beforeFilter() {
		$this->Auth->allow(
			'view',
			'index'
		);
		$this->set('auth', $this->Auth->user());
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $post);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('新規投稿が完了しました。'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('投稿に失敗しました。'));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		$this->set('post', $post);

		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('投稿が更新されました。'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('投稿の更新に失敗しました。'));
		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Post->delete($id)) {
			$this->Flash->success(__('投稿を削除しました。'));
		} else {
			$this->Flash->error(__('投稿の削除に失敗しました。'));
		}

		return $this->redirect(array('action' => 'index'));
	}
}
?>
