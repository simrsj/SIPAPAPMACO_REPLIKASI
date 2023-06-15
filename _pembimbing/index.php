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
		$sql_pembimbing = "SELECT * FROM tb_pembimbing ";
		$sql_pembimbing .= " JOIN tb_user ON tb_pembimbing.id_user = tb_user.id_user";
		$sql_pembimbing .= " WHERE tb_user.id_user = " . $_SESSION['id_user'];
		// echo $sql_pembimbing;
		$q_pembimbing = $conn->query($sql_pembimbing);
		$d_pembimbing = $q_pembimbing->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo "<script>alert('-DATA PEMBIMBING-');";
		echo "document.location.href='?error404';</script>";
	}
?>

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white fixed-top topbar  bg-sipapapmaco-abstrack1 static-top shadow-lg">
					<a class="text-decoration-none d-flex " href="?">
						<img src="./_img/rsj.svg" width="28" class="" />
						<span class="text-primary b m-2 text-light ">
							SIPAPAP MACO
							<span class="d-none d-md-block">(Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)</span>
						</span>
					</a>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto ">
						<!-- Nav Item - Menu 3 Bar -->
						<li class="nav-item dropdown no-arrow  my-auto align-middle">
							<a class="nav-item dropdown-toggle d-flex btn btn-light btn-sm" href="#" id="menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="d-none d-md-block text-primary">Menu</div>
								<div class="fa fa-bars d-md-none my-auto text-primary"></div>
							</a>
							<!-- Dropdown - User Information -->
							<div class=" dropdown-menu dropdown-menu-scroll dropdown-menu-right shadow animated--grow-in" aria-labelledby="menu">

								<?php if ($d_pembimbing['id_jurusan_pdd'] == 1) { ?>
									<?php if ($d_pembimbing['id_profesi_pdd'] == 1) { ?>
									<?php } else if ($d_pembimbing['id_profesi_pdd'] == 2) { ?>
										<!-- Kedokteran Co-Ass  -->
										<a class="dropdown-item b " href="?ked_coass_nilai">
											Penilaian
										</a>
										<div class="text-center mb-2">
											<span class="badge badge-dark text-md col">e-Log Book</span>
										</div>
										<a class="dropdown-item " href="?elogbook=p3d">
											Pencapaian Kompetensi Keterampilan P3D
										</a>
										<a class="dropdown-item " href="?elogbook=p3d">
											Pencapaian Kompetensi Keterampilan P3D
										</a>
									<?php } ?>
								<?php } else if ($d_pembimbing['id_jurusan_pdd'] == 2) { ?>
									<a class="dropdown-item" href="?kep_nilai">
										<i class="fa-regular fa-pen-to-square"></i>
										Penilaian Praktikan
									</a>
									<div class="dropdown-divider"></div>
								<?php } ?>
							</div>
						</li>
						<div class="topbar-divider"></div>
						<!-- Nav Item - User -->
						<li class="nav-item dropdown no-arrow ">
							<a class="d-none d-md-block ">
								<div class="badge badge-primary text-md"><?= tanggal_hari(date('w')) . " " . date("d M Y"); ?>, <span id="jam"></span></div>
							</a>
							<a class="nav-link h-0 dropdown-toggle accordion pl-0 pr-0" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="d-none d-md-block badge badge-light text-primary b shadow-lg">
									<?= $d_pembimbing['nama_pembimbing']; ?>&nbsp;
									<i class="far fa-user"></i>
								</span>
								<span class="d-md-none my-auto text-primary badge badge-light b shadow-lg">
									<i class="far fa-user"></i>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="?setting">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Pengaturan
								</a>
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
				<div class="wrapper mt-4 mb-4">
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