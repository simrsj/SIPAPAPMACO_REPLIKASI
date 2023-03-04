<?php
if ($_SESSION['status_user'] == "Y") {

	//data user 
	try {
		$sql_user = "SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user'];
		// echo $sql_user;
		$q_user = $conn->query($sql_user);
		$d_user = $q_user->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo "<script>alert('$ex -DATA PRIVILEGES-');";
		echo "document.location.href='?error404';</script>";
	}

	//data praktikan dan user 
	try {
		$sql_praktikan = "SELECT * FROM tb_pembimbing ";
		$sql_praktikan .= " JOIN tb_user ON tb_pembimbing.id_user = tb_user.id_user";
		$sql_praktikan .= " WHERE tb_user.id_user = " . $_SESSION['id_user'];
		// echo $sql_praktikan;
		$q_praktikan = $conn->query($sql_praktikan);
		$d_pembimbing = $q_praktikan->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo "<script>alert('-DATA PEMBIMBING-');document.location.href='?error404';</script>";
	}
?>

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white fixed-top topbar  static-top shadow">
					<a class="text-decoration-none " href="?">
						<img src="./_img/rsj.svg" width="28" />
						<span class="text-primary b m-2 ">SIPAPAP MACO</span>
					</a>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto ">
						<!-- Nav Item - Menu 3 Bar -->
						<li class="nav-item dropdown no-arrow  my-auto align-middle">
							<a class="nav-item dropdown-toggle d-flex btn btn-outline-primary btn-sm" href="#" id="menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="d-none d-md-block">Menu &nbsp;</div>
								<div class="fa fa-bars my-auto"></div>
							</a>
							<!-- Dropdown - User Information -->
							<div class=" dropdown-menu scrollable-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="menu">

								<?php if ($d_pembimbing['id_jurusan_pdd'] == 1) { ?>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#tatatertib">
										Penilaian Laporan Pendahuluan (LP)
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#matrix-kegiatan">
										Matrix Kegiatan
									</a>
								<?php } else if ($d_pembimbing['id_jurusan_pdd'] == 2) { ?>
									<a class="dropdown-item" href="?kep_penilaian">
										<i class="fa-regular fa-pen-to-square"></i>
										Penilaian Praktikan
									</a>
									<div class="dropdown-divider"></div>
								<?php } ?>
							</div>
						</li>
						<div class="topbar-divider"></div>
						<!-- Nav Item - User -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-md-block text-gray-600 small"><?= $d_pembimbing['nama_pembimbing']; ?></span>
								<i class="far fa-user"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#log-out">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>

				<!-- Logout Modal-->
				<div class="modal fade" id="log-out">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Yakin Keluar?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
								<a class="btn btn-danger" href="?lo">Ya</a>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="container text-center ">
					<div class="badge badge-primary b">
						<?= tanggal_hari(date('w')) . " " . date("d M Y"); ?>, <span id="jam"></span>
					</div>
				</div>
				<div class="wrapper mb-4">
					<?php
					include "_pembimbing/index_data.php";
					?>
				</div>
				<footer class="footer sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>RS Jiwa Provinsi Jawa Barat <?= date('Y'); ?></span>
						</div>
					</div>
				</footer>
			</div>
		</div>

	</div>
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

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
		alert('Anda belum Login, Silahkan Login Terlebih dahulu');
		document.location.href = "/SM/index.php";
	</script>
<?php
}
?>