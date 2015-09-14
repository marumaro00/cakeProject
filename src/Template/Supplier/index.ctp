<div class="panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Suppliers</h1>
		</div>
		<div class="control pull-right">
			<nav>
				<button id="btn-new" class="btn btn-primary m-t-20 btn-animated from-top fa fa-plus-square" data-toggle="modal" data-target="#modal">
					<span>New</span>
				</button>
			</nav>
		</div>
	</div>
	<div class="panel-body table-responsive">
		<table cellpadding="0" cellspacing="0" class="table table-hover " id="supplier-table" style="width: 100%">
		<thead>
			<tr>
				<?= $this->Html->tableHeaders(
					['ID',
					'Company Name',
					'Contact No',
					'Email',
					'Street',
					'City',
					'Country',
					'Postal Code',
					'Remarks',
					'Action']) ?>
			</tr>
		</thead>
		</table>
	</div>
</div>


<!---->
<script>
	$.fn.editable.defaults.mode = 'inline';
	$.fn.dataTable.ext.errMode = 'throw';
	var sup_table = $("#supplier-table").DataTable({
		processing : true,
		scrollX : true,
		ajax : "<?= $this->Url->build(['controller'=>'supplier','action'=>'data'])?>",
		columns : [
			{ data : 'id' },
			{ data : 'name',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
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
				}},
			{ data : 'phone',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'tel',
						name : 'phone', 
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
			{ data : 'email',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'email',
						name : 'email', 
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
			{ data : 'supplier_detail.street',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'supplier_detail.street', 
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
			{ data : 'supplier_detail.city',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'supplier_detail.city', 
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
			{ data : 'supplier_detail.country',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'supplier_detail.country', 
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
			{ data : 'supplier_detail.postal_code',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'text',
						name : 'supplier_detail.postal_code', 
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
			{ data : 'remarks',
				createdCell : function (cell, cellData, rowData, rowIndex, colIndex){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					$(cell).html("<a class='editable' data-pk='" + rowData.id + "'>" + cellData + "</a>");
					$(cell).find('.editable').editable({
						type : 'textarea',
						name : 'remarks', 
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
				},
				orderable : false,
				searchable : false},
			{ data : null,
				render : function(data, type, full, meta){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					var remove = "<?= $this->Url->build(['controller'=>'supplier','action'=>'delete'])?>/" + full.id;
					var content = "<a href='" + edit+full.id+"/1" + "' class='m-r-15 fa fa-pencil btn-edit'></a>" +
									"<a href='" + remove + "' class='text-danger fa fa-trash-o btn-delete'></a>";
					return content;
				},
				orderable:false,
				searchable: false}]		
	});
	
	setInterval( function () {
		sup_table.ajax.reload();
	}, 50000 );

	sup_table.on("click","a.btn-edit",function(e){
		$('#modal').find('.modal-content').load($(this).attr('href'));
        $('#modal').modal('show');
		return false;
	});
	sup_table.on("click","a.btn-delete",function(e){
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
	$('#btn-new').click(function(){
		$("#modal").find(".modal-dialog").addClass("modal-lg");
		$("#modal").find('.modal-content').load('<?= $this->Url->build(["controller"=>"supplier","action"=>"add",true])?>');
	});
</script>
