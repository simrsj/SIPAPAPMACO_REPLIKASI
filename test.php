<?php
echo tanggal('2008-08-09');
?>
<div onload="cek();"></div>
<button onclick="cek()"></button>
<script>
    function cek() {

        const Toast = Swal.mixin({
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: 'success',
            title: '<div class="text-md text-center">DATA HARGA BERHASIL TERSIMPAN</div>'
        });

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });

    }

    var timer = setTimeout(function() {
        window.location = '?'
    }, 3000);
</script>