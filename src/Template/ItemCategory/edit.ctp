<?php
$new_templates = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($new_templates);
$this->set('title','Modify(Category) : ' . $itemCategory->name);
?>
<div class="itemCategory panel">
	<div class="panel-body">
		<?= $this->Form->create($itemCategory,['role' => 'form','id'=>'category-form']) ?>
		<fieldset>
			<div class="row">
				<?= $this->Form->input('name',
					['class'=>'form-control',
					'label' => 'Category Name',
					'placeholder' => 'ex.Ink ; A type of Ink',
					'templates' => $required]) ?>
				<?= $this->Form->input('parent_id',
					['options'=>$parentItemCategory,
					'label' => 'Parent Category',
					'placeholder' => '--leave blank if it is a general category--',
					'empty' => true,
					'class'=>'form-control select']) ?>
			</div>
			<div class="row">
				<?= $this->Form->input('description',
					['class'=>'form-control',
					'type'=>'textarea',
					'style'=>'resize: vertical; height: 64pt']) ?>
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

<!--Script-->

<script>
	$(".select").select2();
	$("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$("#category-form").submit(function(e){
		var form_data = $("#category-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'ItemCategory','action'=>'edit',$itemCategory->id]) ?>",
			data : form_data,
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
