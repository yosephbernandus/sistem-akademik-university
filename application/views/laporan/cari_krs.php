<table class="table table-striped">
	<thead>
		<tr>
			<td>No.</td>
			<td>No Stacc</td>
			<td>Tanggal Input</td>
			<td>Nis</td>
		</tr>
	</thead>
	<?php $no=0; foreach($lap as $row): $no++;?>
	<tr>
		<td><?php echo $no;?></td>
		<td><a href="<?php echo site_url('laporan/detail_krs/'.$row->id_krs);?>"><?php echo $row->id_krs;?></a></td>
		<td><?php echo $row->tanggal_input;?></td>
		<td><?php echo $row->nis;?></td>
	</tr>
<?php endforeach;?>
</table>