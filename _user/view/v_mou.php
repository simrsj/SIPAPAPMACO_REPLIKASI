                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Daftar MoU</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php
                                $sql_mou="SELECT * FROM tb_mou order by institute_mou ASC";
                                
                                $q_mou=$conn->query($sql_mou);
                                $r_mou = $q_mou->rowCount();
                                $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);


                                if($r_mou>0){
                                    echo"
                                        <table class='table table-striped' id='dataTable' width='100%'' cellspacing='0'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th>Nama Institusi</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    ";
                                    
                                    $q_mou_a=$conn->query($sql_mou);

                                    $no=1;
                                    
                                    while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)){
                                        echo"
                                            <tr>
                                                <td style='font-size:14px'>$no</td>
                                                <td style='font-size:14px; width:25%'>".$d_mou['institute_mou']."</td>
                                                <td style='font-size:14px'>".$d_mou['end_date_mou']."</td>
                                            ";

                                            $date_end = strtotime($d_mou['end_date_mou']);
                                            $date_now = strtotime(date('Y-m-d'));
                                            $date_diff = ($date_now-$date_end)/24/60/60;

                                            if($date_diff<=0)
                                            {
                                                echo "
                                                    <td>
                                                        <button class='btn btn-success btn-sm'>Masih Berlaku</button>
                                                    </td>
                                                    ";
                                            }
                                            elseif($date_diff>0)
                                            {
                                                echo "
                                                    <td>
                                                        <button class='btn btn-danger btn-sm'>Tidak Berlaku</button>
                                                    </td>
                                                    ";
                                            }
                                            echo"
                                                <td>
                                                    <a href='#' class='btn btn-primary btn-sm'>Ubah</a>      
                                                    <a href='#' class='btn btn-danger btn-sm'>Hapus</a>
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
                                        <h3> Data MoU Tidak Ada</h3>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->