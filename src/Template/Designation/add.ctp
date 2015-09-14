<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($new_templates);
$this->set('title','New Designation');
?>
<div class="designation panel">
	<div class="panel-body">
		<?= $this->Form->create($designation,['role' => 'form','id'=>'designation-form']) ?>
		<fieldset>
			<div class="row">
				<?= $this->Form->input('name',
					['class' => 'form-control',
					'label' => 'Designation Name']) ?>
			</div>
			<div class="row">
				<div id="pane-message" class="text-danger pull-right"></div>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),[
					'class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),[
					'class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
				<div>
					<label for="many">Add Many</label>
					<input type="checkbox" id="many" class="switchery"/>
				</div>
				
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

<!--Scirpt-->

<script>
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	elems.forEach(function(html) {
	  var switchery = new Switchery(html, {color: '#10CFBD'});
	});
	$("#designation-form").submit(function(e){
		var data= $("#designation-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'designation','action'=>'add'])?>",
			data : data,
			dataType: "json",
			success: function(result){
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
			error: function(x,h,r){
				$("#pane-message").html(h);
			}
		});
		return false;
	});
</script>