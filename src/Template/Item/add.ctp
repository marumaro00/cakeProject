<?php
$templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($templates);
$this->set('title','New Product');
$off = "style='display:none'";
if($modal)
{
	$this->set('title','New Supplier');
	$off = '';
}
?>
<div class="item panel">
	<?php
		if(!$modal)
		{	
			$redir = $this->Url->build(['controller' => 'item','action' => 'index']);
			
			echo '<div class="panel-heading">
					<div class="panel-title">
						<h2>Product</h2>
					</div>
					<div class="btn-group pull-right">
						<a class="btn btn-primary m-t-20" href=" ' . $redir . '">
							<span><i class="fa fa-list"></i></span>
						</a>
					</div>
				</div>';
		}	
	?>
	<div class="panel-body">
		<?= $this->Form->create($item,['role'=>'form','id'=>'item-form']) ?>
		<fieldset>
			<div class="row">
				<h5>General Info</h5>
				<div class="row">
					<div class="col-md-4">
						<?= $this->Form->input('code',
							['class' => 'form-control',
							'placeholder' => 'ex. IT-000',
							'label' => 'Item Code']) ?>
					</div>
					<div class="col-md-8">
						<?= $this->Form->input('name',
							['class' => 'form-control',
							'placeholder' => 'Here, You put the name of the product',
							'label' => 'Item Name'])?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<?= $this->Form->input('category_id', 
							['class' => 'form-control select',
							'options' => $itemCategory, 
							'empty' => true])?>
					</div>
					<div class="col-md-6">
						<?= $this->Form->input('item_type_id', 
							['class' => 'form-control select select-nonnull',
							'options' => $itemType])?>
					</div>
				</div>
				<div class="row">
					<?= $this->Form->input('supplier._ids', 
						['class' => 'form-control select',
						'options' => $supplier])?>
				</div>
				<div class="row">
					<?= $this->Form->input('description',
						['class'=> 'form-control',
						'type'=>'textarea',
						'style'=>'resize: vertical; height: 64pt',
						'placeholder' => 'additional information on the product can be defined here.',
						'label' => 'Description'])?>
				</div>
			</div>
			<div class="row">
				<h5>Storage Info</h5>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<?= $this->Form->input('inventory.0.adjustment',
								['class'=> 'form-control',
								'type'=>'number',
								'placeholder' => 'Default is 0',
								'min' => 0,
								'value' => 0,
								'style' => '-moz-appearance:textfield;',
								'label' => 'Current Quantity'])?>
							<?= $this->Form->input('inventory.0.adjustment_type',
								['class'=> 'form-control',
								'type'=> 'hidden',
								'value' => 1])?>
						</div>
						<div class="row">
							<?= $this->Form->input('inventory.0.location_id',
								['class'=> 'form-control select',
								'options' => $location,
								'label' => 'Default Storage Location'])?>
						</div>
						<div class="row">
							<?= $this->Form->input('store_unit',
								['class'=> 'form-control select',
								'options' => $unit,
								'required',
								'label' => 'Selling/Storing UoM'])?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<?= $this->Form->input('item_point.alert_point',
								['class'=> 'form-control',
								'id'=>'alert-point',
								'type'=>'number',
								'placeholder' => 'Default is 0',
								'min' => 0,
								'value' => 0,
								'style' => '-moz-appearance:textfield;',
								'label' => 'Warning Point'])?>
						</div>
						<div class="row">
							<?= $this->Form->input('item_point.reorder_point',
								['class'=> 'form-control',
								'id'=>'reorder-point',
								'type'=>'number',
								'placeholder' => 'Default is 0',
								'min' => 0,
								'value' => 0,
								'style' => '-moz-appearance:textfield;',
								'label' => 'Critical Point'])?>
						</div>
						<div class="row">
							<?= $this->Form->input('item_point.reorder_quantity',
								['class'=> 'form-control',
								'id'=>'reorder-quantity',
								'type'=>'number',
								'placeholder' => 'Default is 0',
								'min' => 0,
								'value' => 0,
								'style' => '-moz-appearance:textfield;',
								'label' => 'Reorder Quantity'])?>
						</div>
					</div>
				</div>
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
				<div <?= $off ?>>
					<label for="many" >
						<span>Add Many</span>
					</label>
					<input type="checkbox" id="many" class="switchery"/>
				</div>
				
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
    $("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$("#item-form").submit(function(e){
		$("#item-form").validate();
		var form_data = $("#item-form").serialize();
		if( (parseInt($('#alert-point').val()) > parseInt($('#reorder-point').val())) && (parseInt($('#reorder-quantity').val()) > parseInt($('#alert-point').val()))){
			$.ajax({
				type : "POST",
				url : "<?= $this->Url->build(['controller'=>'item','action'=>'add'])?>",
				data : form_data,
				dataType : "json",
				success : function(result)
				{
					if(result.status == 'OK')
					{
						$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
						$("#pane-message").fadeIn('fast');
						if($("#many").is(':checked'))
						{
							setTimeout(function()
							{
								$('#pane-message').fadeOut('slow');
								$("#item-form").trigger("reset");
								$(".select").val('').trigger("change");
							}, 2000);
						}
						else
						{
							setTimeout(function()
							{
								$('#pane-message').fadeOut('slow');
								$("#item-form").trigger("reset");
								$(".select").select2('val', '');
								$(".select").val('').trigger("change");
								$('.modal').modal('hide');
							}, 2000);
						}
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
		}
		else
		{
			if(parseInt($('#alert-point').val()) < parseInt($('#reorder-point').val()))
			{
				alert('Warning Point should be greater than the Reorder Point');
			}
			else if(parseInt($('#reorder-quantity').val()) < parseInt($('#alert-point').val()))
			{
				alert('Quantity for Reorder should be greater than the Warning Point');
			}
			$('#pane-message').fadeOut('slow');
		}
		return false;
	});
</script>
