<body class="bg-gradient-primary">

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse h5 font-weight-bold row">
            <ul class="navbar-nav col">
                <li class="nav-item active">
                    <img src="./_img/logopemprov.png" class="img-fluid" alt="Responsive image" width="2%">
                    <img src="./_img/logorsj.png" class="img-fluid" alt="Responsive image" width="2%">
                    <img src="./_img/paripurnakars.png" class="img-fluid" alt="Responsive image" width="3%">
                    REGISTRASI AKUN INSTITUSI - RS JIWA PROVINSI JAWA BARAT
                    <span class="badge badge-primary text-md"><?php echo tanggal_hari(date('w')) . " " . date("d M Y"); ?>, <span id="jam"></span></span>
                </li>
            </ul>
            <ul class="navbar-nav col-auto">
                <a class="btn btn-success btn-sm" href="http://192.168.7.89/kuesioner/survey.php" target="_blank"><i class="fas fa-clipboard-check"></i> SURVEY</a>&nbsp;
                <a class="btn btn-info btn-sm" href="?dashboard"><i class="fas fa-fw fa-tachometer-alt"></i> DASHBOARD</a>&nbsp;
                <a class="btn btn-primary btn-sm" href="?lo"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
            </ul>
        </div>
    </nav>

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
                // console.log("Pilih Institusi Lainnya");
                $('#institusi_lainnya').append("<input type='text' class='form-control form-control' placeHolder='Isikan Nama Institusi' name='nama_institusi'>").focus();
            } else {
                // console.log("Tidak Pilih Institusi Lainnya");
                $('#institusi_lainnya').empty();
            }
        }

        var span = document.getElementById("jam");
        time();

        function time() {
            var d = new Date();
            var s = formattedNumber = ("0" + d.getSeconds()).slice(-2);
            var m = formattedNumber = ("0" + d.getMinutes()).slice(-2);
            var h = formattedNumber = ("0" + d.getHours()).slice(-2);
            span.textContent = h + ":" + m + ":" + s;
        }
        setInterval(time, 1000);
    </script>
</body>