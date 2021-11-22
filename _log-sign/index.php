<?php
if (empty($_SESSION['username_user'])) {
?>

	<body class="bg-gradient-primary">
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-5">
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
				$password_user = $_POST['password_user'];
				$sql_name = "SELECT * from `tb_user` where `username_user`='$username_user'";
				$sql_pass = "SELECT * from `tb_user` where `password_user`='$password_user'";
				$sql_name_pass = "SELECT * from `tb_user` where `username_user`='$username_user' 
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
					$_SESSION['status_user'] = $row['status_user'];
					$_SESSION['level_user'] = $row['level_user'];
					// $_SESSION['id_mou'] = $row['id_mou'];
					$id_user = $row['id_user'];
					$x_name_pass++;
					// print_r($_SESSION);die;
				}

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
					header("Refresh:0");
				}
			}
			?>
		</div>
	</body>
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