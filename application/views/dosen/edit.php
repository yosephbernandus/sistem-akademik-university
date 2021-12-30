<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-lg-2 control-label">NID</label>
		<div class="col-lg-5">
		 	<input type="hidden" name="id_dosen" value="<?php echo $dosen['id_dosen'];?>">
			<input type="text" name="nid" class="form-control" value="<?php echo $dosen['nid'];?>" readonly="readonly"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Nama</label>
		<div class="col-lg-5">
			<input type="text" name="nama" class="form-control" value="<?php echo $dosen['nama'];?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Tanggal Lahir</label>
		<div class="col-lg-5">
			<input type="text" name="tanggal_lahir" id="tanggal" class="form-control" value="<?php echo $dosen['tanggal_lahir'];?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Kelamin</label>
		<div class="col-lg-5">
			<select name="jenis_kelamin" class="form-control">
				<option value="<?php echo $dosen['jenis_kelamin'];?>"><?php echo $dosen['jenis_kelamin'];?></option>
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
			<input type="text" name="email" class="form-control" value="<?php echo $dosen['email'];?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">No Telp</label>
		<div class="col-lg-5">
			<input type="text" name="no_telepon" class="form-control" value="<?php echo $dosen['no_telepon'];?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Image</label>
		<div class="col-lg-5">
			<img src="<?php echo base_url('assets/img/anggota/'.$dosen['image']);?>" width="200px" height="200px">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
		<div class="col-lg-5">
			<input type="file" name="gambar" class="form-control"></input>
		</div>
	</div>
	<div class="forom-group well">
		<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update</button>
		<a href="<?php echo site_url('dosen');?>" class="btn btn-default"> Kembali</a>
	</div>
</form>