                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-2 text-gray-800">Daftar Spesifikasi</h1>        
                        </div>
                        <div class="col-lg-4">
                            <p>
                                <a href="?spf&i" class="btn btn-success">
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
                                $sql_specialist="SELECT * FROM tb_specialist order by name_specialist ASC";
                                
                                $q_specialist=$conn->query($sql_specialist);
                                $r_specialist = $q_specialist->rowCount();
                                $d_specialist = $q_specialist->fetch(PDO::FETCH_ASSOC);

                                if($r_specialist>0){
                                    echo"
                                        <table class='table table-striped'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th>Nama Spesifikasi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    ";
                                    
                                    $q_specialist_a=$conn->query($sql_specialist);

                                    $no=1;
                                    
                                    while ($d_specialist = $q_specialist_a->fetch(PDO::FETCH_ASSOC)){
                                        echo"
                                            <tr>
                                                <td>$no</td>
                                                <td>".$d_specialist['name_specialist']."</td>
                                            ";
                                            echo"
                                                <td>   
                                                    <a class='btn btn-secondary btn-sm' href='#' data-toggle='modal' data-target='#spf_u_m".$d_specialist['id_specialist']."'>
                                                        Ubah
                                                    </a>      
                                                    <a href='?spf&d&id=".$d_specialist['id_specialist']."' class='btn btn-danger btn-sm'>
                                                        <span class='text'>Hapus</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                        ?>
                                        <div class="modal fade" 
                                            id="<?php echo "spf_u_m".$d_specialist['id_specialist']; ?>"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-footer">
                                                        <form method="post" action="?spf&u">
                                                            <input name="id_specialist" value="<?php echo $d_specialist['id_specialist']; ?>" hidden>
                                                            Nama Spesifikasi : <br>
                                                            <input name="name_specialist" value="<?php echo $d_specialist['name_specialist']; ?>"><br>
                                                            <button type="submit" class="btn btn-success">SIMPAN</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                            echo"
                                            </tbody>
                                        </table>
                                    ";
                                }else{
                                    echo"
                                        <h3> Data Spesifikasi Tidak Ada</h3>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>