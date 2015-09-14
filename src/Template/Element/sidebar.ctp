<!-- BEGIN SIDEBAR HEADER -->
<div class="sidebar-header">
	<img src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>" alt="logo" class="brand" data-src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>" data-src-retina="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>" width="95" height="30">
	<div class="sidebar-header-controls">
		<button data-pages-toggle="#appMenu" class="btn btn-xs visible-sm-inline visible-xs-inline sidebar-slide-toggle btn-link m-l-20" type="button">
			<i class="fa fa-angle-down fs-16"></i>
        </button>
        <button data-toggle-pin="sidebar" class="btn btn-link visible-md-inline" type="button">
			<i class="fa fs-12"></i>
        </button>
    </div>
</div>
<!-- END SIDEBAR HEADER -->
<!-- BEGIN SIDEBAR MENU -->
<div class="sidebar-menu">
	<!--START MENU ITEMS-->
	<ul class="menu-items">
		<!--START DASHBOARD LINK-->
		<li class="m-t-30 active">
			<a href="<?= $this->Url->build(['controller'=>'Pages','action'=>'display','dashboard'])?>" class="detailed">
				<span class="title">Dashboard</span>
            	<span class="details"></span>
            </a>
            <span class="icon-thumbnail ">
				<i class="fa fa-dashboard"></i>
            </span>
        </li>
		<!--END DASHBOARD LINK-->
		<!--START PURCHASING TAB-->
		<li>
			<a href="#">
				<span class="title">Purchasing</span>
				<span class="arrow"></span>
			</a>
			<span class="icon-thumbnail ">
               	<i class="fa fa-truck"></i>
            </span>
			<ul class="sub-menu">
				<li>
				    <a href="#">
                       	<span class="title">Supplier</span>
                       	<span class="arrow"></span>
                    </a>
					<span class="icon-thumbnail">S</span>
					<ul class="sub-menu">
						<li>
							<?= $this->Html->link(__('Add New Supplier'), ['controller' => 'supplier','action' => 'add']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-plus"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Supplier List'), ['controller' => 'supplier','action' => 'index']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Supplier\'s Products'), ['controller' => 'supplier','action' => 'items']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
					</ul>
				</li>
				<li>
				    <a href="#">
                       	<span class="title">Purchase Order</span>
                       	<span class="arrow"></span>
                    </a>
					<span class="icon-thumbnail">S</span>
					<ul class="sub-menu">
						<li>
							<?= $this->Html->link(__('Create New Order'), ['controller' => 'supplier','action' => 'add']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-plus"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Recent Orders'), ['controller' => 'supplier','action' => 'index']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Received Orders'), ['controller' => 'supplier','action' => 'items']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Unreceived Orders'), ['controller' => 'supplier','action' => 'items']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Paid Orders'), ['controller' => 'supplier','action' => 'items']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
						<li>
							<?= $this->Html->link(__('Unpaid Orders'), ['controller' => 'supplier','action' => 'items']) ?>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<!--END PURCHASING TAB-->
		<!--START INVENTORY TAB-->
        <li class="">
			<a href="#">
				<span class="title">Inventory</span>
				<span class="arrow"></span>
            </a>
            <span class="icon-thumbnail ">
               	<i class="fa fa-archive"></i>
            </span>
            <ul class="sub-menu">
				<li class="">
					<a href="#">
						<span class="title">Product</span>
                        <span class="arrow"></span>
                    </a>
                	<span class="icon-thumbnail">P</span>
                    <ul class="sub-menu">
						<li class="">
							<a href="<?= $this->Url->build(['controller'=>'item','action'=>'add']) ?>" id="add-product">Add New Product</a>
                            <span class="icon-thumbnail">
								<i class="fa fa-plus"></i>
							</span>
                        </li>
                        <li class="">
                            <a href="<?= $this->Url->build(['controller'=>'item','action'=>'index']) ?>" id="list-product">Product List</a>
                            <span class="icon-thumbnail">
                               	<i class="fa fa-list-alt"></i>
                            </span>
                        </li>
						<li class="">
                            <a href="<?= $this->Url->build(['controller'=>'item','action'=>'suppliers']) ?>" id="list-product">Item's Suppliers</a>
                            <span class="icon-thumbnail">
                               	<i class="fa fa-list-alt"></i>
                            </span>
                        </li>
                        <li class="">
							<a href="category.php" id="list-category">Product Price</a>
                            <span class="icon-thumbnail">
                               	<i class="fa fa-dollar"></i>
                            </span>
                        </li>
                    </ul>
              	</li>
                <li class="">
                	<a href="#">
                       	<span class="title">Stocks</span>
                        <span class="arrow"></span>
                    </a>
                	<span class="icon-thumbnail">St</span>
                    <ul class="sub-menu">
                        <li class="">
							<a href="<?= $this->Url->build(['controller'=>'inventory'])?>" id="add-product">Current Stock</a>
							<span class="icon-thumbnail">
                               	<i class="fa fa-plus"></i>
                            </span>
                        </li>
                        <li class="">
							<a href="<?= $this->Url->build(['controller'=>'Inventory','action'=>'Records'])?>" id="list-product">Previous Stock</a>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
                        </li>
						<li class="">
							<a href="<?= $this->Url->build(['controller'=>'InventoryWaste'])?>" id="list-product">Stock Wasted</a>
                            <span class="icon-thumbnail">
                              	<i class="fa fa-list-alt"></i>
                            </span>
                        </li>
                        <li class="">
                            <a href="workorder.php" id="list-category">Work Order</a>
                            <span class="icon-thumbnail">
                               	<i class="fa fa-th-list"></i>
                            </span>
                        </li>
                    </ul>
              	</li>
            </ul>
        </li>
    </ul>
	<!--END MENU ITEMS-->
    <div class="clearfix"></div>
</div>
<!-- END SIDEBAR MENU -->