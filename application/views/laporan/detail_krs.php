<legend>Detail KRS</legend>
<div class="col-md-6">
	<div class="form-horizontal">
		<div class="form-group">
			<label class="col-lg-5">No Stacc</label>
			<div class="col-lg-5">
				: <?php echo $krs['id_krs'];?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-5">Tanggal Input</label>
			<div class="col-lg-5">
				: <?php echo $krs['tanggal_input'];?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-5">NIS</label>
			<div class="col-lg-5">
				: <?php echo $krs['nis'];?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-5">Nama</label>
			<div class="col-lg-5">
				: <?php echo $krs['nama_mhs'];?>
			</div>
		</div>
	</div>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<td>Kode Matakuliah</td>
			<td>Nama Matakuliah</td>
			<td>SKS</td>
			<td>Jam</td>
		</tr>
	</thead>
	<?php foreach ($detail as $row):?> 
		<tr>
			<td><?php echo $row->kode_mat;?></td>
			<td><?php echo $row->nama_mat;?></td>
			<td><?php echo $row->sks;?></td>
			<td><?php echo $row->jam;?></td>
		</tr>
	<?php endforeach;?>
	<tr>
            <td colspan="2">Total SKS</td>
            <td colspan="2"><input type="text" id="jumlahSks" readonly="readonly" value="" class="form-control"></td>
        </tr>
</table>
<a href="<?php echo site_url('laporan/printKrs');?>" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i> Save</a>