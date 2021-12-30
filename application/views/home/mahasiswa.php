<!DOCTYPE html>
<html>
<head>
	<title>Akademik</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

	<link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
    
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>
    <script>
    	tinymce.init({selector:'textarea'});
    </script>
    </head>
	<body>
    	 <!--<img src="<?php echo base_url('assets/img/3.jpg');?>" height="140px" width="100%">-->
    	 <!-- Static navbar -->
    	 <div class="navbar navbar-default">
    	 	<div class="container">
    	 		<div class="navbar-header">
    	 			<!--<button type="button" class="navbar-toogle" data-toogle="collapse" data-target=".navbar-collapse">
    	 				<span class="icon-bar"></span>
    	 				<span class="icon-bar"></span>
    	 				<span class="icon-bar"></span>
    	 			</button> -->
    	 			<a class="navbar-brand" href="<?php echo site_url('home');?>"> Akademik</a>
    	 		</div>
    	 		<div class="navbar-collapse collapse">
    	 			<ul class="nav navbar-nav">
    	 				<li><a href="<?php echo site_url('home');?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
    	 				<li class="active"><a href="<?php echo site_url('home/mahasiswa');?>"><i class="glyphicon glyphicon-user"></i> Mahasiswa</a></li>
                        <li></li>
    	 			</ul>
    	 			<div class="nav navbar-nav navbar-right">
    	 				<form class="navbar-form navbar-left" role="search" action="<?php echo site_url('home/cari_mahasiswa');?>" method="post">
    	 					<div class="form-group">
    	 						<input type="text" name="cari" class="form-control" placeholder="Cari Mahasiswa">
    	 					</div>
    	 					<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"> Cari</i></button>
    	 				</form>
    	 			</div>
    	 		</div>
    	 	</div>
    	 </div>



    	 <div class="container">
    	 	<div class="row">
    	 		<div class="col-md-4">
    	 			<div class="panel panel-default">
    	 				<div class="panel-heading">
    	 					<span class="glyphicon glyphicon-lock"></span> Login
    	 				</div>
    	 				<div class="panel-body">
    	 					<form class="form-horizontal" role="form" action="<?php echo site_url('home/proses');?>" method="post">
    	 						<?php echo $this->session->flashdata('message');?>
    	 						<div class="form-group">
    	 							<label for="inputEmail3" class="col-sm-3 control-label"> Username</label>
    	 							<div class="col-sm-9">
    	 								<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required></input>
    	 							</div>
    	 						</div>
    	 						<div class="form-group">
    	 							<label for="inputPassword" class="col-sm-3 control-label"> Password</label>
    	 							<div class="col-sm-9">
    	 								<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"></input>
    	 							</div>
    	 						</div>   	 	
    	 						<div class="form-group">
    	 							<div class="col-sm-offset-3 col-sm-9">
    	 								<div class="checkbox">
    	 									<label>
    	 										<input type="checkbox"> Remember me</input>
    	 									</label>
    	 								</div>
    	 							</div>
    	 						</div>
    	 						<div class="form-group last">
    	 							<div class="col-sm-offset-3 col-sm-9">
    	 								<button type="submit" class="btn btn-success btn-sm"> Sign in</button>
    	 								<button type="reset" class="btn btn-default btn-sm"> Reset</button>
    	 							</div>
    	 						</div>					
    	 					</form>
    	 				</div>
    	 				<div class="panel-footer">
    	 					
    	 				</div>
    	 			</div>
    	 		</div>
    	 		<div class="col-md-8">
    	 			<legend>Data Mahasiswa</legend>
    	 			<table class="table table-striped">
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
    	 					</tr>
    	 				</thead>
    	 				<?php $no=0; foreach($mahasiswa as $row): $no++;?>
    	 					<tr>
    	 						<td><?php echo $no;?></td>
    	 						<td><img src="<?php echo base_url('assets/img/anggota/'.$row->image);?>" height="100px" width="100px"></td>
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
    	 		</div>
    	 	</div>
    	 </div>


    	  <script src="<?php echo base_url('assets/js/holder.js');?>"></script>
    
            <script src="<?php echo base_url('assets/js/application.js');?>"></script>
            <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
            <script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
            <script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>
            <script src="<?php echo base_url('assets/js/demo/dashboard-demo.js');?>"></script>   
</body>
</html>