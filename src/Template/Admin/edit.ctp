<?php
$template = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($template);
$this->set('title','Modify : ' . $admin->username);
?>
<div class="admin panel">
	<div class="panel-body">
		<?= $this->Form->create($admin, ['role' => 'form','id'=>'admin-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-6">
					<?=  $this->Form->input('username',['class'=>'form-control']) ?>
				</div>
				<div class="col-md-6">
					<?=  $this->Form->input('password',['class'=>'form-control']) ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?=  $this->Form->input('admin_profile.firstname',['class'=>'form-control']) ?>
				</div>
				<div class="col-md-6">
					<?=  $this->Form->input('admin_profile.lastname',['class'=>'form-control']) ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6"><?=  $this->Form->input('admin_profile.email',['class'=>'form-control']) ?></div>
				<div class="col-lg-6">
					<div class="col-sm-7 p-l-5">
						<?=  $this->Form->input('designation_id', 
							['options' => $designation,
							'class'=>'form-control select']) ?>
					</div>
					<div class="col-sm-5">
						<?=  $this->Form->input('status', 
							['options' => $state,
							'class'=>'form-control select-nosearch']) ?>
					</div>
				</div>
			</div>
			<div class="row">
				<span id="pane-message"></span>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),[
					'class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'id' => 'btn-reset',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),[
					'class' => 'btn btn-primary btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

<!---->
<script type="text/javascript">
	$(".select").select2();
	$(".select-nosearch").select2({
		minimumResultsForSearch: Infinity
	});
	$("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$("#admin-form").submit(function(e){
		var data= $("#admin-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'admin','action'=>'edit',$admin->id])?>",
			data : data,
			dataType: "json",
			success: function(result){
				var message='';
				if(result.status == 'OK')
				{
					message = '<span class="text-success">' + result.message + '</span>';
					$("#pane-message").html(message);
					$("#pane-message").fadeIn('fast');
					setTimeout(function()
					{
						$("#item-form").trigger("reset");
						$(".select").val('').trigger("change");
						$('.modal').modal('hide')
					}, 3000);
				}
				else
				{
					message = '<span class="text-danger">' + result.message + '</span>';
					$("#pane-message").html(message);
				}
			},
			error: function(x,h,r){
				$("#pane-message").html(h);
			}
		});
		return false;
	});
</script>