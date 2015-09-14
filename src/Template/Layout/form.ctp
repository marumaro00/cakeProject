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
							'/js/lib/bootstrap-select2/css/select2.min.css',
							'/js/lib/pages/pages-icons.css',
							'/js/lib/font-awesome/css/font-awesome.css',
							'/js/lib/pages/corporate.css']) ?>
		<?= $this->Html->script(['/js/lib/jquery/jquery.min.js',
								'/js/lib/modernizr/modernizr.custom.js',
								'/js/lib/jquery-ui/jquery-ui.min.js',
								'/js/lib/bootstrap/js/bootstrap.min.js',
								'/js/lib/bootstrap-select2/js/select2.min.js',
								'/js/lib/pages/pages.js']) ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
	</head>
	<body>
		<div class="navbar">
			<a class="btn btn-primary" href="/">
				<span>Take Me Home</span>
			</a>
		</div>
		<?= $this->fetch('content') ?>
	</body>
</html>