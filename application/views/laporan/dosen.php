<legend><?php echo $title;?></legend>
<table class="table table-striped">

    <thead>
        <tr>
            <td>No.</td>
            <td>Nid</td>
            <td>Nama</td>
            <td>Prodi</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Lahir</td>
            <td>Email</td>
            <td>No Telp</td>
        </tr>
    </thead>
    <?php $no=0; foreach($dosen as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nid;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->nama_prodi;?></td>
        <td><?php echo $row->jenis_kelamin;?></td>
        <td><?php echo $row->tanggal_lahir;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->no_telepon;?></td>
    </tr>
    <?php endforeach;?>
</table>
<a href="<?php echo site_url('laporan/printDosen');?>" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Save</a>