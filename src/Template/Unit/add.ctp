<?php
$template = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($template);
$this->set('title','New Unit of Measurement');
?>
<div class="unit panel">
	<div class="panel-body">
		<?= $this->Form->create($unit,['role' => 'form','id'=>'unit-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-3">
					<?= $this->Form->input('code',
						['class'=>'form-control',
						'placeholder' => 'ex. mm',
						'label' => 'Unit Code',
						'templates' => $required]) ?>
				</div>
				<div  class="col-md-6">
					<?= $this->Form->input('name',
						['class'=>'form-control',
						'placeholder' => 'ex. millimetre',
						'label' => 'Unit Name',
						'templates' => $required]) ?>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('unit_type_id',
						['class'=>'form-control select-type',
						'placeholder' => 'ex. mm',
						'label' => 'Unit For',
						'options' => $type,
						'templates' => $required]) ?>
				</div>
			</div>
			<div class="row">
				<?= $this->Form->input('description',
					['class'=>'form-control',
					'type' => 'textarea',
					'placeholder' => 'Additional information here...',
					'style' => 'resize: vertical; height: 64pt']) ?>
			</div>
			<div class="row">
				<div id="pane-message" class="pull-right"></div>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),[
					'class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'id' => 'btn-reset',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),[
					'class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
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

<!---->

<script>
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	// Success color: #10CFBD
	elems.forEach(function(html) {
	  var switchery = new Switchery(html, {color: '#10CFBD'});
	});
	$(".select-type").select2({
		minimumResultsForSearch: Infinity
	});
	 $("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$("#unit-form").submit(function(e){
		var data= $("#unit-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'unit','action'=>'add'])?>",
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
							$("#unit-form").trigger("reset");
							$(".select").val('').trigger("change");
						}, 3000);
					}
					else
					{
						setTimeout(function()
						{
							$('#pane-message').fadeOut('slow');
							$("#unit-form").trigger("reset");
							$(".select").select2('val', '');
							$(".select").val('').trigger("change");
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
