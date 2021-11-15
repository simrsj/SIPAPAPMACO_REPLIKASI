<?php
$id=$_POST['id_specialist'];
$name=$_POST['name_specialist'];

$sql_update="UPDATE `tb_specialist` SET `name_specialist` = '$name' WHERE `tb_specialist`.`id_specialist` = $id";

$conn->query($sql_update);
?>
	<script>			
		document.location.href="?spf";
	</script>