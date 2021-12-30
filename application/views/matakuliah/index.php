<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('matakuliah/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Matakuliah / Kode MK</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('matakuliah/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Kode Matakuliah</td>
            <td>Nama Matakuliah</td>
            <td>SKS</td>
            <td>Jam</td>
            <td>Dosen Pengajar</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php if (empty($matakuliah)) { ?>
        <tr>
            <td colspan="10"> Data Belum Ditemukan</td>
        </tr>
    <?php
    } else {
        $no=1; foreach($matakuliah as $row) {
    ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $row->kode_mat;?></td>
        <td><?php echo $row->nama_mat;?></td>
        <td><?php echo $row->sks;?></td>
        <td><?php echo $row->jam;?></td>
        <td><?php echo $row->nama;?></td>
        <td><a href="<?php echo site_url('matakuliah/edit/'.$row->kode_mat);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->kode_mat;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php
    }
    }
    ?>
</table>
<?php echo $pagination;?>


<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('matakuliah/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('matakuliah/index/delete_success');?>";
                }
            });
        });
    });
</script>