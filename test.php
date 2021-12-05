<form method="post" action="">
    <select name="test">
        <option value="">PILIH</option>
        <option value="1">1</option>
    </select>
    <input type="submit" name="sub" value="cek">
</form>
<?php
if (isset($_POST['sub'])) {
    echo "-" . $_POST['test'] . "-";
}
?>