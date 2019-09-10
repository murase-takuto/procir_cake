<h1><?php echo h($post['Post']['title']); ?></h1>
<p><small>投稿時間: <?php echo $post['Post']['created']; ?></small></p>
<p><small>投稿者: <?php echo $post['User']['name']; ?></small></p>
<p><?php echo h($post['Post']['body']); ?></p>
