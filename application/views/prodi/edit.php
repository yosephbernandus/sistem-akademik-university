<legend><?php echo $title;?></legend>
<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Prodi</label>
        <div class="col-lg-5">
            <input type="hidden" name="id_prodi" value="<?php echo $prodi['id_prodi'];?>">
            <input type="text" name="nama_prodi" value="<?php echo $prodi['nama_prodi'];?>" class="form-control">
        </div>
    </div>
    
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('prodi/index');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>