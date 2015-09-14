<?php
$this->set('title','Upload Comapany ' . $type);
?>
<div class="companyImage panel">
    <?= $this->Form->create(null, ['type' => 'file','class'=>'dropzone','id'=>'dz-imageuploader']) ?>
		
		<div class="fallback">
			<input type="file" name="file" />
			<button type="submit">
				Upload
			</button>
		</div>
		
    <?= $this->Form->end() ?>
</div>

<script>
	$("#dz-imageuploader").dropzone({
		url: '<?= $this->Url->build(['controller'=>'Company','action'=>'upload',$type])?>',
		addRemoveLinks: true,
		autoDiscover: false,
		acceptedFiles: 'image/*',
		maxFiles: 1,
		success : function(data)
		{
			console.log(data);
			$('.modal').modal('hide');
		}
	});
</script>