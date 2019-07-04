
<?php
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php';

$level =    $_SESSION['level'];
$username =    $_SESSION['username'];

// $sql = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE  nis='$username'");
// $datasql = mysqli_fetch_array($sql);
// $walikelas = $datasql['kd_kelas'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Siswa
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                      
                                      
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Print Raport</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                    $sql = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE  nis='$username'");
                                                    while($sqlcari = mysqli_fetch_array($sql)){
                                                
                                                
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $sqlcari['nis']; ?></td>
                                                    <td><?php echo $sqlcari['nm_siswa']; ?></td>
                                                    <td>
                                                        <a href="print-hal.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Cover</button></a>
                                                        <a href="print-hal1.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Hal 1</button></a>
                                                        <a href="print-hal2.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Hal 2</button></a>
                                                        <a href="print-hal3.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Hal 3</button></a>
                                                        <a href="print-hal4.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Hal 4</button></a>
                                                        <a href="print-hal5.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Hal 5</button></a>
                                                
                                                    </td>
                                                   
                                                   
                                                </tr>
                                                <?php 
                                                    }?>
                                                
                                            </tbody>
                                        </table>
                                        <button type="submit" name="simpan" class="btn btn-outline btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
include 'footer.php';
include '../config.php';

if(isset($_POST['simpan'])){

    $nis   =   $_POST['nis'];
    $kd_mapel   =   $_POST['kd_mapel'];
    $kd_semester   =   $_POST['kd_semester'];
    $tema1 = $_POST['tema1'];
    $tema2 = $_POST['tema2'];
    $tema3 = $_POST['tema3'];
    $tema4 = $_POST['tema4'];
    $tema5 = $_POST['tema5'];
    $deskripsi   =   $_POST['deskripsi'];
    $jumlah = count($kd_mapel) - 1;

    for($i=0;$i<=$jumlah;++$i){
        $sql = "INSERT INTO tbl_nilai_keterampilan (kd_mapel,nis,kd_semester,tema1,tema2,tema3,tema4,tema5,deskripsi) VALUES ('$kd_mapel[$i]','$nis[$i]','$kd_semester[$i]','$tema1[$i]','$tema2[$i]','$tema3[$i]','$tema4[$i]','$tema5[$i]','$deskripsi[$i]')";
        $query = mysqli_query($connect, $sql);
    
       
    
    }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='ketrampilan.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        