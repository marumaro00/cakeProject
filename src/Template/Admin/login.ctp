<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($new_templates);
?>
<?= $this->Form->create(NULL,[
	'role'=> 'form',
	'id'=>'form-login']) 
?>
	<div class="form-group form-group-default">
        <label>Login</label>
			<?=  $this->Form->input('username',[
				'class' => 'form-control',
				'required']) ?>
			<?=  $this->Form->input('password',['
				class'=>'form-control',
				'required']) ?>
			<div class="form-group sent-state">
				<?= $this->Flash->render('auth') ?>
			</div>
    </div>
    <?= $this->Form->button(__('<span>Login</span>'),[
		'class' => 'btn btn-success btn-animated from-top fa fa-sign-in pull-right',
		'type' => 'submit']) ?>
<?= $this->Form->end() ?>
<?= $this->Html->script('login') ?>