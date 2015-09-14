<div class="panel">
	<div class="row">
		<div class="col-md-6">
			<div class="panel col-md-9">
				<div class="row">
					<h4>Company Logo</h4>
					<div class="row center-block">
						<div style="float: none !important;">
							<img class="company_logo full-width" alt="user image" src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>"/>
						</div>
					</div>
					<div class="row text-center">
						<span class="hint-text">Suggested Resolution: 95 x 30</span>
					</div>
					<div class="row">
						<?= $this->Html->link('Upload New','#',
								['class' => 'btn btn-primary center-block ',
								 'id' => 'btn-upload-logo',
								 'data-toggle' => 'modal',
								 'data-target' => '#modal'])?>
					</div>	
				</div>
			</div>		
		</div>
		<div class="col-md-6 bg-master-light">
			<div class="panel bg-master-light">
				<h3>Company Information</h3>
				<?= $this->Form->create($company,['id'=>'form-company'])?>
					<fieldset>
						<div class="row">
							<div class="form-group form-group-default required">
								<?=  $this->Form->input('name',
										['class'=>'form-control',
										 'label' => 'Company Name']) ?>
							</div>
							<div class="form-group form-group-default required">
								<?=  $this->Form->input('contact',
										['class'=>'form-control',
										'id'=>'contact',
										'label' => 'Contact #']) ?>
							</div>
							<div class="form-group form-group-default required">
								<?=  $this->Form->input('address',
										['class'=>'form-control',
										 'label' => 'Company Address',
										 'type' => 'textarea',
										 'style' => 'height: 64pt; resize: vertical']) ?>
							</div>
						</div>
						<div class="row">
							<span class="pull-right" id="panel-message"></span>
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
				<?= $this->Form->end()?>
			</div>
		</div>
	</div>
	<div class="row">
		<h4>Banner</h4>
		<div style="float: none !important">
			<img class="company_banner full-width" alt="user image" src="<?= $this->Url->build(['controller'=>'Company','action'=>'Banner'])?>"/>
		</div>
		<div class="row text-center">
			<span class="hint-text">Suggested Resolution: (Your Preferred screen size)</span>
		</div>
		<div class="row">
			<?= $this->Html->link('Upload New','#',
					['class' => 'btn btn-primary center-block',
					 'id' => 'btn-upload-banner',
					 'data-toggle' => 'modal',
					 'data-target' => '#modal'])?>
		</div>
	</div>
</div>

<script>
	$("#contact").mask("(999) 999-9999 ?loc. 9999",{placeholder: ' '});
	$('#btn-upload-logo').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"Company","action"=>"upload",'Logo'])?>');
	});
	$('#btn-upload-banner').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"Company","action"=>"upload",'Banner'])?>');
	});
	$('#form-company').submit(function(e){
		
		$.ajax({
			type: "post",
			url : "<?= $this->Url->build(['controller'=>'company','action'=>'information'])?>",
			data : $("#form-company").serialize(),
			dataType : "json",
			success: function (result) 
			{
				var message = '';
				if(result.status == 'OK')
				{
					$("#panel-message").html('<span class="text-success">' + result.message + '</span>');
					$("#panel-message").fadeIn('fast');
					if($("#many").is(':checked'))
					{
						setTimeout(function()
						{
							$('#panel-message').fadeOut('slow');
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
					$("#panel-message").html('<span class="text-danger">' + result.message + '</span>');
				}
			},
		});
		return false;
	});
</script>