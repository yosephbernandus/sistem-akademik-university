<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-lg-2 control-label">NID</label>
		<div class="col-lg-5">
			<input type="text" name="nid" class="form-control"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Nama</label>
		<div class="col-lg-5">
			<input type="text" name="nama" class="form-control"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Tanggal Lahir</label>
		<div class="col-lg-5">
			<input type="text" name="tanggal_lahir" id="tanggal" class="form-control"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Kelamin</label>
		<div class="col-lg-5">
			<select name="jenis_kelamin" class="form-control">
				<option></option>
				<option value="L">L</option>
				<option value="P">P</option>
			</select>
		</div>
	</div>
    <div class="form-group">
    <label class="col-lg-2 control-label">Prodi</label>
    <div class="col-lg-5">
    	<select name="nama_prodi" class="form-control" id="prodi">
            <option></option>
            <?php foreach($prodi as $prodi):?>
            	<option value="<?php echo $prodi->nama_prodi;?>"><?php echo $prodi->nama_prodi;?></option>
            <?php endforeach;?>
        </select>
    </div>
    </div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Email</label>
		<div class="col-lg-5">
			<input type="text" name="email" class="form-control"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">No Telepon</label>
		<div class="col-lg-5">
			<input type="text" name="no_telepon" class="form-control"></input>
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
		<a href="<?php echo site_url('dosen');?>"></a>
	</div>
</form>