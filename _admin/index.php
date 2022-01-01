<?php
if ($_SESSION['status_user'] == "Y" && $_SESSION['level_user'] == 1) {
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

				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Kediklatan
				</div>
				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link" href="?prk">
						<i class="fas fa-fw fa-users"></i>
						<span>Pendaftaran</span>
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
					<a class="nav-link" href="?jpk">
						<i class="far fa-fw fa-calendar"></i>
						<span>Jadwal Praktikan</span>
					</a>
				</li>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Data
				</div>

				<li class="nav-item">
					<a class="nav-link" href="?test">
						<i class="fas fa-fw fa-table"></i>
						<span>TEST</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<i class="fas fa-fw fa-cog"></i>
						<span>Data Pendukung</span>
					</a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Daftar Data Pendukung :</h6>
							<a class="collapse-item" href="?hrg">
								<i class="fas fa-fw fa-table"></i>
								<span>Harga</span>
							</a>
							<a class="collapse-item" href="?ins">
								<i class="fas fa-fw fa-table"></i>
								<span>Institusi</span>
							</a>
							<a class="collapse-item" href="?mtr">
								<i class="fas fa-fw fa-table"></i>
								<span>Mentor/Pembimbing</span>
							</a>
							<a class="collapse-item" href="?mes">
								<i class="fas fa-fw fa-table"></i>
								<span>Mess</span>
							</a>
							<a class="collapse-item" href="?mou">
								<i class="fas fa-fw fa-table"></i>
								<span>MoU</span>
							</a>
							<a class="collapse-item" href="?uni">
								<i class="fas fa-fw fa-table"></i>
								<span>Unit</span>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Basis Data</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Daftar Basis Data :</h6>
							<a class="collapse-item" href="?akr">
								<i class="fas fa-fw fa-table"></i>
								<span>Akreditasi</span>
							</a>
							<a class="collapse-item" href="?jjg">
								<i class="fas fa-fw fa-table"></i>
								<span>Jenjang Pendidikan</span>
							</a>
							<a class="collapse-item" href="?jrs">
								<i class="fas fa-fw fa-table"></i>
								<span>Jurusan Pendidikan</span>
							</a>
							<a class="collapse-item" href="?spf">
								<i class="fas fa-fw fa-table"></i>
								<span>Spesifikasi Pendidikan</span>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?acu">
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
					<a class="btn btn-success btn-sm" href="?LAPOR">Lapor !</a>
				</div>
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">
					<?php
					include "_admin/_nav.php";
					if (isset($_GET['acu'])) {
						include "_admin/view/v_akun.php";
					} elseif (isset($_GET['akr'])) {
						include "_admin/view/v_akreditasi.php";
					} elseif (isset($_GET['ptk'])) {
						include "_admin/view/v_praktikan.php";
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
					} elseif (isset($_GET['jpk'])) {
						include "_admin/view/v_praktikan_jadwal.php";
					} elseif (isset($_GET['jjg'])) {
						include "_admin/view/v_jenjang.php";
					} elseif (isset($_GET['mes'])) {
						include "_admin/view/v_mess.php";
					} elseif (isset($_GET['mtr'])) {
						include "_admin/view/v_mentor.php";
					} elseif (isset($_GET['prk'])) {
						if (isset($_GET['a'])) {
							include "_admin/view/v_praktik_arsip.php";
						} elseif (isset($_GET['ib'])) {
							include "_admin/insert/i_praktik_bayar.php";
						} elseif (isset($_GET['dh'])) {
							include "_admin/hide/dh_praktik.php";
						} elseif (isset($_GET['ih'])) {
							include "_admin/insert/i_praktik_harga.php";
						} elseif (isset($_GET['i'])) {
							include "_admin/insert/i_praktik.php";
						} elseif (isset($_GET['m'])) {
							include "_admin/insert/i_praktik_mess.php";
						} elseif (isset($_GET['p_i'])) {
							include "_print/p_praktik_invoice.php";
						} elseif (isset($_GET['u'])) {
							include "_admin/update/u_praktik.php";
						} elseif (isset($_GET['ub'])) {
							include "_admin/update/u_praktik_bayar.php";
						} elseif (isset($_GET['uh'])) {
							include "_admin/update/u_praktik_harga.php";
						} elseif (isset($_GET['um'])) {
							include "_admin/update/u_praktik_mess.php";
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
					} elseif (isset($_GET['trs'])) {
						if (isset($_GET['dtl'])) {
							include "_admin/view/v_transaksi_detail.php";
						} else {
							include "_admin/view/v_transaksi.php";
						}
					} else {
						include "_admin/dashboard.php";
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