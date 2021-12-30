<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aplikasi Chatting Sederhana</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script>    
        $(document).ready(function(){
         
        function tampildata(){
           $.ajax({
            type:"POST",
            url:"<?=site_url('chat/ambil_pesan');?>",    
            success: function(data){                 
                     $('#isi_chat').html(data);
            }  
           });
        }
   
   
         $('#kirim').click(function(){
           var pesan = $('#pesan').val(); 
           var user = $('#user').val(); 
           $.ajax({
            type:"POST",
            url:"<?=site_url('chat/kirim_chat');?>",    
            data: 'pesan=' + pesan + '&user=' + user,        
            success: function(data){                 
              $('#isi_chat').html(data);
            }  
           });
          });
           
           
          setInterval(function(){
                     tampildata();},1000);
        });
    </script>
    <style>
      #isi_chat{height:400px;}
    </style>
</head>
 
<body>
 
<div id="container">
    <h1>Chat</h1>
 
    <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Kotak Percakapan</h3>
            </div>
            <div class="panel-body" >
             <ul id="isi_chat"> <ul>
            </div>
          </div>
           
          <div class="col-md-2">
              <input placeholder="nama" type="text" id="user" class="form-control">
          </div>
           
          <div class="col-md-8">
              <input placeholder="pesan" type="text" id="pesan" class="form-control">
          </div>
          <div class="col-md-2">
          <input type="button" value="kirim" id="kirim" class="btn btn-md btn-warning">
          </div>
    </div>
</div>
</body>
</html>