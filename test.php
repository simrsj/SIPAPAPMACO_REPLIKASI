<form method="get" action="">
    <input type="test" name="test" value="cek">
    <input type="submit" name="sub" value="cek">
</form>
<?php
if (isset($_GET['sub'])) {

    $id = $_POST['test'] || $_GET['test'];
    $idp = $_POST['test'];
    $idg = $_GET['test'];
    echo "-" . $id . "-" . $idp . "-" . $idg . "-";
}
?>