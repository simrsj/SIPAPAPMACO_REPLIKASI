                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>        
                        </div>
                        <div class="col-lg-4">
                            <p>
                                <a href="?prk&i" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah
                                </a>
                            </p>        
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                if($_SESSION['level_user']==1)
                                {
                                    $sql_practice="SELECT * FROM tb_practice order by id_practice ASC";
                                }
                                elseif($_SESSION['level_user']==2)
                                {
                                    $sql_practice="SELECT * FROM tb_practice where id_mou=".$_SESSION['id_mou']." order by id_practice ASC";
                                    //echo $_SESSION['id_mou'];
                                }
                                else
                                {
                                    $sql_practice="";
                                }
                                $q_practice=$conn->query($sql_practice);
                                $r_practice = $q_practice->rowCount();

                                if($r_practice==true){
                                    echo"
                                        <table class='table table-striped'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th>Nama Institusi</th>
                                                    <th>Nama Praktikan</th>
                                                    <th>Tanggal Awal</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    ";
                                    
                                    $q_practice_a=$conn->query($sql_practice);

                                    $no=1;
                                    
                                    while ($d_practice = $q_practice_a->fetch(PDO::FETCH_ASSOC)){
                                        echo"
                                            <tr>
                                                <td>$no</td>
                                                <td>".$d_practice['institute_practice']."</td>
                                                <td>".$d_practice['name_practice']."</td>
                                                <td>".$d_practice['start_practice']."</td>
                                                <td>".$d_practice['end_practice']."</td>
                                                <td>";

                                                if($d_practice['status_practice']=="Y")
                                                {
                                                    echo"
                                                        <button class='btn btn-success btn-sm'>Aktif</button>
                                                        ";
                                                }
                                                elseif($d_practice['status_practice']=="N")
                                                {
                                                    echo"
                                                        <button class='btn btn-danger btn-sm'>Tidak Aktif</button>
                                                        ";
                                                }

                                        echo"
                                                </td>
                                                <td>                                              
                                                    <a href='#' data-toggle='modal' data-target='#dtl".$d_practice['id_practice']."' class='btn btn-info btn-sm'>Detail
                                                    </a>
                                                ";
                                                ?>
                                                <div class="modal fade" 
                                                    id="<?php echo "dtl".$d_practice['id_practice']; ?>"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <?php 
                                                                    $sql_practice_1="SELECT * FROM tb_practice where id_practice=".$d_practice['id_practice'];
                                                                    
                                                                    $q_practice_1=$conn->query($sql_practice_1);
                                                                    $d_practice_1=$q_practice_1->fetch(PDO::FETCH_ASSOC);
                                                                ?>
                                                                <strong>Nama Institusi</strong><br>
                                                                <p><?php echo $d_practice_1['institute_practice']; ?></p>
                                                                <strong>Nama Praktikan</strong><br>
                                                                <p><?php echo $d_practice_1['name_practice']; ?></p>
                                                                <strong>Tanggal Paktikan</strong><br>
                                                                <p><?php echo $d_practice_1['start_practice']." s/d ".$d_practice_1['end_practice']; ?></p>
                                                                <strong>Jurusan</strong><br>
                                                                <p><?php echo $d_practice_1['major_practice']; ?></p>
                                                                <strong>Spesifikasi</strong><br>
                                                                <p><?php echo $d_practice_1['specialist_practice']; ?></p>
                                                                <strong>Jenjang Pendidikan</strong><br>
                                                                <p><?php echo $d_practice_1['level_practice']; ?></p>
                                                                <strong>Akreditasi</strong><br>
                                                                <p><?php echo $d_practice_1['major_practice']; ?></p>
                                                                <hr>
                                                                <strong>Nama CP</strong><br>
                                                                <p><?php echo $d_practice_1['name_cp_practice']; ?></p>
                                                                <strong>Kontak CP</strong><br>
                                                                <p><?php echo $d_practice_1['telp_cp_practice']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                echo "
                                                </td>
                                            ";
                                            echo"
                                                <td>                                                
                                                    <a href='#' class='btn btn-primary btn-icon-split'>
                                                        <span class='text' title='Ubah'>Ubah</span>
                                                    </a>      
                                                    <a href='#' class='btn btn-danger btn-icon-split'>
                                                        <span class='text'>Hapus</span>
                                                    </a>    
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                    }

                                    echo"
                                    </tbody>
                                </table>
                                    ";
                                }else{
                                    echo"
                                        <h3 class='text-center'> Data Praktikan Anda Tidak Ada</h3>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->