<h1>Blog posts</h1>
<?php
if (empty($this->Session->name)) {
	echo $this->Html->link(
		'ログイン画面へ',
		array(
			'controller' => 'Users',
			'action' => 'login'
		)
	);
} else {
	echo $this->Html->link(
		'新規投稿画面へ',
		array(
			'controller' => 'posts',
			'action' => 'add'
		)
	);

	echo $this->Html->link(
		'ログアウトする',
		array(
			'controller' => 'users',
			'action' => 'logout'
		)
	);
}
?>
<table>
	<tr>
		<th>投稿ID</th>
		<th>タイトル</th>
		<th>投稿者名</th>
		<th>投稿の 削除 / 編集</th>
		<th>投稿時間</th>
	</tr>

	<?php foreach ($posts as $post) : ?>
	<tr>
		<td>
			<?php echo $post['Post']['id']; ?>
		</td>
		<td>
			<?php
			echo $this->Html->link(
				$post['Post']['title'],
				array(
					'controller' => 'posts',
					'action' => 'view',
					$post['Post']['id']
				)
			);
			?>
		</td>
		<td>
			<?php
			echo $this->Form->postlink(
				'Delete',
				array(
					'action' => 'delete',
					$post['Post']['id']
				),
				array(
					'confirm' => 'Are you sure?'
				)
			);
			?>
			<?php
			echo $this->Html->link(
				'Edit',
				array(
					'action' => 'edit',
					$post['Post']['id']
				)
			);
			?>
		</td>
		<td>
			<?php echo $post['Post']['created']; ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>
