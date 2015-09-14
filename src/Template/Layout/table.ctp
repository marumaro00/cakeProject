<?= $this->Html->docType() ?>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<?= $this->Html->meta('viewport','width=device-width, initial-scale=1.0') ?>
		<title>
			<?= $this->fetch('title') ?>
		</title>
		<?= $this->Html->css(['/js/lib/jquery-ui/jquery-ui.min.css',
							'/js/lib/bootstrap/css/bootstrap.min.css',
							'/js/lib/pages/pages-icons.css',
							'/js/lib/font-awesome/css/font-awesome.css',
							'/js/lib/x-editable/css/bootstrap-editable.css',
							'/js/lib/jquery-datatables/media/css/jquery.dataTables.min.css',
							'/js/lib/jquery-datatables/extensions/Plugins/Bootstrap/css/dataTables.bootstrap.css',
							'/js/lib/jquery-datatables/extensions/Responsive/css/dataTables.responsive.css',
							'/js/lib/pages/corporate.css']) ?>
		<?= $this->Html->script(['/js/lib/jquery/jquery.min.js',
								'/js/lib/modernizr/modernizr.custom.js',
								'/js/lib/jquery-ui/jquery-ui.min.js',
								'/js/lib/bootstrap/js/bootstrap.min.js',
								'/js/lib/jquery-datatables/media/js/jquery.dataTables.min.js',
								'/js/lib/jquery-datatables/extensions/Plugins/Bootstrap/js/dataTables.bootstrap.js',
								'/js/lib/jquery-datatables/extensions/Responsive/js/dataTables.responsive.min.js',
								'/js/lib/bootstrap-select2/js/select2.min.js',
								'/js/lib/x-editable/js/bootstrap-editable.min.js',
								'/js/lib/pages/pages.js',
								'DataTables.cakephp.dataTables.js']) ?>
	</head>
	<body>
		<?= $this->fetch('content')?>
	</body>
</html>