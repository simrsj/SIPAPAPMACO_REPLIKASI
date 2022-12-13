<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Pendaftaran</h1>
                                </div>
                                <form class="user" action="?reg_x" method="POST">
                                    <div class="form-group">
                                        <select class="select2" id="instansi" onChange='Bukains()' name="id_institusi" id="" style="width:100%" required>
                                            <option value="">--<i> Pilih Institusi </i>--</option>
                                            <?php
                                            $sql_ip = "SELECT * FROM tb_institusi";
                                            $sql_ip .= " ORDER BY tb_institusi.nama_institusi ASC";
                                            try {
                                                $q_ip = $conn->query($sql_ip);
                                            } catch (Exception $ex) {
                                                echo "<script>alert('$ex -DATA PRIVILEGES-');";
                                                echo "document.location.href='?error404';</script>";
                                            }
                                            $r_ip = $q_ip->rowCount();

                                            while ($d_ip = $q_ip->fetch(PDO::FETCH_ASSOC)) {
                                                $akronim_institusi = "";
                                                if (!empty($d_ip['akronim_institusi'])) {
                                                    $akronim_institusi = " (" . $d_ip['akronim_institusi'] . ")";
                                                }
                                            ?>
                                                <option class='text-wrap' value='<?= $d_ip['id_institusi']; ?> '> <?= $d_ip['nama_institusi'] . $akronim_institusi; ?> </option>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                            <option value='0'>-- <i>LAINNYA</i> --</option>
                                        </select>
                                        <center><span class="text-xs font-italic text-center">Pilih <b>-- LAINNYA --</b> bila nama institusi tidak terdaftar dan isikan nama institusi yang disediakan</span></center>
                                    </div>
                                    <div class="form-group" id="institusi_lainnya">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Alamat Email untuk username" name="email_user">
                                        <center><span class="text-xs font-italic text-center">Alamat e-mail akan dijadikan <b>username</b></span></center>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="No. Telp" name="no_telp_user">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control" placeholder="Password" name="password_user">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" placeholder="Ulangi Password" name="ulangi_password">
                                        </div>
                                    </div>
                                    <div class="h-captcha" data-sitekey="985c2b81-998a-407e-b467-d456a1a0138f"></div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Daftar">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="?lo">Klik disini, jika sudah punya akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function Bukains() {
        if ($('#instansi').val() == '0') {
            // console.log("Pilih Institusi Lainnya");
            $('#institusi_lainnya').append("<input type='text' class='form-control form-control' placeHolder='Isikan Nama Institusi' name='nama_institusi'>").focus();
        } else {
            // console.log("Tidak Pilih Institusi Lainnya");
            $('#institusi_lainnya').empty();
        }
    }
</script>