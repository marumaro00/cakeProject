<?php
$templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$with_addon = [
    'inputContainer' => '<div class="form-group form-group-default input-group">{{content}}<span class="input-group-addon">'. $item->unit["code"] .'</span></div>',
];
$with_addon_required = [
    'inputContainer' => '<div class="form-group form-group-default input-group required">{{content}}<span class="input-group-addon">'. $item->unit["code"] .'</span></div>',
];
$this->Form->templates($templates);
$this->set('title','Quantity Adjust : ' . $inventory->item->name);
?>
<div class="inventory panel">
	<div class="panel-body">
		<?= $this->Form->create($inventory,['role'=>'form','id'=>'adjust-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-3">
					<?= $this->Form->input('previous_quantity',
						['class'=>'form-control text-black',
						'id'=>'previous',
						'label' => 'current',
						'style' => '-moz-appearance:textfield;',
						'templates' => $with_addon,
						'readonly'])?>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('quantity',
						['class'=>'form-control text-black',
						'value'=>0,
						'id'=>'new',
						'label' => 'New',
						'style' => '-moz-appearance:textfield;',
						'templates' => $with_addon,
						'readonly'])?>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('adjustment',
						['class'=>'form-control',
						'id'=>'adjust',
						'value' => 0,
						'label' => 'adjust',
						'style' => '-moz-appearance:textfield;',
						'templates' => $with_addon_required])?>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('adjustment_type',
						['class'=>'form-control select',
						'id' => 'type',
						'options' => $type,
						'value' => 0,
						'label' => 'type'])?>
				</div>
			</div>
			<div class="row">
				<span class="pull-right" id="pane-message"></span>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),
					['class' => 'btn btn-animated from-top fa fa-remove pull-right',
					'type' => 'reset']) ?>
				<?= $this->Form->button(__('<span>Save</span>'),
					['class' => 'btn btn-success btn-animated from-top fa fa-check pull-right',
					'type' => 'submit']) ?>
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
    
</div>

<!---->
<script>
	$(".select").select2({
		 minimumResultsForSearch: Infinity
	});
	$("#adjust").bind('keyup blur', function () {
		var prev = parseInt($("#previous").val());
		var adj = parseInt($("#adjust").val());
		if( $("#type").val() == 3)
		{
			if( adj > prev )
			{
				$("#adjust").val( prev );
				adj = prev;
			}
			 $("#new").val( prev - adj );
		}
		else
		{
			$("#new").val( prev + adj );
		}
		
	});
	$("#adjust").on("click", function () {
		$(this).select();
	});
	$("#adjust-form").submit(function(){
		var form_data = $("#adjust-form").serialize();
		$.ajax({
			type : "POST",
			url : "<?= $this->Url->build(['controller'=>'inventory','action'=>'adjust',$inventory->item_id])?>",
			data : form_data,
			dataType : "json",
			success : function(result)
			{
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					setTimeout(function()
					{
						$('#pane-message').fadeOut('slow');
						$("#item-form").trigger("reset");
						$('.modal').modal('hide');
					}, 2000);
				}
				else
				{
					$("#pane-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			},
			error : function(xhr, ajaxOptions, thrownError)
			{
				$("#pane-message").html('<span class="text-danger">' + 'Error: Server may be Busy. please try again later' + '</span>');
			}
		});
		return false;
	});
</script>