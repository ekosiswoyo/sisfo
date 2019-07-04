<?php
include '../config.php';
include 'header.php';
$nis = $_GET['id'];
$kls = $_GET['kelas'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Nilai UTS</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       <form action="" method="POST">
                                       <?php
                                        $siswa = mysqli_query($connect, "SELECT * FROM tb_nilai_uts a, tb_siswa b, tb_mapel c where a.nis='$nis' and b.nis=a.nis and a.kd_mapel=c.kd_mapel");
                                        $siswa_d = mysqli_fetch_array($siswa);
                                       ?>
                                       <table>
                                       <tr>
                                        <th>NIS</th>
                                        <th> : </td>
                                        <th><?php echo $siswa_d['nis'];?></td>
                                       </tr>
                                       <tr>
                                        <th>Nama Siswa</td>
                                        <th> : </th>
                                        <th> <?php echo $siswa_d['nm_siswa'];?></th>
                                       </tr>
                                       </table>
                                       <hr>

                                          

                                        </form>

                                        
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Mapel</th>
                                                    <th>Detail Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               

                                                    <?php
                                                    
                                                $no = 1;
                                                        $data = mysqli_query($connect, "SELECT * FROM tb_nilai_uts a, tb_siswa b, tb_mapel c where a.nis='$nis' and b.nis=a.nis and a.kd_mapel=c.kd_mapel group by a.kd_mapel");
                                                        while($datas = mysqli_fetch_array($data)){

                                                    ?>
                                                    <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $datas['kd_mapel']; ?> - <?php echo $datas['nm_mapel']; ?></td>
                                                    <td><a href="detail_uts.php?id=<?php echo $datas['nis']; ?>&mapel=<?php echo $datas['kd_mapel']; ?>&kelas=<?php echo $datas['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Detail Nilai</button></a></td>

                                                </tr>
                                                        <?php } 
                                                        ?>
                                                
                                            </tbody>
                                        </table>
                                       
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
?>
        