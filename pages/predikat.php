<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Predikat</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Predikat
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       
                                       
                                       
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nilai A</th>
                                                    <th>Nilai B</th>
                                                    <th>Predikat</th>
                                                    <th>Keterangan</th>
                                                     
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<th>Aksi</th>";
                                                    } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($connect, "Select * from tb_predikat");
                                                while($data = mysqli_fetch_array($sql)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nilai_a']; ?></td>
                                                    <td><?php echo $data['nilai_b']; ?></td>
                                                    <td><?php echo $data['grade']; ?></td>
                                                    <td><?php echo $data['keterangan']; ?></td>
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<td><a href='edit_predikat.php?id=$data[kd_predikat]'><i class='fa fa-edit' aria-hidden='true' title='Edit'></i></a></td>";
                                                    }
                                                    ?>
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

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
<?php include 'footer.php'; ?>
        