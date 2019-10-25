<h1>掲示板</h1>
<?php
if (!$auth) {
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

	<?php foreach ($post as $posts) : ?>
	<tr>
		<td>
			<?php echo $posts['Post']['id']; ?>
		</td>
		<td>
			<?php
			echo $this->Html->link(
				$posts['Post']['title'],
				array(
					'controller' => 'posts',
					'action' => 'view',
					$posts['Post']['id']
				)
			);
			?>
		</td>
		<td>
			<?php
			echo $this->Html->link(
			$posts['User']['name'],
			array(
				'controller' => 'users',
				'action' => 'view',
				$posts['Post']['user_id']
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
					$posts['Post']['id']
				),
				array(
					'confirm' => '本当に削除しますか？'
				)
			);
			?>
			<?php
			echo $this->Html->link(
				'Edit',
				array(
					'action' => 'edit',
					$posts['Post']['id']
				)
			);
			?>
		</td>
		<td>
			<?php echo $posts['Post']['created']; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
