<div>
    <input type="file" name="asdasd" id="file">
    <input type="file" name="filaasde_1" id="file_1">
    <input type="button" id="btn_uploadfile" value="Upload" onclick="uploadFile();">
</div>
<script>
    // Upload file
    function uploadFile() {

        var files = document.getElementById("file").files;
        var files_1 = document.getElementById("file_1").files;

        var formData = new FormData();
        var xhttp = new XMLHttpRequest();

        formData.append("file", files[0]);
        formData.append("file_1", files_1[0]);

        xhttp.open("POST", "test1.php", true);

        xhttp.send(formData);
    }
</script>