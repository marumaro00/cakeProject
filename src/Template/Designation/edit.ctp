<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($new_templates);
$this->set('title', 'Modify : Designation' );
?>
<div class="designation form large-10 medium-9 columns">
    <?= $this->Form->create($designation,['role' => 'form','id'=>'designation-form']) ?>
    <fieldset>
		<div class="row">
			<?= $this->Form->input('name',['class'=>'form-control'])?>
		</div>
		<div class="row">
			<span id="pane-message" class="text-danger pull-right"></span>
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


<!---->
<script type="text/javascript">
	$("#designation-form").submit(function(e){
		var data= $("#designation-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'designation','action'=>'edit',$designation->id])?>",
			data : data,
			dataType: "json",
			success: function(result){
				var message = '';
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					setTimeout(function(){
						$('.modal').modal('hide');
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