<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
			<?= $this->fetch('title') ?>
		</title>
		<?= $this->Html->meta('icon') ?>
				
		<?= $this->Html->css('/js/lib/pace/pace-theme-flash.css') ?>
		<?= $this->Html->css('/js/lib/jquery-ui/jquery-ui.min.css') ?>
		<?= $this->Html->css('/js/lib/jquery-scrollbar/jquery.scrollbar.css') ?>
		<?= $this->Html->css('/js/lib/bootstrap/css/bootstrap.min.css') ?>
		<?= $this->Html->css('/js/lib/bootstrap-select2/css/select2.min.css') ?>
		<?= $this->Html->css('/js/lib/pages-icons/pages-icons.css') ?>
		<?= $this->Html->css('/js/lib/font-awesome/css/font-awesome.css') ?>
		
		<?= $this->Html->css('/js/lib/pages/pages.css') ?>
		
		<?= $this->Html->script('/js/lib/jquery/jquery.min.js') ?>
		<?= $this->Html->script('/js/lib/jquery-scrollbar/jquery.scrollbar.min.js') ?>
		<?= $this->Html->script('/js/lib/pace/pace.min.js') ?>
		<?= $this->Html->script('/js/lib/modernizr/modernizr.custom.js') ?>
		<?= $this->Html->script('/js/lib/jquery-ui/jquery-ui.min.js') ?>
		<?= $this->Html->script('/js/lib/jquery-validation/jquery.validate.min.js') ?>
		<?= $this->Html->script('/js/lib/bootstrap/js/bootstrap.min.js') ?>
		<?= $this->Html->script('/js/lib/bootstrap-select2/js/select2.min.js') ?>
		<?= $this->Html->script('/js/lib/pages/pages.js') ?>
		
		
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
	</head>
	<body>
		<div class="login-wrapper" style="background-color: #FFFFFF">
			<div class="login-container bg-white center-margin" style="float: none;">
				<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
					<img class="img-logo"src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo',true])?>" alt="logo" data-src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo',true])?>" data-src-retina="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo',true])?>" width="78" height="22">
					<p></p>
					<?= $this->fetch('content') ?>
				</div>
			</div>
		</div>
	</body>
</html>