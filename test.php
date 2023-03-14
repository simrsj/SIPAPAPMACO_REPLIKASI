<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?php

        $sql_ins = " SELECT * FROM tb_institusi ";
        $sql_ins .= "JOIN tb_user on tb_institusi.id_institusi = tb_user.id_institusi ";
        $sql_ins .= "JOIN tb_kerjasama on tb_institusi.id_institusi = tb_kerjasama.id_institusi ";
        $sql_ins .= "WHERE tb_kerjasama.arsip IS NULL AND tb_institusi.id_institusi = " . 87;
        // echo $sql_ins;
        $q_ins = $conn->query($sql_ins);
        echo $q_ins->rowCount();


        ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#toast_success').toast("show");
        $('#toast_primary').toast("show");
        $('#toast_danger').toast("show");
    });
</script>