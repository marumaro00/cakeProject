<?php
$template = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($template);
$this->set('title','New Inventory Location');
?>
<div class="location panel">
	<div class="panel-body">
		<?= $this->Form->create($location,['role'=>'form','id'=>'location-form']) ?>
		<fieldset>
			<div class="row">
				<div class="col-md-4">
					<?= $this->Form->input('code',
						['class'=>'form-control',
						'placeholder' => 'ex. WH-1',
						'label' => 'Location Code']) ?>
				</div>
				<div class="col-md-8">
					<?= $this->Form->input('name',
						['class'=>'form-control',
						'placeholder' => 'ex. Warehouse 1',
						'label'=>'Location Name']) ?>
				</div>
			</div>
			<div class="row">
				<span class="pull-right" id="pane-message"></span>
			</div>
			<div class="row">
				<?= $this->Form->button(__('<span>Clear</span>'),[
					'class' => 'btn btn-animated from-top fa fa-remove pull-right',
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
    $("#location-form").submit(function(e){
        var data= $("#location-form").serialize();
        $.ajax({
            type: "post",
            url : "<?= $this->Url->build(['controller'=>'location','action'=>'add',true])?>",
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