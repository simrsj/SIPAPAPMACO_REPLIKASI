<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
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
                                    <select class="form-control" id="instansi" onChange='Bukains()' name="id_institusi" required>
                                        <option value="">--<i> Pilih Institusi </i>--</option>

                                        <?php
                                        $sql_mou = "SELECT * FROM tb_institusi
                                        ORDER BY tb_institusi.nama_institusi ASC";

                                        $q_mou = $conn->query($sql_mou);
                                        $r_mou = $q_mou->rowCount();

                                        while ($d_mou = $q_mou->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option class='text-wrap' value='<?php echo $d_mou['id_institusi']; ?> '> <?php echo $d_mou['nama_institusi']; ?> </option>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                        <option value='0'>-- <i>LAINNYA</i> --</option>
                                    </select>
                                </div>
                                <div class="form-group" id="institusi_lainnya">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Alamat Email untuk username" name="email_user">
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
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Daftar">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="?ls">Sudah punya akun? silahkan login disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT JS  -->
    <script>
        function Bukains() {
            if ($('#instansi').val() == '0') {
                console.log("Pilih Institusi Lainnya");
                $('#institusi_lainnya').append("<input type='text' class='form-control form-control' placeHolder='Isikan Nama Institusi' name='nama_institusi'>").focus();
            } else {
                console.log("Tidak Pilih Institusi Lainnya");
                $('#institusi_lainnya').empty();
            }
        }
    </script>
</body>