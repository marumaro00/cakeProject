<div class="inventoryWaste panel">
	<div class="panel-heading">
		<div class="panel-title">
			<h1>Stock Wasted</h1>
		</div>
		<div class="control pull-right">
			<nav>
				<button id="add-waste" class="btn btn-primary m-t-20 btn-animated from-top fa fa-sliders" data-toggle="modal" data-target="#modal">
					<span>Add</span>
				</button>
			</nav>
		</div>
	</div>
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" class="table table-hover" id="item-waste-table">
			<thead>
				<tr>
					<?= $this->Html->tableHeaders([
						'ID',
						'Item',
						'Date',
						'Quantity',
						'Type'
					])?>
				</tr>
			</thead>
		</table>
	</div>
</div>

<script>
	var waste_table = $('#item-waste-table').DataTable({
		ajax : "<?= $this->Url->build(['controller'=>'InventoryWaste','action' => 'data'])?>",
		scrollX: true,
		columns : [
			{ data : 'item_id',
				visible : false},
			{ data : 'item.code'},
			{ data : 'reference_date',
				render : function(data){
					var jDate = new Date(data);
					return jDate.toUTCString();
				}},
			{ data : 'quantity'},
			{ data : 'inventory_waste_type.name'}]
	});
	$("#add-waste").click(function(){
		$("#modal").find(".modal-content").load('<?= $this->Url->build(["controller"=>"InventoryWaste","action"=>"add",true]) ?>');
	});
</script>
