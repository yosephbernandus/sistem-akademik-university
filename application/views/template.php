<!DOCTYPE html>
<html>
<head>
	<title>Sistem Akademik | Prototype</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

	<link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">

	<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>
	<script>
		tinymce.init({selector:'textarea'});

		$(function(){
			$("#tanggal1").datepicker({
				format:'yyyy-mm-dd'
			});

			$("#tanggal2").datepicker({
				format:'yyyy-mm-dd'
			});

			$("#tanggal").datepicker({
				format:'yyyy-mm-dd'
			});
		})
	</script>
</head>
<body>
	<?php echo $_header;?>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php echo $_sidebar;?>
			</div>

			<div class="col-md-9">
				<?php echo $_content;?>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Konfirmasi</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idhapus" id="idhapus"></input>
					<p>Apakah anda yakin akan menghapus data ini ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url('assets/js/holder.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
	<script src="<?php echo base_url('assets/js/application.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>

</body>
</html>