<?php
$template = [
    'inputContainer' => '<div class="form-group form-group-default required">{{content}}</div>',
];
$this->Form->templates($template);
$this->set('title','Modify(Tax) : ' . $taxingScheme->name);
?>

<div class="taxingScheme form large-10 medium-9 columns">
    <?= $this->Form->create($taxingScheme,['role'=>'form','id'=>'scheme-edit-form']) ?>
    <fieldset>
			<div class="row">
				<div class="col-md-8">
					<?= $this->Form->input('name',
						['class'=>'form-control',
						'placeholder'=>'ex. VAT',
						'label'=>'Taxing Scheme Name']) ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('rate',
						['class'=>'form-control',
						'min-length'=>0.9999,
						'placeholder' => '0.0000',
						'label'=>'Rate in Percent(%)']) ?>
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
			</div>
		</fieldset>
    <span id="pane-message" class="text-danger"></span>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    $("#scheme-edit-form").submit(function(e){
        var data= $("#scheme-edit-form").serialize();
        $.ajax({
            type: "POST",
            url : "<?= $this->Url->build(['controller'=>'taxingScheme','action'=>'edit',$taxingScheme->id])?>",
            data : data,
            dataType: "json",
            success: function(result){
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
            },
            error: function(x,h,r){
                $("#message").html(h);
            }
        });
		return false;
    });
</script>