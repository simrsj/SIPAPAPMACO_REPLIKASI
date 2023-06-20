<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?php
        echo decryptString('HK4laj9oBMsmRthwec+1SXa/2QOTZXL0ZFFekqO8FBw=', $customkey);

        ?>
        <script>
            $(document).ready(function() {
                // ketika checkbox yang ingin di centang semua di klik
                $("#checkAll").click(function() {
                    // jika checkAll di centang
                    if ($(this).is(":checked")) {
                        // centang semua checkbox
                        $(".checkbox").prop("checked", true);
                    } else {
                        // hilangkan centang semua checkbox
                        $(".checkbox").prop("checked", false);
                    }
                });
            });

            // jika checkbox individu di klik
            function checkIndividual() {
                // jumlah total checkbox yang ada
                var totalCheckbox = $('.checkbox').length;
                // jumlah checkbox yang dicek
                var totalChecked = $('.checkbox:checked').length;

                // jika jumlah checkbox yang dicek sama dengan jumlah total checkbox
                if (totalChecked == totalCheckbox) {
                    // centang checkAll
                    $("#checkAll").prop("checked", true);
                } else {
                    // hilangkan centang checkAll
                    $("#checkAll").prop("checked", false);
                }
            }
        </script>
        <input type="checkbox" id="checkAll"> Check All<br>
        <input type="checkbox" class="checkbox" onclick="checkIndividual()"> Checkbox 1<br>
        <input type="checkbox" class="checkbox" onclick="checkIndividual()"> Checkbox 2<br>
        <input type="checkbox" class="checkbox" onclick="checkIndividual()"> Checkbox 3<br>
        <input type="checkbox" class="checkbox" onclick="checkIndividual()"> Checkbox 4<br>
        <input type="checkbox" class="checkbox" onclick="checkIndividual()"> Checkbox 5<br>

    </div>
</div>