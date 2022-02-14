<div>
    <input type="file" name="file" id="file">
    <input type="button" id="btn_uploadfile" value="Upload" onclick="uploadFile();">
</div>
<script>
    // Upload file
    function uploadFile() {

        //Cari ekstensi file yg diupload
        var fileName = document.querySelector('#file').value;
        var type = fileName.split('.').pop();

        //cari ukuran file yg diupload
        var size = document.getElementById("file").files[0].size / 1024;

        //Toast bila upload file selain pdf
        if (type != 'pdf') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'warning',
                title: '<div class="text-md text-center">File Surat Harus <b>.pdf</b></div>'
            });
        } else if (size > 1024) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'warning',
                title: '<div class="text-md text-center">File Surat Harus <br><b>Kurang dari 1 Mb</b></div>'
            });
        } else if (
            files.length > 0 &&
            type == 'pdf'
        ) {

            var formData = new FormData();
            formData.append("file", files[0]);

            var xhttp = new XMLHttpRequest();

            // Set POST method and ajax file path
            xhttp.open("POST", "test1.php", true);

            // call on request changes state
            xhttp.onreadystatechange = function() {
                /* 
                if (this.readyState == 4 && this.status == 200) {

                    var response = this.responseText;
                    if (response == 1) {
                        alert("Upload successfully.");
                    } else {
                        alert("File not uploaded.");
                    }

                } 
                */
            };

            // Send request with data
            xhttp.send(formData);

        }

    }
</script>