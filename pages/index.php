<?php
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}
include 'header.php';
$level =    $_SESSION['level'];
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h1 class="page-header">SISTEM INFORMASI AKADEMIK</h1></center>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 <?php if($level == 'Wali Murid' || $level == 'admin'){ ?>
                <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    Semua Pengumuman
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       
                                    
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Isi</th>
                                                    <th>Download Surat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($connect, "Select * from tb_pengumuman");
                                                while($data = mysqli_fetch_array($sql)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['judul']; ?></td>
                                                    <td><?php echo $data['isi']; ?></td>
                                                    <td><a href="../files/<?php echo $data['file']; ?>" target="_blank">Klik Untuk Mendownload File</a></td>
                                                    
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?php } ?>
                <!-- /.row -->
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php
include 'footer.php';
?>