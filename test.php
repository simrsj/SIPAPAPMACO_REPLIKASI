<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>

<body>
    <h1>Belajar Upload File</h1>

    <form action="test1.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Foto</label> <br>
            <input type="file" name="foto"><br>
            <label>Berkas KTP</label> <br>
            <input type="file" name="ktp">
        </div>
        <div style="margin-top: 1rem">
            <button>Upload</button>
        </div>
    </form>
</body>

</html>