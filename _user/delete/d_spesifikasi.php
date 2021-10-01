<?php
$id=$_GET['id'];

$sql_delete="DELETE FROM `tb_specialist` WHERE `id_specialist` = $id";

$conn->query($sql_delete);
?>
	<script>			
		document.location.href="?spf";
	</script>