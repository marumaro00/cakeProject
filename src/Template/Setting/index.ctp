<?= $this->Html->script('/js/setting.js') ?>
<div class="panel">

    <ul class="nav nav-tabs nav-tabs-left nav-tabs-simple">
        <li>
            <a data-toggle="tab" href="#company">
                <i class="fa fa-building "></i>
                <span class="title">Company</span>
            </a>
        </li>
        <li  class="active">
           	<a data-toggle="tab" href="#users">
               	<i class="fa fa-users"></i>
               	<span class="title">Users</span>
            </a>
        </li>
        <li>
           	<a data-toggle="tab" href="#references">
             	<i class="fa fa-cogs"></i>
               	<span class="title">References</span>
            </a>
        </li>
		<li>
           	<a data-toggle="tab" href="#preferences">
             	<i class="fa fa-cog"></i>
               	<span class="title">Preferences
				</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
		<!--START COMPANY TAB-->
        <div class="tab-pane" id="company">
			<div id="company-panel" class="panel panel-default">
			</div>
		</div>
		<!--END COMPANY TAB-->
		<!--START USERS TAB-->
		<div class="tab-pane active" id="users">
			<div id="users-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Users</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-user"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-user-table">
					</div>
				</div>
			</div>
        </div>
        <!--END USERS TAB-->
        <!--START REFERENCE TAB-->
        <div class="tab-pane" id="references">
			<!--START DESIGNATION PANEL-->
			<div id="designation-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Designations</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-collapse" data-toggle="collapse">
									<i class="portlet-icon portlet-icon-collapse"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-designation"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-designation-table">
					</div>
				</div>
			</div>
			<!--END DESIGNATION PANEL-->
			<!--START CATEGORY PANEL-->
			<div id="category-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Categories</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-collapse" data-toggle="collapse">
									<i class="portlet-icon portlet-icon-collapse"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-category"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-item-category-table">
					</div>
				</div>
			</div>
			<!--END CATEGORY PANEL-->
			<!--START PAYMENT TERM-->
			<div id="term-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Payment Terms</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-collapse" data-toggle="collapse">
									<i class="portlet-icon portlet-icon-collapse"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-term"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-payment-term-table">
					</div>
				</div>
			</div>
			<!--END PAYMENT TERM-->
			<!--START TAXING SCHEME-->
			<div id="taxing-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Taxing Scheme</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-collapse" data-toggle="collapse">
									<i class="portlet-icon portlet-icon-collapse"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-scheme"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-taxing-scheme-table">
					</div>
				</div>
			</div>
			<!--END TAXING SCHEME-->
			<!--START LOCATION-->
			<div id="location-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Inventory Locations</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-collapse" data-toggle="collapse">
									<i class="portlet-icon portlet-icon-collapse"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-location"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-location-table">
					</div>
				</div>
			</div>
			<!--END LOCATION-->
			<!--START UNIT-->
			<div id="unit-panel" class="panel panel-default" data-pages="portlet">
				<div class="panel-heading">
					<div class="panel-title">Unit Of Measurements</div>
					<div class="panel-controls">
						<ul>
							<li>
								<a href="#" class="portlet-collapse" data-toggle="collapse">
									<i class="portlet-icon portlet-icon-collapse"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-maximize" data-toggle="maximize">
									<i class="portlet-icon portlet-icon-maximize"></i>
								</a>
							</li>
							<li>
								<a href="#" class="portlet-refresh" data-toggle="refresh">
									<i class="portlet-icon portlet-icon-refresh"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div>
						<button class="btn btn-primary btn-animated from-top fa fa-plus-square" id="new-unit"  data-toggle="modal" data-target="#modal">
							<span>New</span>
						</button>
					</div>
					<div id="panel-unit-table">
					</div>
				</div>
			</div>
			<!--END UNIT-->
        </div>
		<!--END REFERENCE TAB-->
		<!--START PREFERENCE TAB-->
		<div class="tab-pane" id="preferences">
			<div class="panel">
				<div class="panel-body">
					<h4>login layout</h4>
					<div class="radio radio-default">
						<input id="layout-default-radio" type="radio" name="loginlayout" value="top"></input>
						<label for="layout-default-radio">Default</label>
						<input id="layout-simple-radio" type="radio" name="loginlayout" value="top-simple"></input>
						<label for="layout-simple-radio">Simple</label>
					</div>
				</div>			
			</div>
		</div>
		<!--END PREFERENCE TAB-->
    </div>
</div>
						

<script>
	var layout = '<?= $loginLayout?>';
	if(layout == 'top')
	{
		$('#layout-default-radio').prop('checked',true);
	}
	else
	{
		$('#layout-simple-radio').prop('checked',true);
	}
	$('input[type=radio][name=loginlayout]').change(function(){
		$.ajax({
			type: 'post',
			url: "<?= $this->Url->build(['controller'=>'Setting','action'=>'layout'])?>",
			data : this.value,
			success : function(data){
				console.log('successed');
			}
		});
	});
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
	// Success color: #10CFBD
	elems.forEach(function(html) {
	  var switchery = new Switchery(html, {color: '#10CFBD'});
	});

	function load(container, link)
    {
        $.ajax({
            url : link,
            dataType: 'html',
            async : true,
            success: function(result){
                $(container).html(result);
            }
        });
    };
	load('#panel-designation-table','<?= $this->Url->build(["controller"=>"designation","action"=>"index",true])?>');
	load('#panel-user-table','<?= $this->Url->build(["controller"=>"admin","action"=>"index",true])?>');
	load('#panel-item-category-table','<?= $this->Url->build(["controller"=>"item-category","action"=>"index",true])?>');
	load('#panel-payment-term-table','<?= $this->Url->build(["controller"=>"paymentTerm","action"=>"index",true])?>');
	load('#panel-taxing-scheme-table','<?= $this->Url->build(["controller"=>"taxingScheme","action"=>"index",true])?>');
	load('#panel-location-table','<?= $this->Url->build(["controller"=>"location","action"=>"index",true])?>');		
	load('#panel-unit-table','<?= $this->Url->build(["controller"=>"unit","action"=>"index",true])?>');	
	load('#company-panel','<?= $this->Url->build(["controller"=>"Company","action"=>"index",true])?>');	
	$('#new-user').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"admin","action"=>"add",true]) ?>');
	});
	$('#new-designation').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"designation","action"=>"add",true])?>');
	});
	$('#new-category').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"item_category","action"=>"add",true])?>');
	});
	$('#new-term').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"paymentTerm","action"=>"add",true])?>');
	});
	$('#new-scheme').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"taxingScheme","action"=>"add",true])?>');
	});
	$('#new-location').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"location","action"=>"add",true])?>');
	});
	$('#new-unit').click(function(){
		load('.modal-content','<?= $this->Url->build(["controller"=>"unit","action"=>"add",true])?>');
	});
	
</script>