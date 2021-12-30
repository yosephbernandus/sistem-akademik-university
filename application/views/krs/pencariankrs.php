<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Matakuliah</td>
                <td>Nama Matakuliah</td>
                <td>SKS</td>
                <td>Jam</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($matakuliah as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_mat;?></td>
            <td><?php echo $tmp->nama_mat;?></td>
            <td><?php echo $tmp->sks;?></td>
            <td><?php echo $tmp->jam;?></td>
            <td><a href="#" class="tambah" kode_mat="<?php echo $tmp->kode_mat;?>"
            nama_mat="<?php echo $tmp->nama_mat;?>"
            sks="<?php echo $tmp->sks;?>" jam="<?php echo $tmp->jam;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>