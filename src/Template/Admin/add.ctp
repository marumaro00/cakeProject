<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($new_templates);
$this->set('title','Add New Admin');
?>
<div class="admin panel">
	<div class="panel-body">
		<?= $this->Form->create($admin, ['role'=>'form','id'=>'user-form'] ) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-6">
					<?=  $this->Form->input('username',
						['class'=>'form-control',
						'templates' => $required]) ?>
				</div>
				<div class="col-md-6">
					<?=  $this->Form->input('password',
						['class'=>'form-control',
						'templates' => $required]) ?>
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
				<div class="col-md-6">
					<?=  $this->Form->input('admin_profile.email',
						['class'=>'form-control input-email',
						'templates' => $required]) ?>
				</div>
				<div class="col-lg-6">
					<div class="col-sm-7 p-l-5">
						<?=  $this->Form->input('designation_id',
							['options' => $designation,
							'class'=>'form-control select',
							'templates' => $required]) ?>
					</div>
					<div class="col-sm-5">
						<?=  $this->Form->input('status', 
							['options' => $status,
							'class'=>'form-control select-nosearch']) ?>
					</div>
				</div>
			</div>
			<div class="row">
				<span class="pull-right" id="pane-message"></span>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),
					['class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'id' => 'btn-reset',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),
					['class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
				<label for="many">
					<span>Add Many</span>
				</label>
				<input type="checkbox" id="many" class="switchery"/>
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

<script>
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	// Success color: #10CFBD
	elems.forEach(function(html) {
	  var switchery = new Switchery(html, {color: '#10CFBD'});
	});
	$(".select").select2();
	$(".select-nosearch").select2({
		minimumResultsForSearch: Infinity
	});
	$("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$('input-email').blur(function() {
		var email = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if (!email.test(this.value))
		{
			console.log("invalids");
			$(this).addClass('danger');
		}
	});
	$('#user-form').submit(function(e){
		
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'admin','action'=>'add'])?>",
			data : $("#user-form").serialize(),
			dataType : "json",
			success: function (result) 
			{
				var message = '';
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					if($("#many").is(':checked'))
					{
						setTimeout(function()
						{
							$('#pane-message').fadeOut('slow');
							$("#user-form").trigger("reset");
							$(".select").val('').trigger("change");
						}, 3000);
					}
					else
					{
						setTimeout(function()
						{
							$('.modal').modal('hide');
						}, 3000);
					}
					
				}
				else
				{
					$("#pane-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			},
		});
		return false;
	});
</script>
