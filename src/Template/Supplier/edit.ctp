<?php
$default = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($default);
if($modal)
{
	$this->set('title','New Supplier');
}
$this->set('title','Modify(Supplier) : ' . $supplier->name);
?>
<div class="supplier panel">
	<?php
		if(!$modal)
		{	
			$redir = $this->Url->build(['controller' => 'supplier','action' => 'index']);
			
			echo '<div class="panel-heading">
					<div class="panel-title">
						<h2>Supplier</h2>
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
		<?= $this->Form->create($supplier,['role'=>'form','id'=>'supplier-edit-form']) ?>
			<fieldset>
				<div class="row">
					<div class="col-md-6">
						<h4>Basic Information</h4>
						<?= $this->Form->input('name',
							['class'=>'form-control',
							'label' => 'Company Name'])?>
						<div class="row">
							<div class="col-md-6">
								<?= $this->Form->input('phone',
									['class'=>'form-control',
									'label' => 'Contact #'])?>
							</div>
							<div class="col-md-6">
								<?= $this->Form->input('email',
									['class'=>'form-control',
									'label' => 'E-Mail'])?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Company Address</h4>
						<?= $this->Form->input('supplier_detail.street',
							['class'=>'form-control',
							'type' => 'textarea',
							'style' => 'resize: vertical; height: 65pt'])?>
						<div class='row'>
							<div class="col-md-4">
								<?= $this->Form->input('supplier_detail.city',
									['class'=>'form-control'])?>
							</div>
							<div class="col-md-4">
								<?= $this->Form->input('supplier_detail.country',
									['class'=>'form-control'])?>
							</div>
							<div class="col-md-4">
								<?= $this->Form->input('supplier_detail.postal_code',
									['class'=>'form-control']) ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?= $this->Form->input('item._ids', 
						['options' => $item,
						'class'=>'form-control select'])?>
				</div>
				<div class="row">
					<?= $this->Form->input('remarks',
						['class'=>'form-control',
						'type' => 'textarea',
						'style' => 'resize: vertical; height: 64px'])?>
				</div>
				<div class="row">
					<span id="pane-message" class="pull-right"></span>
				</div>
				<div class="row">
					<?= $this->Form->button(__('<span>Clear</span>'),[
						'class' => 'btn btn-animated from-top fa fa-remove pull-right',
						'id' => 'btn-reset',
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

<script>
	$(".select").select2();
	$("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$("#supplier-edit-form").submit(function(e){
		var form_data = $("#supplier-edit-form").serialize();
		$.ajax({
			type : "POST",
			url : "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit',$supplier->id])?>",
			data : form_data,
			dataType : "json",
			success : function(result)
			{
				var message = '';
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					setTimeout(function(){
						$('.modal').modal('hide')
					}, 3000);
				}
				else
				{
					$("#pane-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			}
		});
		return false;
	});
</script>
