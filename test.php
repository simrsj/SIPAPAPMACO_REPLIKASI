<button onclick="cek()">CEK</button><br>
<script>
    function cek() {

        //Cari Jenis Jurusan
        var jur = 3;
        var xmlhttp_path = new XMLHttpRequest();
        xmlhttp_path.onload = function() {
            // alert(this.responseText);
            var path = JSON.parse(this.responseText);
            Swal.fire({
                allowOutsideClick: false,
                // isDismissed: false,
                icon: 'success',
                title: '<span class"text-xs"><b>DATA PRAKTIK</b> dan <b>HARGA</b><br>Berhasil Tersimpan',
                showConfirmButton: false,
                html: '<a href="?prk=' + path.jenis_jurusan + '" class="btn btn-outline-primary">OK</a>',
            });
        };
        xmlhttp_path.open("GET", "_admin/insert/i_praktikPath.php?jur=" + jur,
            true
        );
        xmlhttp_path.send();
    }
</script>