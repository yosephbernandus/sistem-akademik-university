<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('matakuliah/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nama Matakuliah / Kode MK</label>
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
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php
        $no=0; foreach($matakuliah as $row): $no++;
    ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $row->kode_mat;?></td>
        <td><?php echo $row->nama_mat;?></td>
        <td><?php echo $row->sks;?></td>
        <td><?php echo $row->jam;?></td>
        <td><a href="<?php echo site_url('matakuliah/edit/'.$row->id_mat);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_mat;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
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
                url:"<?php echo site_url('gedung/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('gedung/index/delete_success');?>";
                }
            });
        });
    });
</script>