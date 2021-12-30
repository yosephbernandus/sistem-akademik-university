<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('dosen/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nid / Nama</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('dosen/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Profil</td>
            <td>NID</td>
            <td>Nama</td>
            <td>Tanggal Lahir</td>
            <td>Jenis Kelamin</td>
            <td>Jurusan</td>
            <td>Email</td>
            <td>No Telp</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php if (empty($dosen)) { ?>
        <tr>
            <td colspan="10"> Data Belum Ditemukan</td>
        </tr>
    <?php
    } else {
     $no=1; foreach($dosen as $row ) { 
    ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><img src="<?php echo base_url('assets/img/anggota/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->nid;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->tanggal_lahir;?></td>
        <td><?php echo $row->jenis_kelamin;?></td>
        <td><?php echo $row->nama_prodi;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->no_telepon;?></td>
        <td><a href="<?php echo site_url('dosen/edit/'.$row->id_dosen);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_dosen;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php
    }
    }
    ?>
</Table>
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
                url:"<?php echo site_url('dosen/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('dosen/index/delete_success');?>";
                }
            });
        });
    });
</script>