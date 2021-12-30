<legend><?php echo $title;?></legend>
<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Matakuliah</label>
        <div class="col-lg-5">
            
            <input type="text" name="kode_mat" value="<?php echo $matakuliah['kode_mat'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Matakuliah</label>
        <div class="col-lg-5">
            <input type="text" name="nama_mat" value="<?php echo $matakuliah['nama_mat'];?>" class="form-control"></input>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">SKS</label>
        <div class="col-lg-2">
            <select name="sks" class="form-control">
                <option value="<?php echo $matakuliah['sks'];?>"><?php echo $matakuliah['sks'];?></option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Jam</label>
        <div class="col-lg-2">
            <select name="jam" class="form-control">
                <option value="<?php echo $matakuliah['jam'];?>"><?php echo $matakuliah['jam'];?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Dosen Pengajar</label>
            <div class="col-lg-4">
                <select name="nama" class="form-control">
                    <option></option>
                        <?php foreach ($dosen as $dosen):?>
                        <option value="<?php echo $dosen->nama;?>"><?php echo $dosen->nama;?></option>
                        <?php endforeach;?>
                </select>
        </div>
    </div>
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('matakuliah/index');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>