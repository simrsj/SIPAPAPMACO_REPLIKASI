<?php
if (empty($_SESSION['username_user'])) {
?>

	<body class="bg-gradient-primary">
		<nav class="navbar navbar-light bg-light row mr-0 ml-0">
			<ul class="navbar-nav col-4">
				<li class="nav-item">
					<?php include "?logo"; ?>
					<img src="./_img/logopemprov.png" class="img-fluid" alt="Responsive image" width="30px">
					<img src="./_img/logorsj.png" class="img-fluid" alt="Responsive image" width="30px">
					<img src="./_img/paripurnakars.png" class="img-fluid" alt="Responsive image" width="40px">
					<img src="./_img/wbk.png" class="img-fluid" alt="Responsive image" width="30px">
				</li>
			</ul>
			<ul class="h5 font-weight-bold navbar-nav col-4 text-center">
				<li class="nav-item">
					LOGIN
					<span class="badge badge-primary text-md">
						<?php echo tanggal_hari(date('w')) . " " . date("d M Y"); ?>,
						<span id="jam"></span>
					</span>
				</li>
			</ul>
			<ul class="navbar-nav col-4 font-weight-bold text-right">
				<li class="nav-item">
					<a class="btn btn-outline-warning btn-sm my-auto" href="?dashboard"><i class="fas fa-fw fa-tachometer-alt"></i> DASHBOARD</a>
					<a class="btn btn-outline-success btn-sm my-auto" href="?reg"><i class="fas fa-user-plus"></i> REGISTRASI</a>
				<li class="nav-item">
			</ul>
		</nav>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-3">
						<div class="card-body text-center font-weight-bold text-gray-800">
							<span class="badge badge-primary mb-2">
								<h4>SIPAPAP MACO</h4>
							</span>
							<h5 class="text-gray-900">
								(Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-2">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
								<div class="col-lg-6">
									<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Login</h1>
										</div>
										<form class="user" method="post">
											<div class="form-group">
												<input name='username_user' placeholder='Username' class="form-control form-control-user" placeholder="Username" required="">
											</div>
											<div class="form-group">
												<input type='password' name='password_user' placeholder='Password' class="form-control form-control-user" required="">
											</div>
											<input type='submit' value='Login' name='Login' class="btn btn-primary btn-user btn-block">
										</form>
										<hr>
										<div class="text-center">
											<a class="small" href="?reg">Lakukan Pendaftaran disini</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if (isset($_POST['Login'])) {
				$username_user = $_POST['username_user'];
				$password_user = MD5($_POST['password_user']);
				$sql_name = "SELECT * from `tb_user` WHERE `username_user`='$username_user'";
				$sql_pass = "SELECT * from `tb_user` WHERE `password_user`='$password_user'";
				$sql_name_pass = "SELECT * from `tb_user` 
				WHERE `username_user`='$username_user' 
					AND `password_user`='$password_user' 
					AND status_user = 'Y' ";

				$exc_name = $conn->query($sql_name);
				$exc_pass = $conn->query($sql_pass);
				$exc_name_pass = $conn->query($sql_name_pass);
				$x_name = 0;
				$x_pass = 0;
				$x_name_pass = 0;

				while ($row_name = $exc_name->fetch(PDO::FETCH_ASSOC)) {
					$x_name++;
				}
				while ($row_pass = $exc_pass->fetch(PDO::FETCH_ASSOC)) {
					$x_pass++;
				}
				while ($row = $exc_name_pass->fetch(PDO::FETCH_ASSOC)) {
					$_SESSION['username_user'] = $row['username_user'];
					$_SESSION['nama_user'] = $row['nama_user'];
					$_SESSION['id_user'] = $row['id_user'];
					$_SESSION['id_institusi'] = $row['id_institusi'];
					$_SESSION['id_mou'] = $row['id_mou'];
					$_SESSION['status_user'] = $row['status_user'];
					$_SESSION['level_user'] = $row['level_user'];
					// $_SESSION['id_mou'] = $row['id_mou'];
					$id_user = $row['id_user'];
					$x_name_pass++;
				}
				// print_r($_SESSION);die;

				if (!$exc_name_pass) {
			?>
					<script>
						alert('QUERY GAGAL');
					</script>
					<?php
				} elseif ($x_name == 0 || $x_pass == 0 || $x_name_pass == 0) {
					if ($x_name == 0) {
					?>
						<script>
							alert('Username tidak ada');
						</script>
					<?php
					} elseif ($x_pass == 0) {
					?>
						<script>
							alert('Password salah');
						</script>
					<?php
					} elseif ($x_name_pass == 0) {
					?>
						<script>
							alert('STATUS USER TIDAK AKTIF KONTAK ADMIN');
						</script>
					<?php
					} else {
					?>
						<script>
							alert('ERROR!');
						</script>
			<?php
					}
				} else {
					$sql_update_login = "UPDATE tb_user
					SET terakhir_login_user = '" . date('Y-m-d') . "'
					WHERE id_user ='" . $_SESSION['id_user'] . "'";

					// echo $sql_update_login . "<br>";

					$conn->query($sql_update_login);

					echo "
					<script>			
						document.location.href='?';
					</script>
					";

					// header("Refresh:0"); 
					// Warning: Cannot modify header information - headers already sent by (output started at C:\xampp7\htdocs\SM\_log-sign\index.php:4) in C:\xampp7\htdocs\SM\_log-sign\index.php on line 108
				}
			}
			?>
		</div>

		<div class="container">
			<div class="row justify-content-center">
				<a href="./_file/panduan_aplikasi_sm.pdf" class="btn btn-danger" target="_blank">PANDUAN APLIKASI</a>
			</div>
		</div>
	</body>
	<script>
		var span = document.getElementById("jam");
		time();

		function time() {
			var d = new Date();
			var s = formattedNumber = ("0" + d.getSeconds()).slice(-2);
			var m = formattedNumber = ("0" + d.getMinutes()).slice(-2);
			var h = formattedNumber = ("0" + d.getHours()).slice(-2);
			span.textContent = h + ":" + m + ":" + s;
		}
		setInterval(time, 1000);
	</script>
<?php
} else {
?>
	<script>
		alert('Anda sebelumnya SUDAH LOGIN dengan nama <?php echo $_SESSION['username_user ']; ?>');
		alert('Anda akan diarahkan langsung ke halaman');
	</script>
<?php
	header("Refresh:0");
}
?>