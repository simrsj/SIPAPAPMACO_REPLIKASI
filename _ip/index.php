<?php
if ($_SESSION['status_user'] == "Y" && $_SESSION['level_user'] == 2) {
?>

	<body id="page-top">
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
				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="?ds">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
				</li>
				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="?mou">
						<i class="fas fa-fw fa-handshake"></i>
						<span>MoU-Kerjasama</span></a>
				</li>

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

				<li class="nav-item">
					<a class="nav-link" href="?trs">
						<i class="fas fa-fw fa-wallet"></i>
						<span>Data Pembayaran</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?ptk">
						<i class="fas fa-fw fa-user-graduate"></i>
						<span>Nama Praktikan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?ppt">
						<i class="fas fa-fw fa-house-user"></i>
						<span>Pembimbing dan Tempat</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?nil">
						<i class="far fa-fw fa-star"></i>
						<span>Data Nilai</span>
					</a>
				</li>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->

				<li class="nav-item">
					<a class="nav-link" href="?aku">
						<i class="fas fa-fw fa-user-cog"></i>
						<span>Pengaturan Akun</span>
					</a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
				<div class="sidebar-card">
					<i class="fas fa-3x fa-exclamation-circle"></i>
					<p class="text-center mb-2">Bila terjadi kesalahan <br><strong>(<i>ERROR</i>)</strong><br> <strong>LAPORKAN</strong> dengan meng-klik tombol dibawah ini</p>
					<a class="btn btn-success btn-sm" href="?lapor">Lapor !</a>
				</div>
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">
					<?php
					include "_ip/_nav.php";
					if (isset($_GET['aku'])) {
						include "_ip/view/v_akun.php";
					} elseif (isset($_GET['lapor'])) {
						include "_ip/view/v_lapor.php";
					} elseif (isset($_GET['mou'])) {
						if (isset($_GET['i'])) {
							include "_ip/insert/i_mou.php";
						} else {
							include "_ip/view/v_mou.php";
						}
					} elseif (isset($_GET['nil'])) {
						include "_ip/view/v_nilai.php";
					} elseif (isset($_GET['ppt'])) {
						include "_ip/view/v_praktikan_pemb_temp.php";
					} elseif (isset($_GET['prk'])) {
						if (isset($_GET['a'])) {
							include "_ip/view/v_praktik_arsip.php";
						} elseif (isset($_GET['i'])) {
							include "_ip/insert/i_praktik.php";
						} elseif (isset($_GET['ib'])) {
							include "_ip/insert/i_praktik_bayar.php";
						} elseif (isset($_GET['ih'])) {
							include "_ip/insert/i_praktik_harga.php";
						} elseif (isset($_GET['m'])) {
							include "_ip/insert/i_praktik_mess.php";
						} else {
							include "_ip/view/v_praktik.php";
						}
					} elseif (isset($_GET['ptk'])) {
						include "_ip/view/v_praktikan.php";
					} elseif (isset($_GET['trs'])) {
						if (isset($_GET['dtl'])) {
							include "_ip/view/v_transaksi_detail.php";
						} else {
							include "_ip/view/v_transaksi.php";
						}
					} elseif (isset($_GET['test'])) {
						include "test.php";
					} elseif (isset($_GET['test1'])) {
						include "test1.php";
					} else {
						include "_ip/dashboard.php";
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