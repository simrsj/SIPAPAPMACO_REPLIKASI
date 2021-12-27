<?php
if ($_SESSION['status_user'] == "Y" && $_SESSION['level_user'] == 1) {
?>

	<body id="page-top">
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_user']; ?></span>
						<img class="img-profile rounded-circle" src="img/undraw_profile.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#">
							<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
							Pengaturan
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="?">
					<div class="sidebar-brand-icon">
						<i class="fas fa-book-reader"></i>
					</div>
					<div class="sidebar-brand-text mx-3">SIPAPAP MACO</div>
				</a>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Kediklatan
				</div>
				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link" href="?prk">
						<i class="fas fa-fw fa-chart-area"></i>
						<span>Praktikan</span>
					</a>
				</li>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Data
				</div>
				<?php
				if ($_SESSION['level_user'] == 1) {
				?>
					<li class="nav-item">
						<a class="nav-link" href="?test">
							<i class="fas fa-fw fa-table"></i>
							<span>TEST</span>
						</a>
						<a class="nav-link" href="?akr">
							<i class="fas fa-fw fa-table"></i>
							<span>Akreditasi</span>
						</a>
						<a class="nav-link" href="?hrg">
							<i class="fas fa-fw fa-table"></i>
							<span>Harga</span>
						</a>
						<a class="nav-link" href="?ins">
							<i class="fas fa-fw fa-table"></i>
							<span>Institusi</span>
						</a>
						<a class="nav-link" href="?jrs">
							<i class="fas fa-fw fa-table"></i>
							<span>Jurusan</span>
						</a>
						<a class="nav-link" href="?jjg">
							<i class="fas fa-fw fa-table"></i>
							<span>Jenjang</span>
						</a>
						<a class="nav-link" href="?mtr">
							<i class="fas fa-fw fa-table"></i>
							<span>Mentor</span>
						</a>
						<a class="nav-link" href="?mes">
							<i class="fas fa-fw fa-table"></i>
							<span>Mess</span>
						</a>
						<a class="nav-link" href="?mou">
							<i class="fas fa-fw fa-table"></i>
							<span>MoU</span>
						</a>
						<a class="nav-link" href="?spf">
							<i class="fas fa-fw fa-table"></i>
							<span>Spesifikasi</span>
						</a>
						<a class="nav-link" href="?uni">
							<i class="fas fa-fw fa-table"></i>
							<span>Unit</span>
						</a>
					</li>
				<?php
				}
				?>
				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">
					<?php
					include "_admin/_nav.php";
					if (isset($_GET['akr'])) {
						include "_admin/view/v_akreditasi.php";
					} elseif (isset($_GET['mou'])) {
						if (isset($_GET['i'])) {
							include "_admin/insert/i_mou.php";
						} elseif (isset($_GET['u'])) {
							include "_admin/update/u_mou.php";
						} elseif (isset($_GET['d'])) {
							include "_admin/delete/d_mou.php";
						} else {
							include "_admin/view/v_mou.php";
						}
					} elseif (isset($_GET['hrg'])) {
						include "_admin/view/v_harga.php";
					} elseif (isset($_GET['ins'])) {
						if (isset($_GET['i'])) {
							include "_admin/insert/i_institusi.php";
						} elseif (isset($_GET['u'])) {
							include "_admin/update/u_institusi.php";
						} elseif (isset($_GET['d'])) {
							include "_admin/delete/d_institusi.php";
						} else {
							include "_admin/view/v_institusi.php";
						}
					} elseif (isset($_GET['jrs'])) {
						include "_admin/view/v_jurusan.php";
					} elseif (isset($_GET['jjg'])) {
						include "_admin/view/v_jenjang.php";
					} elseif (isset($_GET['mes'])) {
						include "_admin/view/v_mess.php";
					} elseif (isset($_GET['mtr'])) {
						include "_admin/view/v_mentor.php";
					} elseif (isset($_GET['prk'])) {
						if (isset($_GET['a'])) {
							include "_admin/view/v_praktik_arsip.php";
						} elseif (isset($_GET['ibt'])) {
							include "_admin/insert/i_praktik_bukti_trasfer.php";
						} elseif (isset($_GET['dh'])) {
							include "_admin/hide/dh_praktik.php";
						} elseif (isset($_GET['ih'])) {
							include "_admin/insert/i_praktik_harga.php";
						} elseif (isset($_GET['i'])) {
							include "_admin/insert/i_praktik.php";
						} elseif (isset($_GET['m'])) {
							include "_admin/insert/i_praktik_mess.php";
						} elseif (isset($_GET['u'])) {
							include "_admin/update/u_praktik.php";
						} else {
							include "_admin/view/v_praktik.php";
						}
					} elseif (isset($_GET['spf'])) {
						include "_admin/view/v_spesifikasi.php";
					} elseif (isset($_GET['uni'])) {
						include "_admin/view/v_unit.php";
					} elseif (isset($_GET['test'])) {
						include "test.php";
					} elseif (isset($_GET['test1'])) {
						include "test1.php";
					} else {
						include "_admin/home.php";
					}
					?>
				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>RS Jiwa Provinsi Jawa Barat 2021</span>
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

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	</body>
<?php
} else {
?>
	<script>
		alert('Anda belum Login, Silahkan Login Terlebih dahulu');
	</script>
<?php
	header("Refresh:0; url=?ls");
}
?>