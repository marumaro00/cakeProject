<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
			
	<?= $this->Html->css(['/js/lib/pace/pace-theme-flash',
						  '/js/lib/bootstrap/css/bootstrap.min.css',
						  '/js/lib/font-awesome/css/font-awesome.css',
						  '/js/lib/jquery-scrollbar/jquery.scrollbar.css',
						  '/js/lib/bootstrap-select2/css/select2.min.css',
						  '/js/lib/switchery/css/switchery.min.css',
						  '/js/lib/bootstrap-tagsinput/bootstrap-tagsinput.css',
						  '/js/lib/dropzone/css/dropzone.css',
						  '/js/lib/bootstrap-datepicker/css/datepicker3.css',
						  '/js/lib/bootstrap-daterangepicker/daterangepicker-bs3.css',
						  '/js/lib/bootstrap-timepicker/bootstrap-timepicker.min.css',
						  '/js/lib/pages/pages-icons.css',
						  '/js/lib/jquery-ui/jquery-ui.min',
						  '/css/pages.min.css',
						  
						  '/js/lib/x-editable/css/bootstrap-editable.css',
						  
						  '/js/lib/datatables-responsive/css/datatables.responsive.css',
						  '/js/lib/jquery-datatables/extensions/Bootstrap/css/datatables.bootstrap.css',
						  '/js/lib/jquery-datatables/extensions/ColVis/css/dataTables.colVis.min.css',
						  '/js/lib/jquery-datatables/extensions/FixedColumns/css/dataTables.fixedColumns.min.css'
						  ]) ?>
	
	<?= $this->Html->script(['/js/lib/pace/pace.min.js',
							'/js/lib/jquery/jquery-2.1.4.min.js',
							'/js/lib/modernizr/modernizr.custom.js',
							'/js/lib/jquery-ui/jquery-ui.min.js',
							'/js/lib/bootstrap/js/bootstrap.min.js',
							'/js/lib/jquery/jquery-easy.js',
							'/js/lib/jquery/jquery.unveil.min.js',
							'/js/lib/jquery/jquery.bez.min.js',
							'/js/lib/jquery/jquery.ioslist.min.js',
							'/js/lib/jquery/jquery.actual.min.js',
							'/js/lib/jquery-scrollbar/jquery.scrollbar.min.js',
							'/js/lib/bootstrap-select2/js/select2.min.js',
							'/js/lib/switchery/js/switchery.min.js',
							'/js/lib/jquery-autonumeric/autoNumeric.js',
							'/js/lib/dropzone/dropzone.min.js',
							'/js/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
							'/js/lib/jquery-inputMask/jquery.inputmask.min.js',
							'/js/lib/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js',
							'/js/lib/jquery-validation/jquery.validate.min.js',
							'/js/lib/bootstrap-datepicker/js/bootstrap-datepicker.js',
							'/js/lib/moment/moment.min.js',
							'/js/lib/bootstrap-daterangepicker/daterangepicker.js',
							'/js/lib/bootstrap-timepicker/bootstrap-timepicker.min.js',
							'/js/lib/x-editable/js/bootstrap-editable.min.js',
							
							'/js/lib/jquery-datatables/media/js/jquery.dataTables.min.js',
							'/js/lib/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js',
							'/js/lib/jquery-datatables/extensions/Bootstrap/js/dataTables.bootstrap.js',
							
							'/js/lib/datatables-responsive/js/datatables.responsive.js',
							'/js/lib/datatables-responsive/js/lodash.min.js',
							'/js/lib/jquery-datatables/extensions/ColVis/js/dataTables.colVis.min.js',
							'/js/lib/jquery-datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js',
							'/js/lib/pages/pages.min.js',
							'/js/script.js',
							
							'DataTables.cakephp.dataTables.js']) ?>
	
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
	<?= $this->fetch('dataTableSettings') ?>
    <?= $this->fetch('script') ?>

</head>
<body class="fixed-header">
	<!--START SIDEBAR-->
	<div class="page-sidebar" data-pages="sidebar">
		<div id="appMenu" class="sidebar-overlay-slide from-top sidebar-menu m-t-40">
			<ul class="menu-items " role="menu" >
				<li>
                   	<a class="" href="<?= $this->Url->build(['controller'=>'admin','action'=>'logout'])?>">
						<span class="title">Logout</span>
						
					</a>
					<span class="icon-thumbnail">
						<i class="fa fa-power-off"></i>
					</span>
                </li>
			</ul>
		</div>
		<?= $this->element('sidebar') ?>
	</div>
    <div class="page-container" id="container" >
		<div class="header">
			<?= $this->element('header') ?>
		</div>
        <div class="page-content-wrapper">
            <div class="content" id="content">
				<div class="container-fluid container-fixed-lg">
					<?= $this->fetch('content') ?>
				</div>
			</div>
        </div>
        <footer>
        </footer>
    </div>
	<div class="modal fade stick-up" id="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content-wrapper">
				<div class="modal-content">
				</div>
			</div>
		</div>
	</div>
</body>
</html>
