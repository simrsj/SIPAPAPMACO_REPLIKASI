<?php
$id = $_GET['d'];

$sql_delete = "DELETE FROM `tb_mou` WHERE `id_mou` = $id";

$conn->query($sql_delete);
?>
<script>
	document.location.href = "?mou";
</script>