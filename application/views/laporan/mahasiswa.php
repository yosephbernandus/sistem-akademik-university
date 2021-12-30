<legend><?php echo $title;?></legend>
<table class="table table-striped">

    <thead>
        <tr>
            <td>No.</td>
            <td>Nis</td>
            <td>Nama</td>
            <td>Prodi</td>
            <td>Agama</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Lahir</td>
            <td>Alamat</td>

        </tr>
    </thead>
    <?php $no=0; foreach($mahasiswa as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nis;?></td>
        <td><?php echo $row->nama_mhs;?></td>
        <td><?php echo $row->nama_prodi;?></td>
        <td><?php echo $row->agama;?></td>
        <td><?php echo $row->jenis_kelamin;?></td>
        <td><?php echo $row->tanggal_lahir;?></td>
        <td><?php echo $row->alamat;?></td>
    </tr>
    <?php endforeach;?>
</table>
<a href="<?php echo site_url('laporan/printMahasiswa');?>" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Save</a>