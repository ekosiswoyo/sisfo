<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_siswa where nis='$id'");
$cari = mysqli_fetch_array($sql);
$wali = mysqli_query($connect,"select * from tb_wali_murid where nis='$id'");
$cariwali = mysqli_fetch_array($wali);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Detail Data Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data Siswa
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>NIS</label>
                                                    <input class="form-control" placeholder="NIS" name="nis" value="<?php echo $cari['nis'];?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Siswa</label>
                                                    <input class="form-control" placeholder="Nama Siswa" name="nm_siswa" value="<?php echo $cari['nm_siswa'];?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Kelas</label>
                                                    <select class="form-control" label="aa" name="kd_kelas" readonly>
                                                    <option  value="<?php echo $cari['kd_kelas'];?>"><?php echo $cari['kd_kelas'];?></option>
                                                       
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control" placeholder="Tempat Lahir" name="tmp_lahir"  value="<?php echo $cari['tmp_lahir'];?>" readonly>
                                                </div>

                                                 <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jns_kel" readonly>
                                                        <option  value="<?php echo $cari['jns_kel'];?>"><?php echo $cari['jns_kel'];?></option>
                                                        
                                                    
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Agama</label>
                                                    <select class="form-control" name="agama" readonly>
                                                        <option value="<?php echo $cari['agama'];?>"><?php echo $cari['agama'];?></option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input class="form-control" placeholder="Pendidikan Terakhir" name="pend_terakhir"  value="<?php echo $cari['pend_terakhir'];?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" name="alamat" readonly><?php echo $cari['alamat'];?></textarea>
                                                </div>

                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                     
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                         <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data Wali Murid
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">


                                               <div class="form-group">
                                                   <label>Nama Bapak</label>
                                                   <input class="form-control" placeholder="Nama Bapak" name="nm_bpk" value="<?php echo $cariwali['nm_bpk'];?>" readonly>
                                               </div>

                                               <div class="form-group">
                                                   <label>Nama Ibu</label>
                                                   <input class="form-control" placeholder="Nama Ibu" name="nm_ibu" value="<?php echo $cariwali['nm_ibu'];?>" readonly>
                                               </div>

                                                <div class="form-group">
                                                   <label>Pekerjaan Bapak</label>
                                                   <input class="form-control" placeholder="Pekerjaan Bapak" name="pekerjaan_bpk" value="<?php echo $cariwali['pekerjaan_bpk'];?>" readonly>
                                               </div>

                                                <div class="form-group">
                                                   <label>Pekerjaan Ibu</label>
                                                   <input class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" value="<?php echo $cariwali['pekerjaan_ibu'];?>" readonly>
                                               </div>

                                               <div class="form-group">
                                                   <label>Alamat Orang Tua</label>
                                                   <textarea class="form-control" rows="3" name="alamat_ortu" readonly><?php echo $cariwali['alamat_ortu'];?></textarea>
                                               </div>

                                               <div class="form-group">
                                                   <label>No HP</label>
                                                   <input class="form-control" placeholder="No HP" name="no_hp" value="<?php echo $cariwali['no_hp'];?>" readonly>
                                               </div>


                                               
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                     
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>


              

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
