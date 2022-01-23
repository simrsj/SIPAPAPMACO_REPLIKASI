<a href="#" class="btn btn-success" id="tombol_lanjut" onclick="data_harga()">
    <i class="fas fa-chevron-circle-down"></i> Lanjut
</a>

<input id="lanjut" value="lanjut_ked" hidden>

<div id="data_pilih_harga">

</div>

<script>
    function data_harga() {
        if ($('#lanjut').val() == 'lanjut_ked') {
            // $("#tombol_lanjut").click(function() {
            //     $(this).hide('slow');
            // });
            $("#tombol_lanjut").fadeOut('slow');
            $('#data_pilih_harga').append(
                "<div class='card shadow mb-4'><div class='card-body'>DATA HARGA KEDOKTERAN</div></div>"
            );
        } else if ($('#lanjut').val() == 'lanjut_kep') {
            $('#data_pilih_harga').append(
                "<div class='card shadow mb-4'><div class='card-body'>DATA HARGA KEPERAWATAN</div></div>"
            ).focus();
        } else if ($('#lanjut').val() == 'lanjut_nkn') {
            $('#data_pilih_harga').append(
                "<div class='card shadow mb-4'><div class='card-body'>DATA HARGA NAKES LAINNYA DAN NON-NAKES</div></div>"
            ).focus();
        }
    }
</script>