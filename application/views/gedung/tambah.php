<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-lg-2 control-label">Nama Gedung</label>
		<div class="col-lg-5">
			<input type="text" name="nama_gedung" class="form-control"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Ruangan</label>
		<div class="col-lg-5">
			<input type="text" name="ruangan" class="form-control"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Image</label>
		<div class="col-lg-5">
			<input type="file" name="gambar" class="form-control"></input>
		</div>
	</div>
	<div class="form-group well">
		<button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
		<a href="<?php echo site_url('gedung');?>"></a>
	</div>
</form>