<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href=' #' data-toggle='modal' data-target='#hrg_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah Harga  -->
            <div class="modal fade" id="hrg_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <h4 style="color:black;">Tambah Harga :</h4>
                            </div>
                            <div class="modal-body">
                                Nama Harga : <br>
                                <input class="form-control" name="nama_harga" required><br>
                                Jenis Harga : <br>
                                <select class="form-control text-center text-justify" name="jenis_harga" width="40px" required>
                                    <option value="">-- Pilih Jenis Harga --</option>
                                    <option value="wajib">Wajib</option>
                                    <option value="optional">Optional</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="perawat">Perawat</option>
                                    <option value="nakes_lainnya">Nakes Lainnya</option>
                                    <option value="nonnakes_lainnya">Non Nakes Lainnya</option>
                                </select><br>
                                Jenis Harga : <i style="font-size: small;">(Rp)</i><br>
                                <input class="form-control" type="number" name="jenis_harga" required><br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <nav class="navbar navbar-expand-sm bg-light navbar-dark">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="#">Kedokteran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Keperawatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nakes Lainnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Non Nakes Lainnya</a>
                </li>
                <li>
                    <span class="navbar-text"> Ini adalah Text </span>
                </li>
            </ul>
        </nav>
        <div class="card-body">
            <h3 class="text-center text-justify"> Data Harga Tidak Ada</h3>
        </div>
    </div>
</div>