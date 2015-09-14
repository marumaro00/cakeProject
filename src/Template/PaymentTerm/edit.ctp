<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($new_templates);
$this->set('title',' Modify(Payment Term) : ' . $paymentTerm->name);
?>

<div class="paymentTerm panel">
	<div class="panel-body">
		<?= $this->Form->create($paymentTerm,['role' => 'form','id'=>'term-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-8">
					<?= $this->Form->input('name',
						['class' => 'form-control',
						'templates' => $required,
						'label' => 'Term Name'])?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('days',
						['class'=>'form-control',
						'templates' => $required,
						'label'=>'Days Due']) ?>
				</div>
			</div>
			<div class="row">
				<?= $this->Form->input('description',
					['class'=>'form-control',
					'type'=>'textarea',
					'style'=>'resize:vertical; height: 64pt']) ?>
			</div>
			<div class="row">
				<div id="pane-message" class="pull-right"></div>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),[
					'class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),[
					'class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

<!---->
<script type="text/javascript">
	$("#term-form").submit(function(e){
		var data= $("#term-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'paymentTerm','action'=>'edit',$paymentTerm->id])?>",
			data : data,
			dataType: "json",
			success: function(result){
				var message = '';
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					setTimeout(function(){
						$('.modal').modal('toggle')
					}, 3000);
				}
				else
				{
					$("#pane-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			},
			error: function(x,h,r){
				$("#message").html(h);
			}
		});
		return false;
	});
</script>