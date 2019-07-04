<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Semester</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Semester
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       
                                <?php if($level != 'Kepala Sekolah'){
                                       echo "<div class='form-group col-md-3'>
                                            <a href='add_semester.php'><button type='button' class='btn btn-outline btn-success'>Tambah Data</button></a>
                                        </div>";
                                }
                                ?>
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Semester</th>
                                                    <th>Semester</th>
                                                    <th>Tahun Pelajaran</th>
                                                     
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<th>Aksi</th>";
                                                    } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($connect, "Select * from tb_semester");
                                                while($data = mysqli_fetch_array($sql)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['kd_semester']; ?></td>
                                                    <td><?php echo $data['semester']; ?></td>
                                                    <td><?php echo $data['th_pelajaran']; ?></td>
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<td><a href='edit_semester.php?id=$data[kd_semester]'><i class='fa fa-edit' aria-hidden='true' title='Edit'></i></a>&nbsp;<a href='del_semester.php?id=$data[kd_semester]'  onclick='javascript: return confirm('Anda yakin hapus ?')'><i class='fa fa-trash-o' aria-hidden='true' title='Delete'></i></a></td>";
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
        