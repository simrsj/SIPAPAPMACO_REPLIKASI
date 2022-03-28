<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Laporan
        </a> -->
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-12 col-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-md font-weight-bold text-center text-primary mb-1">
                        <div class="h5 mb-0 font-weight-bold">

                            <b> DATA PROFIL <br><?php echo $dAr_ins['nama_institusi']; ?></b>
                        </div>
                    </div>
                    <hr class="bg-primary" style="height: 2px;">
                    <div class="row no-gutters align-items-center text-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold  text-primary mb-1">
                                Alias :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b>
                                        <?php
                                        if ($dAr_ins['akronim_institusi'] == "") {
                                        ?>
                                            <span class="badge badge-danger">Data Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $dAr_ins['akronim_institusi'];
                                        }
                                        ?>
                                    </b>
                                </div>
                            </div>
                            <br>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Logo :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b>
                                        <?php
                                        if ($dAr_ins['logo_institusi'] == "") {
                                        ?>
                                            <span class="badge badge-danger">Data Tidak Ada</span>
                                        <?php
                                        } else {
                                        ?>
                                            <a title="Lihat Logo" class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#see_1">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>

                                            <!-- Lihat Logo  -->
                                            <div class="modal fade" id="see_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <img src="<?php echo $dAr_ins['logo_institusi']; ?>" width="250px" height="250px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </b>
                                </div>
                            </div>
                            <br>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Alamat :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b>
                                        <?php
                                        if ($dAr_ins['alamat_institusi'] == "") {
                                        ?>
                                            <span class="badge badge-danger">Data Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $dAr_ins['alamat_institusi'];
                                        }
                                        ?>
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Akreditasi :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b>
                                        <?php
                                        if ($dAr_ins['akred_institusi'] == "") {
                                        ?>
                                            <span class="badge badge-danger">Data Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $dAr_ins['akred_institusi'];
                                        }
                                        ?>
                                    </b>
                                </div>
                            </div>
                            <br>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Tanggal Berlaku Akreditasi Sampai:
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b>
                                        <?php
                                        if ($dAr_ins['tglAkhirAkred_institusi'] == "") {
                                        ?>
                                            <span class="badge badge-danger">Data Tidak Ada</span>
                                            <?php
                                        } else {
                                            tanggal($dAr_ins['tglAkhirAkred_institusi']);
                                            $date_end = strtotime($dAr_ins['tglAkhirAkred_institusi']);
                                            $date_now = strtotime(date('Y-m-d'));
                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                            if ($date_diff <= 0) {
                                            ?>
                                                <br>
                                                <span class="badge badge-success text-xs">
                                                    <?php echo tanggal_sisa($dAr_ins['tglAkhirAkred_institusi'], date('Y-m-d')); ?>
                                                </span>
                                            <?php
                                            } elseif ($date_diff > 0) {
                                            ?>
                                                <span class="badge badge-danger text-xs">Tidak Berlaku</span>
                                        <?php
                                            }
                                            echo "<br>";
                                        }
                                        ?>
                                        </br>
                                    </b>
                                </div>
                            </div>
                            <br>
                            <div class="text-md font-weight-bold text-primary mb-1">
                                File Akreditasi :
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <b>
                                        <?php
                                        if ($dAr_ins['logo_institusi'] == "") {
                                        ?>
                                            <span class="badge badge-danger">Data Tidak Ada</span>
                                        <?php
                                        } else {
                                        ?>
                                            <a title="Data Akreditasi Institusi" class="btn btn-success btn-sm" href="<?php echo $dAr_ins['logo_institusi']; ?>" target="_blank">
                                                <i class="fas fa-file-download"></i> Unggah File
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12  col-12">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-md font-weight-bold text-center text-danger mb-1">
                        <div class="h5 mb-0 font-weight-bold">
                            <b>
                                <i>STATUS MoU</i> / KERJA SAMA<br>
                                dengan RS Jiwa Provinsi Jawa Barat
                                </br>
                        </div>
                        
                    </div>
                    <?php 
                        $now = date('Y-m-d');
                        $selesai = $dAr_ins['tgl_selesai_mou'];
                         $date_end = strtotime($dAr_ins['tgl_selesai_mou']);
                        $date_now = strtotime(date('Y-m-d'));
                        $date_before_end = strtotime(manipulasiTanggal($dAr_ins['tgl_selesai_mou'],'-1','months'));
                        // var_dump(tanggal($date_before_end));
                        $date_diff = ($date_now - $date_end) / 24 / 60 / 60;
                        $before_end = ($date_now - $date_before_end) / 24 / 60 / 60;
                        $aktif = 2; 
                    
                    ?>
                    <hr class="bg-danger" style="height: 2px;">
                    <div class="no-gutters align-items-center text-center">
                           <div class="col-xl-12 col-md-12 col-12">
                               <h3>Hai <br><?php echo $dAr_ins['nama_institusi']; ?> </h3>
                           <br/> 
                           <?php if(ISNULL($selesai)){
                               if($date_diff <= 0) { 
                                    if($before_end <= 0){ ?>
                                        <div class="col-xl-12 col-md-12 col-12"> <h5><span class="badge badge-success col-12">MOU Kita masih <b>AKTIF</b>,<br> Terima Kasih Telah Ber-MOU dengan Kami</span></h5></div>
                                <?php }else{ ?>          
                                        <div class="col-xl-12 col-md-12 col-12"><h5><span class="badge badge-danger col-12">MOU Kita sebentar lagi <b>KADALUARSA</b> <br/>tepatnya pada tanggal : <?php echo tanggal($dAr_ins['tgl_selesai_mou']); ?>,<br> Silahkan Hubungi Pihak Kami melalui nomor berikut : <b>081321417344 (Adhie)</b></span></h5></div>
                               <?php } ?>
                            <?php } elseif($date_diff > 0) { ?>
                                    <div class="col-xl-12 col-md-12 col-12"><h5><span class="badge badge-dark col-12">Mohon Maaf MOU Kita <b>SUDAH KADALUARSA</b>,<br> Silahkan Hubungi Pihak Kami melalui nomor berikut :  <b>081321417344 (Adhie)</b>  </span></h5></div>
                            <?php }
                                    }else{ ?>
                                    <div class="col-xl-12 col-md-12 col-12"><h5><span class="badge badge-orange col-12">Mohon Maaf Kita <b>BELUM MOU</b>,<br> Silahkan Hubungi Pihak Kami melalui nomor berikut :  <b>081321417344 (Adhie)</b>  </span></h5></div>
                            <?php } ?>
                          
                           </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>