<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-lg-2 control-label">NIS</label>
		<div class="col-lg-5">
			<input type="text" name="nis" class="form-control" value="<?php echo $mahasiswa['nis'];?>" readonly="readonly"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Nama</label>
		<div class="col-lg-5">
			<input type="text" name="nama_mhs" class="form-control" value="<?php echo $mahasiswa['nama_mhs'];?>"></input>
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
		<label class="col-lg-2 control-label">Agama</label>
		<div class="col-lg-5">
			<select name="agama" class="form-control">
				<option value="<?php echo $mahasiswa['agama'];?>"><?php echo $mahasiswa['agama'];?></option>
				<option value="kristen">Kristen Protestan</option>
				<option value="islam">Islam</option>
				<option value="hindu">Hindu</option>
				<option value="buddha">Buddha</option>
				<option value="katolik">Katolik</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Kelamin</label>
		<div class="col-lg-5">
			<select name="jenis_kelamin" class="form-control">
				<option value="<?php echo $mahasiswa['jenis_kelamin'];?>"><?php echo $mahasiswa['jenis_kelamin'];?></option>
				<option value="L">L</option>
				<option value="P">P</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-2 control-label">Tanggal Lahir</label>
		<div class="col-lg-5">
			<input type="text" name="tanggal_lahir" id="tanggal" class="form-control" value="<?php echo $mahasiswa['tanggal_lahir'];?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Alamat</label>
		<div class="col-lg-8">
		<textarea class="form-control" name="alamat"><?php echo $mahasiswa['alamat'];?></textarea>
	</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Image</label>
		<div class="col-lg-5">
			<img src="<?php echo base_url('assets/img/anggota/'.$mahasiswa['image']);?>" width="200px" height="200px">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
		<div class="col-lg-5">
			<input type="file" name="gambar" class="form-control"></input>
		</div>
	</div>
	<div class="forom-group well">
		<button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update</button>
		<a href="<?php echo site_url('mahasiswa');?>" class="btn btn-default"> Kembali</a>
	</div>
</form>