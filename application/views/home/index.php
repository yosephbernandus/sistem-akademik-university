<!doctype html>
    <html>
        <head>
            <title>Sistem Akademik | Prototye</title>
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
            <style>
            .corousel-inner > .item > img,
            .carousel-inner > .item > a > img {
            	width: 70%;
            	margin: auto;
            }
            </style>
        </head>
        <body>
            <!--<img src="<?php echo base_url('assets/img/3.jpg');?>" height="140px" width="100%">-->
            <!-- Static navbar -->
            <div class="navbar navbar-default">
                <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('home');?>">Akademik</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url('home');?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li class=""><a href="<?php echo base_url('home/mahasiswa');?>"><i class="glyphicon glyphicon-user"></i> Mahasiswa</a></li>
                    </ul>
                    
                    </div>
                </div><!--/.nav-collapse -->
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
                                <form class="form-horizontal" role="form" action="<?php echo base_url('home/proses');?>" method="post">
                                    <?php echo $this->session->flashdata('message');?>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">
                                            Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"/>
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Sign in</button>
                                                 <button type="reset" class="btn btn-default btn-sm">
                                                Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <legend>Universitas</legend>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            
                            <ol class="carousel-indicators">
                                <li data-target="carousel-example-generic" data-slide-to="0" class="active"></li>
                                <!--<li data-targer="carousel-example-generic" data-slide-to="1"></li-->>
                                <li data-targer="carousel-example-generic" data-slide-to="1"></li>
                            </ol>


                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo base_url('assets/img/slide1.jpg');?>" alt="Slide 1">
                                    <div class="carousel-caption">
                                        <h3>Selamat Datang Di Sistem Akademik Nusantara</h3>
                                        <p>Silahkan Login Terlebih Dahulu Sebelum Masuk Di Sistem Ini.</p>
                                    </div>
                                </div>
                                <!-- <div class="item">
                                    <img src="<?php echo base_url('assets/img/slide2.jpg');?>" alt="Slide 1">
                                    <div class="carousel-caption">
                                        <h3>Label Caption 2</h3>
                                        <p>Loren Ipsum is simply dummy text</p>
                                    </div>
                                </div> -->
                                <div class="item">
                                    <img src="<?php echo base_url('assets/img/slide3.jpg');?>" alt="Slide 1">
                                    <div class="carousel-caption">
                                        <h3>Universitas Nusantara</h3>
                                        <p>Sistem Ini Menyediakan Pengisian KRS Online dan Data dari mahasiswa,dosen,dll</p>
                                    </div>
                                </div>
                            </div>



                             <a href="#carousel-example-generic" class="carousel-control left" data-slide="prev" role="button">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a href="#carousel-example-generic" class="carousel-control right" data-slide="next" role="button">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>

                        </div>
                    </div>
                    
    
            
            
            <!-- Core Scripts - Include with every page -->
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