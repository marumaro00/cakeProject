<div class="inventory panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Inventory</h1>
		</div>
		<div class="control pull-right inline m-t-15">
			<div id="date-range" class="input-group input-daterange record-date">
				<input type="text" class="form-control" id='start'>
				<span class="input-group-addon">to</span>
				<input type="text" class="form-control" id='end'/>
			</div>
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
					'Reorder Point',
					'Warning Point'])?>
			</tr>
		</thead>
		</table>
	</div>
</div>

<!---->

<script>
	var date = $('.record-date').datepicker({
		format: 'yyyy-mm-dd',
		todayBtn: true,
		todayHighlight: true,
		autoClose: true
	});
	
	var inv_table = $("#inventory-table").DataTable({
		ajax: {
			url: "<?= $this->Url->build(['controller'=>'inventory','action'=>'data'])?>",
			data : function(d) {
				d.from = $('#start').val();
				d.to = $('#end').val();
			},
			type: 'GET',
			dataType: 'json'
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
	date.on('changeDate', function(){
		inv_table.ajax.reload();
	});
</script>
