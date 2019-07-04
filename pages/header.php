<?php

session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}include ('../config.php');
// $id = $_GET['id_sekolah'];
// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];
$level =    $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SISFO AKADEMIK | Sistem Informasi Akademik</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">SISFO AKADEMIK</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul> -->

                <ul class="nav navbar-right navbar-top-links">
                  
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nama']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                    
                    <?php if($level == 'Kepala Sekolah'){ ?>
                        <ul class="nav" id="side-menu">
                            <!-- <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                            </li> -->
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            
                            <li>
                                <a href="raport.php"><i class="fa fa-table fa-fw"></i> Nilai Raport</a>
                            </li>
                            

                        </ul>
                    <?php }else if($level == "Wali Murid"){ ?>
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"n></i> Dashboard</a>
                            </li>
                            
                            <li>
                                <a href="raport_wali.php"><i class="fa fa-table fa-fw"></i> Nilai Raport</a>
                            </li>
                        </ul>
                    <?php } else if($level == "Wali Kelas"){ ?>
                        <ul class="nav" id="side-menu">
                             <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Data Master<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="mapel.php">Data Mapel</a>
                                    </li>
                                    <li>
                                        <a href="ekskul.php">Data Ekstrakurikuler</a>
                                    </li>
                                    <li>
                                        <a href="semester.php">Data Semester</a>
                                    </li>
                                    <li>
                                        <a href="predikat.php">Data Predikat</a>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                                <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Data Nilai<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="input_utswalikelas.php">Data Nilai UTS </a>
                                    </li>
                                    <li>
                                        <a href="kesehatan.php">Data Nilai Kesehatan </a>
                                    </li>
                                    <li>
                                        <a href="kls.php?ids">Data Nilai Ekstrakurikuler </a>
                                    </li>
                                    <li>
                                        <a href="prestasi.php?ids">Data Nilai Prestasi </a>
                                    </li>
                                    <li>
                                     
                                        <a href="spiritual.php?ids=">Nilai sikap <span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level"> 
                                    
                                    <li>
                                                <a href="spiritual.php?ids=">Data Nilai Spiritual </a>
                                            </li>
                                            <li>
                                                <a href="sosial.php?ids=">Data Nilai Sosial </a>
                                           </ul>
                                               </ul>
                                <!-- /.nav-second-level -->
                                <li>
                                <!-- /.nav-second-level -->
                                <li>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Data Raport<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                    <a href="ketrampilan_walikelas.php?ids=">Data Nilai Ketrampilan </a>                                    </li>
                                    <li>
                                    <a href="pengetahuan_walikelas.php?ids=">Data Nilai Pengetahuan </a>                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="raport_walikelas.php"><i class="fa fa-dashboard fa-fw"></i> Cetak Raport</a>
                            </li>

                        </ul>
                        
                    <?php } else{ ?>
                        <ul class="nav" id="side-menu">
                            <!-- <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                            </li> -->
                           
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Data Pengguna<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="kelas.php">Data Kelas</a>
                                    </li>
                                    <li>

                                    <!-- <li>
                                        <a href="wali.php">Data Wali Murid</a>
                                    </li> -->
                                    
                                        <a href="siswa.php">Data Siswa</a>
                                    </li>
                                    <li>
                                        <a href="pengumuman.php">Data Pengumuman</a>
                                     </li>
                                    <li>
                                        <a href="edit_admin.php">Data Administrator</a>
                                        </li>

                                </ul>
                                <!-- /.nav-second-level -->
                                <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Data Pendidik<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li>
                                        <a href="guru.php">Data Guru</a>
                                    </li>
                                    <li>
                                    <a href="edit_kepsek.php">Data Kepala Sekolah</a>
                                </li>
                                    
                        </ul>
                    <?php } ?>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
