<?php echo $this->Form->create(); ?>

<?php echo $this->Form->label('User.email', 'メールアドレス:'); ?>
<p>※メールアドレスの形式のみ登録可能です。</p>
<?php echo $this->Form->text('User.email'); ?>
<?php echo $this->Form->error('User.email'); ?>

<?php echo $this->Form->label('User.password', 'パスワード:'); ?>
<p>※半角英数字（abc123 など）のみ利用できます。</p>
<?php echo $this->Form->text('User.password'); ?>
<?php echo $this->Form->error('User.password'); ?>

<?php echo $this->Form->end('登録'); ?>
