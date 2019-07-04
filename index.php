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
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <CENTER><h3 class="panel-title">SISTEM INFORMASI AKADEMIK</h3></CENTER>
                            <CENTER></CENTER>
                            <CENTER></CENTER>
                            <CENTER><h3 class="panel-title">SD NEGERI 01 RANDUMUKTIWAREN</h3></CENTER>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
<?php
if(isset($_POST['login'])){
session_start();

include ('config.php');

$user = $_POST['username']; // menghindari sql injection, script dasar
$pass = md5($_POST['password']); // md5 adalah enkripsi

$query = "SELECT * FROM tb_user where username='$user' and password='$pass'";
//memasukan query ke varibel $data
$data = mysqli_query($connect,$query);
$tampil = mysqli_fetch_array($data);
if ($tampil != null) {

    // ... jika hasil tidak null berarti user ketemu,
    // ... lanjut periksa password

    if ($pass==$tampil['password']) {
    $_SESSION['username'] = $tampil['username'];
    $_SESSION['nama'] = $tampil['nama'];
    $_SESSION['level'] = $tampil['level'];
    
    echo "<script>window.alert('Login Success')</script>";
    echo "<script>window.location='pages/index.php';</script>";
  } 
  else {
    echo "<script>window.alert('Login Failed !')</script>";
    echo "<script>window.location='login.php';</script>";
  }
} 
else {
	// Windows.alert = pesan peringatan
    echo "<script>window.alert('Login Failed')</script>";
    echo "<script>window.location=index.php';</script>";
}
}
?>