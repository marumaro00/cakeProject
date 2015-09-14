<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$with_addon = [
    'inputContainer' => '<div class="form-group form-group-default input-group">{{content}}<span class="input-group-addon">'. '' .'</span></div>',
];
$this->Form->templates($new_templates);
$this->set('title','Inventory Wastes');
?>
<div class="inventoryWaste panel">
	<div class="panel-body">
		<?= $this->Form->create($inventoryWaste, ['role'=>'form','id'=>'waste-add-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-4">
					<?= $this->Form->input('item_id',
						['class' => 'form-control select',
						'label' => 'Item',
						'value' => 0,
						'id' => 'item-select',
						'type' => 'select',
						'options' => $item])?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('quantity',
						['class'=>'form-control',
						 'style' => '-moz-appearance:textfield;',
						 'templates' => $with_addon])?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('waste_type',
						['class'=>'form-control select',
						 'options'=>$waste])?>
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
			</div>
		</fieldset>
		<?= $this->Form->end() ?>
	</div>
    
</div>

<script>
	$(".select").select2();
	$("#item-select").on('change', function(){
		$.ajax({
			type : 'get',
			url : "<?= $this->Url->build(['action' => 'unit'])?>/" + $(this).val(),
			dataType : "json",
			success : function(data){
				$('.input-group-addon').html(data.item[0].unit.code);
			},
			error : function(x,h,r){
				$('.input-group-addon').html('?');
			}
		});
	})
	$("#waste-add-form").submit(function(){
		var form_data = $("#waste-add-form").serialize();
		$.ajax({
			type : "POST",
			url : "<?= $this->Url->build(['controller'=>'InventoryWaste','action'=>'add'])?>",
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
						$("#waste-add-form").trigger("reset");
						waste_table.ajax.reload();
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