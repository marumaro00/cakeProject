<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$this->Form->templates($new_templates);
?>

<div class="admin panel">
	<div class="panel-body">
		<legend><?= __('Hello! ' . $user)  ?></legend>
		<div class="col-md-6" style="text-align: center">
			<div class="row">
				<div class="col-md-9 center-block"  style="float: none !important">
					<img class="user_image full-width" alt="user image" src="<?= $this->Url->build(['controller'=>'admin','action'=>'image',$act])?>"/>
				</div>
			</div>
			<div class="row">
				<?= $this->Html->link('Change Your Profile Photo','#',
									['class' => 'btn btn-primary',
									'id' => 'btn-upload-profile',
									'data-toggle' => 'modal',
									'data-target' => '#modal'])?>
			</div>
		</div>
		<div class="col-md-6 bg-master-light">
			<?= $this->Form->create($admin, 
									['role' => 'form']) ?>
			<fieldset>
				<p></p>
				<div class="row form-group-attached">
					<?=  $this->Form->input('username',
											['class' => 'form-control']) ?>
					<?=  $this->Form->input('password',
											['class' => 'form-control',
											'value' => '']) ?>
				</div>
				<p></p>
				<div class="row form-group-attached">
					<?=  $this->Form->input('admin_profile.firstname',
											['class' => 'form-control']) ?>
					<?=  $this->Form->input('admin_profile.lastname',
											['class' => 'form-control']) ?>
				</div>
				<p></p>
				<div class="row">
					<?=  $this->Form->input('admin_profile.email',['class'=>'form-control']) ?>
				</div>
				<p></p>
				<div class="row">
					<?=  $this->Form->input('designation_id', ['options' => $designation,'class'=>'form-control']) ?>
				</div>
				<p></p>
				<div class="row">
					<?= $this->Form->button(__('<span>Clear</span>'),[
						'class' => 'btn btn-animated from-top fa fa-remove pull-right',
						'type' => 'reset']) ?>
					<?= $this->Form->button(__('<span>Save</span>'),[
						'class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
						'type' => 'submit']) ?>
				</div>
				<p></p>
			</fieldset>
			
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>


<script>
$('#btn-upload-profile').click(function(){
		$("#modal").find(".modal-content").load("<?= $this->Url->build(['controller'=>'admin','action'=>'image','upload',$act])?>");
	});
</script>