<?php echo $this->Form->create(); ?>

<?php echo $this->Form->label('name', '名前:'); ?>
<?php echo $this->Form->text('name'); ?>
<?php echo $this->Form->error('name'); ?>

<?php echo $this->Form->label('mail', 'メールアドレス:'); ?>
<p>※メールアドレスの形式のみ登録可能です。</p>
<?php echo $this->Form->text('mail'); ?>
<?php echo $this->Form->error('email'); ?>

<?php echo $this->Form->label('password', 'パスワード:'); ?>
<p>※半角英数字（abc123 など）のみ利用できます。</p>
<?php echo $this->Form->text('password'); ?>
<?php echo $this->Form->error('password'); ?>

<?php echo $this->Form->end('登録'); ?>
