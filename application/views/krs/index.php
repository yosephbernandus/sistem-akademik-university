<script>
	$(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('krs/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#kode_mat").val('');
            $("#nama_mat").val('');
            $("#sks").val('');
            $("#jam").val('');
        }
        
        $("#nis").click(function(){
            var nis=$("#nis").val();
            
            $.ajax({
                url:"<?php echo site_url('krs/cariMahasiswa');?>",
                type:"POST",
                data:"nis="+nis,
                cache:false,
                success:function(html){
                    $("#nama_mhs").val(html);
                }
            })
        })

        $("#kode_mat").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                var kode_mat=$("#kode_mat").val();
            
                $.ajax({
                    url:"<?php echo site_url('krs/cariMatakuliah');?>",
                    type:"POST",
                    data:"kode_mat="+kode_mat,
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");
                        if (data==0) {
                            alert("data tidak ditemukan");
                            $("#nama_mat").val('');
                            $("#sks").val('');
                            $("#jam").val('');
                        }else{
                            $("#nama_mat").val(data[0]);
                            $("#sks").val(data[1]);
                            $("#jam").val(data[2]);
                            $("#tambah").focus();
                        }
                    }
                })
            }
        })
        
        $("#tambah").click(function(){
            var kode_mat=$("#kode_mat").val();
            var nama_mat=$("#nama_mat").val();
            var sks=$("#sks").val();
            var jam=$("#jam").val();
            
            if (kode_mat=="") {
                //code
                alert("Kode Matakuliah Masih Kosong");
                return false;
            }else if (nama_mat=="") {
                //code
                alert("Data tidak ditemukan");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('krs/tambah');?>",
                    type:"POST",
                    data:"kode_mat="+kode_mat+"&nama_mat="+nama_mat+"&sks="+sks+"&jam="+jam,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
       $("#simpan").click(function(){
            var nomer=$("#no").val();
            var tanggal_input=$("#tanggal_input").val();
            var nis=$("#nis").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);
            
            if (nis=="") {
                alert("Pilih Nis Mahasiswa");
                return false;
            }else if (jumlah==0) {
                alert("pilih Matakuliah");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('krs/sukses');?>",
                    type:'POST',
                    data:"nomer="+nomer+"&tanggal_input="+tanggal_input+"&nis="+nis+"&jumlah="+jumlah,
                    cache:false,
                    success:function(html){
                        alert("Input KRS Berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var kode_mat=$(this).attr("kode_mat");
            
            $.ajax({
                url:"<?php echo site_url('krs/hapus');?>",
                type:"POST",
                data:"kode_mat="+kode_mat,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#carimatakuliah").keyup(function(){
            var carimatakuliah=$("#carimatakuliah").val();
            
            $.ajax({
                url:"<?php echo site_url('krs/pencarianmatakuliah');?>",
                type:"POST",
                data:"carimatakuliah="+carimatakuliah,
                cache:false,
                success:function(html){
                    $("#tampilmatakuliah").html(html);
                }
            })
        })
        
        $(".tambah").live("click",function(){
            var kode_mat=$(this).attr("kode_mat");
            var nama_mat=$(this).attr("nama_mat");
            var sks=$(this).attr("sks");
            var jam=$(this).attr("jam");
            
            $("#kode_mat").val(kode_mat);
            $("#nama_mat").val(nama_mat);
            $("#sks").val(sks);
            $("#jam").val(jam);
            
            $("#myModal2").modal("hide");
        })
    })
</script>

<legend><?php echo $title;?></legend>
<div class="panel panel-default">
	<div class="panel-body">
		<form class="form-horizontal" action="<?php echo site_url('krs/simpan');?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">No. Stacc</label>
					<div class="col-lg-7">
						<input type="text" id="no" name="no" class="form-control" value="<?php echo $noauto;?>"  readonly="readonly"></input>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">Tanggal</label>
				<div class="col-lg-4">
					<input type="text" id="tanggal_input" name="tanggal_input" class="form-control" value="<?php echo $tanggal_input;?>" readonly="readonly"></input>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">Nis</label>
					<div class="col-lg-7">
						<select name="nis" class="form-control" id="nis">
							<option></option>
							<?php foreach ($mahasiswa as $mahasiswa):?>
							<option value="<?php echo $mahasiswa->nis;?>"><?php echo $mahasiswa->nis;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Nama Mahasiswa</label>
					<div class="col-lg-7">
						<input type="text" name="nama_mhs" id="nama_mhs" class="form-control"></input>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		Data Matakuliah
	</div>

	<div class="panel-body">
		<div class="form-inline">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Kode Matakuliah" id="kode_mat"></input>
			</div>
			<div class="form-group">
				<label class="sr-only">Nama Matakuliah</label>
				<input type="text" class="form-control" placeholder="Nama Matakuliah" id="nama_mat" readonly="readonly"></input>
			</div>
			<div class="form-group">
				<label class="sr-only">SKS</label>
				<input type="text" class="form-control" placeholder="sks" id="sks" readonly="readonly"></input>
			</div>
			<div class="form-group">
				<label class="sr-only">Jam</label>
				<input type="text" class="form-control" placeholder="jam" id="jam" readonly="readonly"></input>
			</div>
            </br>
            </br>
			<div class="form-group">
				<label class="sr-only">Jam</label>
				<button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
			</div>
			<div class="form-group">
				<label class="sr-only">Jam</label>
				<button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
	</div>

	<div id="tampil"></div>

	<div class="panel-footer">
		<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
	</div>
</div>





	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Cari Matakuliah</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal">
						<label class="col-lg-3 control-label">Cari Matakuliah</label>
						<div class="col-lg-5">
							<input type="text" name="carimatakuliah" id="carimatakuliah" class="form-control"></input>
						</div>
					</div>

					<div id="tampilmatakuliah"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
				</div>
			</div>
		</div>
	</div>

