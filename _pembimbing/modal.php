<?php if ($d_praktikan['id_jurusan_pdd'] == 1) { ?>
    <!-- Modal Tatatertib dan Pernyataan-->
    <div class="modal fade" id="tatatertib">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="height: 500px;">
                <div class="modal-body">
                    <iframe src="./_file/ked_tatatertib.pdf" width="100%" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($d_praktikan['id_jurusan_pdd'] == 2) { ?>
    <!-- Modal Tatatertib dan Pernyataan-->
    <div class="modal fade" id="tatatertib">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="height: 500px;">
                <div class="modal-header">
                    Tatatertib
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="./_file/kep_tatatertib.pdf" width="100%" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Matrix Kegiatan-->
    <div class="modal fade" id="matrixkegiatan">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="height: 500px;">
                <div class="modal-header">
                    Matrix Kegiatans
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="./_file/kep_martrix_keg.pdf" width="100%" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Logout Modal-->
<div class="modal fade" id="log-out">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" href="?lo">Ya</a>
            </div>
        </div>
    </div>
</div>