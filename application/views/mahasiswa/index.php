<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('mahasiswa/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nis / Nama</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('mahasiswa/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Profil</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Prodi</td>
            <td>Agama</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Lahir</td>
            <td>Alamat</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php if (empty($mahasiswa)) { ?>
        <tr>
            <td colspan="10"> Data Belum Ditemukan</td>
        </tr>
    <?php
    } else {
     $no=1; foreach($mahasiswa as $row ) { 
    ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><img src="<?php echo base_url('assets/img/anggota/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->nis;?></td>
        <td><?php echo $row->nama_mhs;?></td>
        <td><?php echo $row->nama_prodi;?></td>
        <td><?php echo $row->agama;?></td>
        <td><?php echo $row->jenis_kelamin;?></td>
        <td><?php echo $row->tanggal_lahir;?></td>
        <td><?php echo $row->alamat;?></td>
        <td><a href="<?php echo site_url('mahasiswa/edit/'.$row->nis);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->nis;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
                url:"<?php echo site_url('mahasiswa/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('mahasiswa/index/delete_success');?>";
                }
            });
        });
    });
</script>