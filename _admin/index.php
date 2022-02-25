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
					<a class="nav-link" href="?test">
						<i class="fas fa-fw fa-bug"></i>
						<span>Testing</span></a>
				</li>
				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="?">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
				</li>
				<!-- Nav Item - Dashboard -->
				<!-- <li class="nav-item active">
					<a class="nav-link" href="?mou">
						<i class="fas fa-fw fa-handshake"></i>
						<span>MoU-Kerjasama</span></a>
				</li> -->

				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Kediklatan
				</div>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse_prk" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-users"></i>
						<span>Pendaftaran</span>
					</a>
					<div id="collapse_prk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="?prk=ked">
								<i class="far fa-circle"></i>
								<span>Kedokteran</span>
							</a>
							<a class="collapse-item" href="?prk=kep">
								<i class="far fa-circle"></i>
								<span>Keperawatan</span>
							</a>
							<a class="collapse-item" href="?prk=nkl">
								<i class="far fa-circle"></i>
								<span>Nakes Lainnya</span>
							</a>
							<a class="collapse-item" href="?prk=nnk">
								<i class="far fa-circle"></i>
								<span>Non Nakes</span>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?trs">
						<i class="fas fa-fw fa-wallet"></i>
						<span>Data Pembayaran</span>
					</a>
				</li>
				<hr class="sidebar-divider">
				<li class="nav-item active">
					<a class="nav-link" href="http://192.168.7.89/kuesioner/login.php" target="_blank">
						<i class="fas fa-fw fa-list-ul"></i>
						<span>Survey</span>
					</a>
				</li>
				<hr class="sidebar-divider">
				<div class="sidebar-heading">
					Data
				</div>

				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseLap" aria-expanded="true" aria-controls="collapseOne">
						<i class="far fa-fw fa-file-alt"></i>
						<span>Laporan</span>
					</a>
					<div id="collapseLap" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Daftar Data Laporan :</h6>
							<a class="collapse-item" href="_print/p_mou.php" target="_blank">
								<i class="fas fa-fw fa-table"></i>
								<span>Laporan MOU</span>
							</a>
							<a class="collapse-item" href="_print/p_pembimbing.php" target="_blank">
								<i class="fas fa-fw fa-table"></i>
								<span>Laporan Pembimbing</span>
							</a>

							<a class="collapse-item" href="_print/p_mess.php" target="_blank">
								<i class="fas fa-fw fa-table"></i>
								<span>Laporan Mess</span>

						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<i class="fas fa-fw fa-table"></i>
						<span>Data Pendukung</span>
					</a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Daftar Data Pendukung :</h6>
							<a class="collapse-item" href="?ins">
								<i class="fas fa-fw fa-university"></i>
								<span>Institusi</span>
							</a>
							<a class="collapse-item" href="?mtr">
								<i class="fas fa-fw fa-portrait"></i>
								<span>Mentor/Pembimbing</span>
							</a>
							<a class="collapse-item" href="?mes">
								<i class="fas fa-fw fa-bed"></i>
								<span>Mess/Pemondokan</span>
							</a>
							<a class="collapse-item" href="?mou">
								<i class="fas fa-fw fa-handshake"></i>
								<span>MoU</span>
							</a>
							<a class="collapse-item" href="?trf">
								<i class="fas fa-fw fa-money-bill-wave"></i>
								<span>Tarif</span>
							</a>
							<a class="collapse-item" href="?tmp">
								<i class="fas fa-house"></i>
								<span>Tempat</span>
							</a>
							<a class="collapse-item" href="?uni">
								<i class="fas fa-fw fa-house-user"></i>
								<span>Unit</span>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-database"></i>
						<span>Basis Data</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Daftar Basis Data :</h6>
							<a class="collapse-item" href="?akr">
								<i class="fas fa-fw fa-award"></i>
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
				<!-- <div class="sidebar-card">
					<i class="fas fa-3x fa-exclamation-circle"></i>
					<p class="text-center mb-2">Bila terjadi kesalahan <br><strong>(<i>ERROR</i>)</strong><br> <strong>LAPORKAN</strong> dengan meng-klik tombol dibawah ini</p>
					<a class="btn btn-success btn-sm" href="?lapor">Lapor !</a>
				</div> -->
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">
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
									<i class="far fa-user"></i>
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="?aku">
										<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
										Pengaturan
									</a>
									<div class="dropdown-divider"></div>
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
					<?php

					include "./_add-ons/dashboard_data_admin.php";

					if (isset($_GET['aku'])) {
						include "_admin/view/v_akun.php";
					} elseif (isset($_GET['akr'])) {
						include "_admin/view/v_akreditasi.php";
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
					} elseif (isset($_GET['lapor'])) {
						if (isset($_GET['dtl'])) {
							include "_admin/view/v_lapor_detail.php";
						} else {
							include "_admin/view/v_lapor.php";
						}
					} elseif (isset($_GET['mes'])) {
						include "_admin/view/v_mess.php";
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
					} elseif (isset($_GET['mtr'])) {
						include "_admin/view/v_mentor.php";
					} elseif (isset($_GET['nil'])) {
						include "_admin/view/v_nilai.php";
					} elseif (isset($_GET['ppt'])) {
						include "_admin/view/v_praktikan_pemb_temp.php";
					} elseif (isset($_GET['prk'])) {
						if (isset($_GET['a'])) {
							include "_admin/view/v_praktik_arsip.php";
						} elseif (isset($_GET['ib'])) {
							include "_admin/insert/i_praktik_bayar.php";
						} elseif (isset($_GET['dh'])) {
							include "_admin/hide/dh_praktik.php";
						} elseif (isset($_GET['i'])) {
							if ($_GET['prk'] == 'ked') {
								include "_admin/insert/i_praktik_kedokteran.php";
							} else {
								include "_admin/insert/i_praktik.php";
							}
						} elseif (isset($_GET['it_ked'])) {
							include "_admin/insert/i_tarif_kedokteran.php";
						} elseif (isset($_GET['m'])) {
							include "_admin/insert/i_praktik_mess.php";
						} elseif (isset($_GET['p_i'])) {
							include "_print/p_praktik_invoice.php";
						} elseif (isset($_GET['u'])) {
							include "_admin/update/u_praktik.php";
						} elseif (isset($_GET['ub'])) {
							include "_admin/update/u_praktik_bayar.php";
						} elseif (isset($_GET['uh'])) {
							include "_admin/update/u_praktik_tarif.php";
						} elseif (isset($_GET['um'])) {
							include "_admin/update/u_praktik_mess.php";
						} elseif (isset($_GET['t'])) {
							include "_admin/insert/i_praktik_tempat.php";
						} else {
							include "_admin/view/v_praktik.php";
						}
					} elseif (isset($_GET['ptk'])) {
						include "_admin/view/v_praktikan.php";
					} elseif (isset($_GET['spf'])) {
						include "_admin/view/v_spesifikasi.php";
					} elseif (isset($_GET['uni'])) {
						include "_admin/view/v_unit.php";
					} elseif (isset($_GET['tmp'])) {
						include "_admin/view/v_tempat.php";
					} elseif (isset($_GET['test'])) {
						include "test.php";
					} elseif (isset($_GET['test1'])) {
						include "test1.php";
					} elseif (isset($_GET['trf'])) {
						include "_admin/view/v_tarif.php";
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