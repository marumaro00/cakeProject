<div class="inventory panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Inventory</h1>
		</div>
		<div class="control pull-right">
			<!--<nav>
				<button id="adjust-item" class="btn btn-primary m-t-20 btn-animated from-top fa fa-sliders" data-toggle="modal" data-target="#modal">
					<span>Adjust</span>
				</button>
			</nav>-->
		</div>
	</div>
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" class="table table-hover" id="inventory-table">
		<thead>
			<tr>
				<?= $this->Html->tableHeaders([
					'ID',
					'Item Code',
					'Item Name',
					'Quantity',
					'Unit',
					'Actions',
					'Reorder Point',
					'Warning Point'])?>
			</tr>
		</thead>
		</table>
	</div>
</div>

<!---->

<script>
	var inv_table = $("#inventory-table").DataTable({
		ajax: {
			url: "<?= $this->Url->build(['controller'=>'inventory','action'=>'data'])?>",
			data : {
				'content' : true,
			}
		},
		scrollX: true,
		columns : [
			{ data : 'item_id',
				searchable: false,
				orderable: false,
				visible : false},
			{ data : 'item.code'},
			{ data : 'item.name'},
			{ data : 'quantity'},
			{ data : 'item.unit.code'},
			{ data : null,
				render : function(data, type, full, meta){
					var adjust = "<?= $this->Url->build(['controller'=>'inventory','action' => 'adjust'])?>/" + full.item_id;
					var content = "<a href='" + adjust+"/1" + "' class='fa fa-sliders btn-adjust'></a>";
					return content;
				},
				orderable: false,
				searchable: false},
			{ data : 'item.item_point.reorder_point',
				searchable: false,
				orderable: false,
				visible : false},
			{ data : 'item.item_point.alert_point',
				searchable: false,
				orderable: false,
				visible : false}],
		createdRow : function (row, data, index ) {
			if(data.quantity < data.item.item_point.reorder_point)
			{
				$('td', row).css('background-color','#F55753 !important');
			}
			else if(data.quantity < data.item.item_point.alert_point)
			{
				$('td', row).css('background-color','#F8D053 !important');
			}
		}
	});
	inv_table.on("click","a.btn-adjust",function(e){
		$('#modal').find('.modal-content').load($(this).attr('href'));
        $('#modal').modal('show');
		return false;
	});
	setInterval( function () {
		inv_table.ajax.reload();
	}, 50000 );
	$(document).on('hide.bs.modal', '#modal', function () {
		inv_table.ajax.reload();
	});
</script>
