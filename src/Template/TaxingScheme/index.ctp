<div class="taxingScheme panel">
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" class="table table-hover dt-responsive" id="scheme-table">
			<thead>
				<tr>
					<?= $this->Html->tableHeaders([
						'ID',
						'Taxing Scheme Name',
						'Rate',
						'Actions'])?>
				</tr>
			</thead>
		</table>
	</div>
</div>

<!--Script-->
<script>
	$.fn.editable.defaults.mode = 'inline';
	$.fn.dataTable.ext.errMode = 'throw';
	var ts_table = $("#scheme-table").DataTable({
		processing : true,
		ajax : "<?= $this->Url->build(['controller'=>'taxing_scheme','action'=>'content'])?>",
		columns : [
		{ data : 'id' },
		{ data : 'name',
			createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
				var edit = "<?= $this->Url->build(['controller'=>'taxing_scheme','action'=>'edit'])?>/";	
				$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
				$(cell).find('.editable').editable({
					type : 'text',
					name : 'name', 
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
			} },
		{ data : 'rate',
			createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
				var edit = "<?= $this->Url->build(['controller'=>'taxing_scheme','action'=>'edit'])?>/";	
				$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
				$(cell).find('.editable').editable({
					type : 'number',
					name : 'rate', 
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
			}  },
		{ data : null,
			render : function(data, type, full, meta){
				var edit = "<?= $this->Url->build(['controller'=>'payment_term','action'=>'edit'])?>/";	
				var remove = "<?= $this->Url->build(['controller'=>'payment_term','action'=>'delete'])?>/" + full.id;
				var content = "<a href='" + edit+full.id+"/1" + "' class='m-r-15 fa fa-pencil btn-edit'></a>" +
								"<a href='" + remove + "' class='text-danger fa fa-trash-o btn-delete'></a>";
				return content;
			},
			orderable:false,
			searchable: false}],
	});
	setInterval( function () {
		ts_table.ajax.reload();
	}, 50000 );

	ts_table.on("click","a.btn-edit",function(e){
		$('#modal').find('.modal-content').load($(this).attr('href'));
        $('#modal').modal('show');
		return false;
	});
	ts_table.on("click","a.btn-delete",function(e){
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