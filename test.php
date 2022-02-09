<button onclick="cek()">CEK</button><br>
<button onclick="cek1()">CEK1</button><br>
<script>
    function cek() {

        // Swal.DismissReason.backdrop;
        Swal.fire({
            allowOutsideClick: false,
            // isDismissed: false,
            icon: 'success',
            title: '<span class"text-xs"><b>DATA PRAKTIK</b> dan <b>HARGA</b><br>Berhasil Tersimpan',
            showConfirmButton: false,
            html: '<a href="?prk=' + asd + '" class="btn btn-outline-primary">OK</a>',
        })
    }

    function cek1() {


        Swal.fire({
            title: '<strong>HTML <u>example</u></strong>',
            icon: 'info',
            timer: 1000,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
            cancelButtonAriaLabel: 'Thumbs down',

            html: window.location = '?',
        })
    }
</script>