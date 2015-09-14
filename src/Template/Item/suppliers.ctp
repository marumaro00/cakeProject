<div class="panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Suppliers per Product</h1>
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
		<table cellpadding="0" cellspacing="0" class="table table-hover " id="supplier-items-table" style="width: 100%">
		<thead>
			<tr>
				<?= $this->Html->tableHeaders(
					['ID',
					'Comapany Name',
					'Contact #',
					'E-Mail',
					'Address',
					'Description',
					'Action',
					'Item',
					'Item ID']) ?>
			</tr>
		</thead>
		</table>
	</div>
</div>


<!---->
<script>
	$.fn.dataTable.ext.errMode = 'throw';
	var sup_table = $("#supplier-items-table").DataTable({
		processing : true,
		scrollX : true,
		ajax : "<?= $this->Url->build(['controller'=>'SupplierItem','action'=>'supplier'])?>",
		columns : [
			{ data : 'supplier_id' },
			{ data : 'supplier.name' },
			{ data : 'supplier.phone' },
			{ data : 'supplier.email'},
			{ data : 'supplier.supplier_detail',
				render : function (data,type,full)
				{
					return data.street + ', ' +
						   data.city + ' ' +
						   data.postal_code + ' ' + 
						   data.country;
				}},
			{ data : 'item.description'},
			{ data : null,
				render : function(data, type, full, meta){
					var edit = "<?= $this->Url->build(['controller'=>'supplier','action'=>'edit'])?>/";
					var remove = "<?= $this->Url->build(['controller'=>'SupplierItem','action'=>'delete'])?>/" + full.supplier_id+ '/' + full.item_id + '.json';
					var content = "<a href='" + edit+full.id+"/1" + "' class='m-r-15 fa fa-pencil btn-edit'></a>" +
									"<a href='" + remove + "' class='text-danger fa fa-trash-o btn-delete'></a>";
					return content;
				},
				orderable:false,
				searchable: false},
			{ data : 'item.code',
				visible : false
			},
			{ data : 'item_id',
				visible : false}],
			drawCallback : function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(7, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                    );
                    last = group;
                }
            } );
        },
		order : [[ 7, 'asc' ]]
			
		});
	$('#supplier-items-table tbody').on( 'click', 'tr.group', function () {
        var currentOrder = sup_table.order()[0];
        if ( currentOrder[0] === 7 && currentOrder[1] === 'asc' ) {
            sup_table.order( [ 7, 'desc' ] ).draw();
        }
        else {
            sup_table.order( [ 7, 'asc' ] ).draw();
        }
    } );
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
		$("#modal").find('.modal-content').load('<?= $this->Url->build(["controller"=>"item","action"=>"add",true])?>');
	});
</script>
