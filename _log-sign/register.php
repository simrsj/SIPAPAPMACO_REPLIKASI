<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Pendaftaran</h1>
                            </div>
                            <form class="user" action="?reg_x" method="POST">
                                <div class="form-group">
	                            	<select class="form-control-user" placeholder="Pilih Institusi" id="instansi" onChange='Bukains()' name="id_mou">
                                        <option class="text-wrap form-control form-control-user" required>--<i> Pilih Institusi</i>--</option>
                                        
	                            		<?php
		                                    $sql_mou="SELECT * FROM tb_mou order by institute_mou ASC";
		                                    
		                                    $q_mou=$conn->query($sql_mou);
		                                    $r_mou=$q_mou->rowCount();
		                                    
		                                    while ($d_mou = $q_mou->fetch(PDO::FETCH_ASSOC))
		                                    {
		                                            echo "<option class='text-wrap' value='".$d_mou['id_mou']."'>".$d_mou['institute_mou']."</option>";
		                                            $no++;
		                                    }
		                                        echo "<option class='text-warp' value='0'>LAINNYA</option>";
	                            		?>
	                            	</select>
                                </div>
                                <div class="form-group" id="institusi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Nama Lengkap" name="nama">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        placeholder="Alamat Email untuk username" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user"
                                        placeholder="No. Kontak" name="no_kontak">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="ulangi Password" name="ulangi_password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Daftar">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="?ls">Sudah punya akun? silahkan login disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    

    <!-- SCRIPT JS  -->
    <script>
        function Bukains(){
            if($('#instansi').val() == 'lainnya'){
                console.log("cek");
                $('#institusi').append("<input type=text class='form-control form-control-user' placeholder='Masukan Nama Instansi Anda' name='nama_ip'>").focus();
            }else{
                $('#institusi').empty();
                }
            }
    </script>
</body>

</html>