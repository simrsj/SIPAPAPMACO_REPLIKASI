<?php
if ($_SESSION['status_user'] == "Y") {

	//data user 
	try {
		$sql_user = "SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user'];
		$q_user = $conn->query($sql_user);
	} catch (Exception $ex) {
		echo "<script>alert('$ex -DATA PRIVILEGES-');";
		echo "document.location.href='?error404';</script>";
	}
	$d_user = $q_user->fetch(PDO::FETCH_ASSOC);

	//data praktikan dan user 
	try {
		$sql_praktikan = "SELECT * FROM tb_praktikan ";
		$sql_praktikan .= " JOIN tb_user ON tb_praktikan.id_user = tb_user.id_user";
		$sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
		$sql_praktikan .= " WHERE tb_user.id_user = " . $_SESSION['id_user'];
		$q_praktikan = $conn->query($sql_praktikan);
	} catch (Exception $ex) {
		echo "<script>alert('-DATA PRAKTIKAN-');document.location.href='?error404';</script>";
	}
	$d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
?>

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<a class="text-decoration-none " href="?">
						<img src="./_img/rsj.svg" width="28" />
						<span class="text-primary b m-2 ">SIPAPAP MACO</span>
					</a>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown no-arrow mx-1">
							<!-- <a class="nav-link dropdown-toggle" href="#" id="notifikasi" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bell fa-fw"></i>
								<span class="badge badge-danger badge-counter">3+</span>
							</a> -->
							<!-- Dropdown - Alerts -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right dropdown-menu-xl shadow animated--grow-in" aria-labelledby="notifikasi">
								<h6 class="dropdown-header">
									Notifikasi </h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-file-alt text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 12, 2019</div>
										<span class="font-weight-bold">A new monthly report is ready to download!</span>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-success">
											<i class="fas fa-donate text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 7, 2019</div>
										$290.29 has been deposited into your account!
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 2, 2019</div>
										Spending Alert: We've noticed unusually high spending for your account.
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-800 font-weight-bold" href="#">Lihat Semua Notifikasi</a>
							</div>
						</li>
						<div class="topbar-divider d-none d-sm-block"></div>
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $d_praktikan['nama_praktikan']; ?></span>
								<i class="far fa-user"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<!-- <a class="dropdown-item" href="?aku">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Pengaturan
								</a> -->
								<!-- <div class="dropdown-divider"></div> -->
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#log-out">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>
				<!-- Logout Modal-->
				<div class="modal fade" id="log-out" tabindex="-1" role="dialog" aria-labelledby="log-out" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
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
				<?php if ($d_praktikan['tatatertib_praktikan'] == 'T') { ?>

					<!-- Modal-->
					<div class="modal fade" id="tatatertib" data-backdrop="static">
						<div class="modal-dialog modal-xl  modal-dialog-scrollable" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tata Tertib Praktikan</h5>
								</div>
								<div class="modal-body">
									<?php
									if ($d_praktikan['id_jurusan_pdd'] == 1) {
										include "_praktikan/logbookked.php";
									} else if ($d_praktikan['id_jurusan_pdd'] == 2) {
										include_once "_praktikan/logbookkep.php";
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<script>
						$(document).ready(function() {
							$('#tatatertib').modal('show');
						});
					</script>
				<?php } else if ($d_praktikan['tatatertib_praktikan'] == 'Y') { ?>

				<?php
				}
				//akun dan hak akses 
				if (isset($_GET['aku']) && $d_prvl['r_akun'] == 'Y') {
					if (isset($_GET['ha']) && $_SESSION['level_user'] == 1)
						include "_admin/view/v_akun_hak_akses.php";
					else
						include "_admin/view/v_akun.php";
				}
				?>
			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>RS Jiwa Provinsi Jawa Barat <?= date('Y'); ?></span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
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