<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('prodi/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nama Prodi</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('prodi/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama Prodi</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php if (empty($prodi)) { ?>
        <tr>
            <td colspan="10"> Data Belum Ditemukan</td>
        </tr>
    <?php
    } else {
        $no=1; foreach($prodi as $row) {
    ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $row->nama_prodi;?></td>
        <td><a href="<?php echo site_url('prodi/edit/'.$row->id_prodi);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_prodi;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php
    }
    }
    ?>
</table>


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
                url:"<?php echo site_url('prodi/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('prodi/index/delete_success');?>";
                }
            });
        });
    });
</script>