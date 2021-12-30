<legend><?php echo $title;?></legend>
<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Gedung</label>
        <div class="col-lg-5">
            <input type="hidden" name="id_gedung" value="<?php echo $gedung['id_gedung'];?>">
            <input type="text" name="nama_gedung" value="<?php echo $gedung['nama_gedung'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Ruangan</label>
        <div class="col-lg-5">
            <input type="text" name="ruangan" value="<?php echo $gedung['ruangan'];?>" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Image</label>
        <div class="col-lg-5">
            <img src="<?php echo base_url('assets/img/anggota/'.$gedung['image']);?>" width="200px" height="200px">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label"></label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control"></input>
        </div>
    </div>
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('gedung/index');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>