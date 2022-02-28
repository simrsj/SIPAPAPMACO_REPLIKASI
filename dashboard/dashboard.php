<body class="bg-gradient-primary">
  <meta http-equiv="refresh" content="10">
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
          DASHBOARD PRAKTIKAN DAN MESS/PEMONDOKAN - RS JIWA PROVINSI JAWA BARAT
          <span class="badge badge-primary text-md"><?php echo tanggal_hari(date('w')) . " " . date("d M Y"); ?>, <span id="jam"></span></span>
        </li>
      </ul>
      <ul class="navbar-nav col-auto">
        <a class="btn btn-success btn-sm" href="http://192.168.7.89/kuesioner/survey.php" target="_blank"><i class="fas fa-clipboard-check"></i> SURVEY</a>&nbsp;
        <a class="btn btn-info btn-sm" href="?reg" target="_blank"><i class="fas fa-user-plus"></i> DAFTAR</a>&nbsp;
        <a class="btn btn-primary btn-sm" href="?lo" target="_blank"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
      </ul>
    </div>
  </nav>

  <!-- DATA PRAKTIKAN -->
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-3">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <div class="h5 text-gray-900 mb-1"><span class="badge badge-primary text-lg">DATA PRAKTIKAN</span></div>
              </div>
              <hr>
              <?php
              $sql_praktik = "SELECT * FROM tb_praktik ";
              $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
              $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
              $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y'";
              $sql_praktik .= " ORDER BY tb_praktik.tgl_selesai_praktik ASC";

              // echo $sql_praktik;

              $q_praktik = $conn->query($sql_praktik);
              $r_praktik = $q_praktik->rowCount();

              // echo $cal . "-" . $r_praktik . "-" . $round_col . "<br>";
              if ($r_praktik > 0) {
                $round_col = ceil(12 / $r_praktik);
              ?>
                <div class="row">
                  <?php
                  while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <div class="col-md-<?php echo $round_col; ?> text-center">
                      <b>
                        <?php
                        if ($d_praktik['akronim_institusi'] == NULL) {
                          echo $d_praktik['nama_institusi'];
                        } else {
                          echo $d_praktik['akronim_institusi'];
                        }
                        ?>
                      </b><br>
                      <?php
                      if ($d_praktik['logo_institusi'] == '') {
                        $link_logo_institusi = "./_img/logo_institusi/default.png";
                      } else {
                        $link_logo_institusi = $d_praktik['logo_institusi'];
                      }
                      ?>
                      <img src="<?php echo $link_logo_institusi; ?>" class="img-fluid" alt="Responsive image" width="75px" height="75px"><br>
                      <?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
                      <?php echo $d_praktik['jumlah_praktik']; ?> Orang
                    </div>
                  <?php
                  }
                  ?>
                </div>
              <?php
              } else {
              ?>
                <div class="jumbotron text-center my-auto">
                  <div class="display-4 my-auto text-lg text-uppercase font-weight-bold">Praktikan Tidak Ada </div>
                  <hr class="my-2">
                  <p class="lead">
                    <a class="btn btn-outline-success btn-lg" href="?reg" target="_blank" role="button">Ayo Daftar !!! </a>
                  </p>
                </div>
              <?php
              }
              ?>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DATA MESS -->
  <div class=" container">
    <div class="card o-hidden border-0 shadow-lg my-3">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <div class="h5 text-gray-900 mb-1"><span class="badge badge-primary text-lg">DATA MESS</span></div>
              </div>
              <hr>
              <?php
              $sql_mess = "SELECT * FROM tb_mess ";
              $sql_mess .= " WHERE nama_pemilik_mess = 'RS Jiwa Provinsi Jawa BaRat' ";
              $sql_mess .= " ORDER BY tb_mess.nama_mess ASC";

              $q_mess = $conn->query($sql_mess);
              $r_mess = $q_mess->rowCount();
              ?>
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead class="table-light">
                    <tr class="font-weight-bold text-center">
                      <th scope='col'>NO</th>
                      <th>NAMA MESS</th>
                      <th>NAMA PEMILIK</th>
                      <th>KAPASITAS TOTAL</th>
                      <th>KAPASITAS TERISI</th>
                      <th>KAPASITAS SISA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $jumlah_terisi = 0;
                    while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {

                      $sql_mess1 = "SELECT * FROM tb_praktik ";
                      $sql_mess1 .= " JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik";
                      $sql_mess1 .= " JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess";
                      $sql_mess1 .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_mess.id_mess = " . $d_mess['id_mess'];
                      $sql_mess1 .= " ORDER BY tb_mess.nama_mess ASC";
                      $q_mess1 = $conn->query($sql_mess1);
                      $jumlah_terisi = 0;
                      while ($d_mess1 = $q_mess1->fetch(PDO::FETCH_ASSOC)) {
                        $jumlah_terisi += $d_mess1['jumlah_praktik'];
                      }
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $d_mess['nama_mess']; ?></td>
                        <td><?php echo $d_mess['nama_pemilik_mess']; ?></td>
                        <td class="text-center"><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                        <td class="text-center"><?php echo $jumlah_terisi; ?></td>
                        <td class="text-center"><?php echo $d_mess['kapasitas_t_mess'] - $jumlah_terisi; ?></td>
                        <?php
                        $no++;
                        ?>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DATA PEMONDOKAN -->
  <div class=" container">
    <div class="card o-hidden border-0 shadow-lg my-3">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3">
              <div class="text-center">
                <div class="h5 text-gray-900 mb-1"><span class="badge badge-primary text-lg">DATA PEMONDOKAN</span></div>
              </div>
              <hr>
              <?php
              $sql_mess = "SELECT * FROM tb_mess ";
              $sql_mess .= " WHERE nama_pemilik_mess != 'RS Jiwa Provinsi Jawa Barat' AND status_mess = 'y'";
              $sql_mess .= " ORDER BY tb_mess.nama_mess ASC";

              $q_mess = $conn->query($sql_mess);
              $r_mess = $q_mess->rowCount();
              ?>
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead class="table-light">
                    <tr class="font-weight-bold text-center">
                      <th scope='col'>NO</th>
                      <th>NAMA MESS</th>
                      <th>NAMA PEMILIK</th>
                      <th>KAPASITAS TOTAL</th>
                      <th>KAPASITAS TERISI</th>
                      <th>KAPASITAS SISA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $jumlah_terisi = 0;
                    while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {

                      $sql_mess1 = "SELECT * FROM tb_praktik ";
                      $sql_mess1 .= " JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik";
                      $sql_mess1 .= " JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess";
                      $sql_mess1 .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_mess.id_mess = " . $d_mess['id_mess'];
                      $sql_mess1 .= " ORDER BY tb_mess.nama_mess ASC";
                      $q_mess1 = $conn->query($sql_mess1);
                      $jumlah_terisi = 0;
                      while ($d_mess1 = $q_mess1->fetch(PDO::FETCH_ASSOC)) {
                        $jumlah_terisi += $d_mess1['jumlah_praktik'];
                      }
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $d_mess['nama_mess']; ?></td>
                        <td><?php echo $d_mess['nama_pemilik_mess']; ?></td>
                        <td class="text-center"><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                        <td class="text-center"><?php echo $jumlah_terisi; ?></td>
                        <td class="text-center"><?php echo $d_mess['kapasitas_t_mess'] - $jumlah_terisi; ?></td>
                        <?php
                        $no++;
                        ?>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript">
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