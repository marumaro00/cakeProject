<?php
$this->set('title','Upload image');
?>
<div class="adminImage panel">
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
	var id = <?= $id ?>;
	$("#dz-imageuploader").dropzone({
		url: '<?= $this->Url->build(['controller'=>'AdminImage','action'=>'add'])?>/' +id,
		addRemoveLinks: true,
		autoDiscover: false,
		acceptedFiles: 'image/*',
		maxFiles: 1,
		sending : function(file, xhr, formData){
			formData.append('user', id);
		},
		success : function()
		{
			$('.modal').modal('hide');
		}
	});

</script>