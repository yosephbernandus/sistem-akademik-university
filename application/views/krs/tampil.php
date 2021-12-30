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
        <?php foreach($tmp as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_mat;?></td>
            <td><?php echo $tmp->nama_mat;?></td>
            <td><?php echo $tmp->sks;?></td>
            <td><?php echo $tmp->jam;?></td>
            <td><a href="#" class="hapus" kode_mat="<?php echo $tmp->kode_mat;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Total Matakuliah</td>
            <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
        </tr>
    </table>