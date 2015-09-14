<?php
$template = [
    'inputContainer' => '<div class="form-group form-group-default">{{content}}</div>',
];
$required = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($template);
$this->set('title','New Item Category');
?>
<div class="itemCategory panel">
	<div class="panel-body">
		<?= $this->Form->create($itemCategory,['role'=>'form','id'=>'category-form']) ?>
		<fieldset>
			<div class="row">
				<?= $this->Form->input('name',
					['class'=>'form-control',
					'label' => 'Category Name',
					'placeholder' => 'ex. Ink ; A type of Ink', 
					'templates' => $required]) ?>
				<?= $this->Form->input('parent_id',
					['options'=>$parentItemCategory,
					'label' => 'Parent Category',
					'placeholder' => '--leave blank if it is a general category--',
					'empty' =>true,
					'class'=>'full-width form-control select']) ?>
			</div>
			<div class="row">
				<?= $this->Form->input('description',
					['class'=>'form-control',
					'placeholder' => 'Additional information...',
					'type' => 'textarea',
					'style' => 'resize:vertical; height: 64pt']) ?>
			</div>
			<div class="row">
				<div id="pane-message" class="text-danger pull-right"></div>
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
<script type="text/javascript">
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	// Success color: #10CFBD
	elems.forEach(function(html) {
	  var switchery = new Switchery(html, {color: '#10CFBD'});
	});
	$(".select").select2();
	$("#btn-reset").click(function(){
        $(".select").val('').trigger("change");
    });
	$("#category-form").submit(function(e){
		e.preventDefault();
		var data= $("#category-form").serialize();
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'ItemCategory','action'=>'add'])?>",
			data : data,
			dataType: "json",
			success: function(result){
				if(result.status == 'OK')
				{
					$("#pane-message").html('<span class="text-success">' + result.message + '</span>');
					$("#pane-message").fadeIn('fast');
					if($("#many").is(':checked'))
					{
						setTimeout(function()
						{
							$('#pane-message').fadeOut('slow');
							$("#category-form").trigger("reset");
							$(".select").val('').trigger("change");
						}, 3000);
					}
					else
					{
						setTimeout(function()
						{
							$('#pane-message').fadeOut('slow');
							$("#category-form").trigger("reset");
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
	});
</script>