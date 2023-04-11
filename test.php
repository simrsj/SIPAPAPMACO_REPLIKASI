<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?= date("Y-m-d") ?><br>
        <textarea id="text" name="text"></textarea>
        <p><span id="count">0</span>/100</p>
        <button id="submit">Submit</button>

        <script>
            $(document).ready(function() {
                // ketika pengguna mengetik di dalam textarea
                $('#text').on('input', function() {
                    // hitung jumlah karakter yang dimasukkan
                    var count = $(this).val().length;

                    // tampilkan jumlah karakter di dalam span
                    $('#count').text(count);

                    // jika jumlah karakter kurang dari 100
                    if (count < 100) {
                        // nonaktifkan tombol submit
                        $('#submit').attr('disabled', true);
                    } else {
                        // aktifkan tombol submit
                        $('#submit').attr('disabled', false);
                    }
                });

                // ketika tombol submit diklik
                $('#submit').on('click', function() {
                    // kirim data textarea ke server
                    var text = $('#text').val();
                    console.log(text);
                });
            });
        </script>
    </div>
</div>