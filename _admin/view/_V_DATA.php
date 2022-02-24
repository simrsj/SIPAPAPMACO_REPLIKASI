--------------------------------- v_praktik.php

<!-- Data Mess  -->
<div class="row">
    <div class="col-md-12">
        <!-- data mess yang dipilih -->
        <div class="text-gray-700">
            <div class="row">
                <div class="col-lg-11">
                    <h4 class="font-weight-bold">
                        DATA MESS
                        <a title="Ubah Mess" class="btn btn-primary btn-sm" href='?prk&um=<?php echo $d_praktik['id_praktik']; ?>'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a title="Hapus Mess" class="btn btn-danger btn-sm" href='#' data-toggle="modal" data-target="#m_h_m<?php echo $d_praktik['id_praktik']; ?>">
                            <i class=" fas fa-trash-alt"></i>
                        </a>

                        <!-- modal hapus bayar -->
                        <div class="modal fade text-left" id="m_h_m<?php echo $d_praktik['id_praktik']; ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>HAPUS DATA MESS ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" href='?prk&hm=<?php echo $d_praktik['id_praktik']; ?>'> HAPUS </a>
                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h4>
                </div>
            </div>
        </div>
        <br>
        <div style="font-size: medium;">
            <?php

            $sql_mess_pilih = "SELECT * FROM tb_mess_pilih
                                                      JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess
                                                      WHERE tb_mess_pilih.id_praktik = " . $d_praktik['id_praktik'];

            $q_mess_pilih = $conn->query($sql_mess_pilih);
            $r_mess_pilih = $q_mess_pilih->rowCount();
            if ($r_mess_pilih > 0) {

                $d_mess_pilih = $q_mess_pilih->fetch(PDO::FETCH_ASSOC);
            ?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <fieldset class="fieldset">
                            <h5 class="text-gray-800 font-weight-bold">Nama Mess :</h5>
                            <?php echo $d_mess_pilih['nama_mess']; ?><br><br>
                            <h5 class="text-gray-800 font-weight-bold"> Nama Pemilik :</h5>
                            <?php echo $d_mess_pilih['nama_pemilik_mess']; ?><br><br>
                            <h5 class="text-gray-800 font-weight-bold">No Pemilik :</h5>
                            <?php echo $d_mess_pilih['no_pemilik_mess']; ?><br><br>
                            <h5 class="text-gray-800 font-weight-bold"> Alamat Mess : </h5>
                            <?php echo $d_mess_pilih['alamat_mess']; ?><br><br>
                            <!-- <h5 class="text-gray-800 font-weight-bold"> Jumlah yang diisi :</h5>
                                                                      <?php echo $d_mess_pilih['jumlah_praktik_mess_pilih']; ?><br><br> -->
                            <h5 class="text-gray-800 font-weight-bold"> Jumlah Hari :</h5>
                            <!-- <?php echo $d_mess_pilih['total_hari_mess_pilih']; ?><br><br>
                                                                      <h5 class="text-gray-800 font-weight-bold"> Dengan Makan (3X Sehari) :</h5> -->
                            <?php
                            if ($d_mess_pilih['makan_mess_pilih'] == 'y') {
                                $makan = 'YA';
                            } else {
                                $makan = 'TIDAK';
                            }
                            echo $makan; ?>
                            <!-- <h5 class="text-gray-800 font-weight-bold"> Total Tarif :</h5>
                                                                      <?php echo "Rp " . number_format($d_mess_pilih['total_tarif_mess_pilih'], 0, ",", "."); ?> -->
                        </fieldset>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="jumbotron">
                    <div class="jumbotron-fluid">
                        <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                            <h5 class="text-center">Data Tidak Ada</h5>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<hr>

<!-- tombol ubah  -->
<a <?php echo $link_ubah; ?> class="btn btn-primary btn-sm" title="Ubah">
    <i class="fas fa-edit"></i>
</a>

<!-- modal ubah -->
<div class="modal fade" id="prk_u_<?php echo $d_praktik['id_praktik']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center text-lg font-weight-bold">
            <div class="modal-body">
                DATA TIDAK BISA DIRUBAH<br>
                <?php
                if ($d_praktik['status_cek_praktik'] == 'AKV') {
                ?>
                    <span class="badge badge-success">PRAKTIKAN AKTIF</span>
                <?php
                } elseif ($d_praktik['status_cek_praktik'] == 'SLS') {
                ?>
                    <span class="badge badge-dark">PRAKTIKAN SELESAI</span>
                <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- tombol arsip -->
<a class='btn btn-outline-info btn-sm' href='#' data-toggle='modal' data-target='#prk_dh_<?php echo $d_praktik['id_praktik']; ?>' title="arsip">
    <i class="fas fa-archive"></i>
</a>

<!-- modal arsip -->
<div class="modal fade" id="prk_dh_<?php echo $d_praktik['id_praktik']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>ARSIP KAN DATA :</h5>
            </div>
            <div class="modal-body text-left text-md">
                <b>Nama Institusi </b><br>
                <?php echo $d_praktik['nama_institusi']; ?><br>
                <b>Periode Praktik </b> : <br>
                <?php echo $d_praktik['nama_praktik']; ?>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                    <input type="submit" name="arsip_praktik" value="Arsipkan" class="btn btn-info btn-sm">
                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
---------------------------------