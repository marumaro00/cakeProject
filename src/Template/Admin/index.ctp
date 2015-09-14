<div class="admin panel">
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" class="table table-hover full-width" id="admin-table" >
			<thead>
				<tr>
					<?= $this->Html->tableHeaders([
						'ID',
						'User Name',
						'First Name',
						'Last Name',
						'E-Mail',
						'Created',
						'Modified',
						'Designation',
						'Status',
						'Actions'])?>
				</tr>
			</thead>
		</table>
	</div>
</div>


<script>
	$.fn.editable.defaults.mode = 'inline';
	$.fn.dataTable.ext.errMode = 'throw';
	var edit = "<?= $this->Url->build(['controller'=>'admin','action'=>'edit'])?>/";
	var table = $("#admin-table").DataTable({
		processing : true,
		scrollX : true,
		ajax : {
			url : "<?= $this->Url->build(['controller'=>'admin','action'=>'content'])?>"
		},
		columns : [
			{ data : 'id'},
			{ data : 'username',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'username', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'admin_profile.firstname',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'admin_profile.firstname', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'admin_profile.lastname',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'admin_profile.lastname', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'admin_profile.email',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'email',
						name : 'admin_profile.lastname', 
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'created'},
			{ data : 'modified'},
			{ data : 'designation.name',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'select',
						value: cellData,
						source : <?= json_encode($position)?>,
						name : 'designation_id',
						url : edit,
						ajaxOptions: 
						{
							dataType: 'json'
						},
						success: function(response, newValue) {
							if(response.status == 'error') {
								return response.message; //msg will be shown in editable form
							}
						}
					});
				}},
			{ data : 'status'},
			{ data : null,
				render : function(data, type, full, meta){
					var remove = "<?= $this->Url->build(['controller'=>'admin','action'=>'delete'])?>/" + full.id;
					var content = "<a href='" + edit+full.id+"/1" + "' class='m-r-15 fa fa-pencil btn-edit'></a>" +
									"<a href='" + remove + "' class='text-danger fa fa-trash-o btn-delete'></a>";
					return content;
				},
			},
		],
	});
	setInterval( function () {
		table.ajax.reload();
	}, 50000 );

	table.on("click","a.btn-edit",function(e){
		$('#modal').find('.modal-content').load($(this).attr('href'));
        $('#modal').modal('show');
		return false;
	});
	table.on("click","a.btn-delete",function(e){
		var result = confirm('Are you sure you want to delete this?');
        var row = $(this).parents('tr'); //get row
        $('.ajax_loader').show();
        $('#flashMessage').fadeOut();
        if(result)
        {
            $.ajax({
                type:"POST",
                url:$(this).attr('href'),
                dataType: "json",
                success:function(response){
                    // hide loading image
                    $('.ajax_loader').hide();
                    
                    // hide table row on success
                    if(response.success == true) {
                        row.fadeOut();
                    }
                    
                    // show respsonse message
                    if( response.message ) {
                        console.log(response.message);
                    } else {
                        $('#ajax_msg').html( "<p id='flashMessage' class='flash_bad'>An unexpected error has occured, please refresh and try again</p>" ).show();
                    }
                }
            });
        }
        return false;
	});
</script>