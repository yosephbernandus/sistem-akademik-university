<script>
	$(function(){
		$("#tampilkan").click(function(){
			var tanggal1=$("#tanggal1").val();

			$.ajax({
				url:"<?php echo site_url('laporan/cari_krs');?>",
				type:"POST",
				data:"tanggal1="+tanggal1,
				cache:false,
				success:function(html){
					$("#tampil").html(html);
				}
			})
		})
	})
</script>

<legend><?php echo $title;?></legend>
<div class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-3">Tanggal Input</label>
		<div class="col-lg-5">
			<input type="text" id="tanggal1" class="form-control"></input>
		</div>

		<div class="col-lg-4">
			<button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> View</button>
		</div>
	</div>
</div>

<div id="tampil"></div>