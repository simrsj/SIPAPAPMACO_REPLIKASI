<?php
if ($_SESSION['status_user'] == "Y" && $_SESSION['level_user'] == 2) {
?>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="?">
				<img src="./_img/rsj.svg" width="28" />
				<div class="sidebar-brand-text mx-3">SIPAPAP MACO</div>
			</a>
			<!-- Nav Item - Dashboard -->
			<!-- <li class="nav-item ">
					<a class="nav-link" href="?test">
						<i class="fas fa-fw fa-bug"></i>
						<span>Testing</span></a>
				</li> -->
			<li class="nav-item ">
				<a class="nav-link" href="?">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<!-- <li class="nav-item ">
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
			<li class="nav-item ">
				<a class="nav-link" href="?info_diklat">
					<i class="fas fa-fw fa-info-circle"></i>
					<span>Informasi</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse_prk" aria-expanded="true" aria-controls="collapseTwo">
					<i class="far fa-fw fa-list-alt"></i>
					<span>Pengajuan</span>
				</a>
				<div id="collapse_prk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="?ptk=ked">
							<i class="far fa-circle"></i>
							<span>Kedokteran</span>
						</a>
						<a class="collapse-item" href="?ptk=kep">
							<i class="far fa-circle"></i>
							<span>Keperawatan</span>
						</a>
						<a class="collapse-item" href="?ptk=nkl">
							<i class="far fa-circle"></i>
							<span>Nakes Lainnya</span>
						</a>
						<a class="collapse-item" href="?ptk=nnk">
							<i class="far fa-circle"></i>
							<span>Non Nakes</span>
						</a>
					</div>
				</div>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?praktikan">
					<i class="far fa-fw fa-address-book"></i>
					<span>Data Praktikan</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?pmbb">
					<i class="fas fa-fw fa-users"></i>
					<span>Pembimbing-Ruangan</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?pnilai">
					<i class="fas fa-fw fa-clipboard-list"></i>
					<span>Data Nilai</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?trs">
					<i class="fas fa-fw fa-wallet"></i>
					<span>Data Pembayaran</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?ars">
					<i class="fas fa-fw fa-archive"></i>
					<span>Arsip Praktik</span>
				</a>
			</li>
			<!-- <hr class="sidebar-divider">
				<li class="nav-item ">
					<a class="nav-link" href="http://192.168.7.89/kuesioner/login.php" target="_blank">
						<i class="fas fa-fw fa-list-ul"></i>
						<span>Survey</span>
					</a>
				</li> -->
			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="?ins">
					<i class="fas fa-fw fa-user-cog"></i>
					<span>Data Institusi</span>
				</a>
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
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama_user']; ?></span>
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
				include "./_add-ons/dashboard_data_ip.php";

				if (isset($_GET['aku'])) {
					include "_ip/view/v_akun.php";
				} elseif (isset($_GET['ars'])) {
					include "_ip/view/v_praktik_arsip.php";
				} elseif (isset($_GET['akr'])) {
					include "_ip/view/v_akreditasi.php";
				} elseif (isset($_GET['info_diklat'])) {
					include "_admin/view/v_info_diklat.php";
				} elseif (isset($_GET['ins'])) {
					if (isset($_GET['u'])) {
						include "_ip/update/u_institusi.php";
					} elseif (isset($_GET['d'])) {
						include "_ip/delete/d_institusi.php";
					} else {
						include "_ip/view/v_institusi.php";
					}
				} elseif (isset($_GET['jrs'])) {
					include "_ip/view/v_jurusan.php";
				} elseif (isset($_GET['jjg'])) {
					include "_ip/view/v_jenjang.php";
				} elseif (isset($_GET['lapor'])) {
					if (isset($_GET['dtl'])) {
						include "_ip/view/v_lapor_detail.php";
					} else {
						include "_ip/view/v_lapor.php";
					}
				} elseif (isset($_GET['mes'])) {
					include "_ip/view/v_mess.php";
				} elseif (isset($_GET['mou'])) {
					if (isset($_GET['i'])) {
						include "_ip/insert/i_mou.php";
					} elseif (isset($_GET['u'])) {
						include "_ip/update/u_mou.php";
					} elseif (isset($_GET['d'])) {
						include "_ip/delete/d_mou.php";
					} else {
						include "_ip/view/v_mou.php";
					}
				} elseif (isset($_GET['mtr'])) {
					include "_ip/view/v_mentor.php";
				} elseif (isset($_GET['nil'])) {
					if (isset($_GET['i']) && isset($_GET['p'])) {
						include "_ip/insert/i_nilaiKep.php";
					} elseif (isset($_GET['i']) && isset($_GET['pu'])) {
						include "_ip/insert/i_nilai_upload.php";
					} elseif (isset($_GET['u']) && isset($_GET['p'])) {
						include "_ip/update/u_nilaiKep.php";
					} else {
						include "_ip/view/v_nilai.php";
					}
				} elseif (isset($_GET['praktikan'])) {
					include "_ip/view/v_praktik_praktikan.php";
				} elseif (isset($_GET['pmbb'])) {
					include "_ip/view/v_pembimbing.php";
				} elseif (isset($_GET['ptk'])) {
					if (isset($_GET['a'])) {
						include "_ip/view/v_praktik_arsip.php";
					} elseif (isset($_GET['ib'])) {
						include "_ip/insert/i_praktik_bayar.php";
					} elseif (isset($_GET['dh'])) {
						include "_ip/hide/dh_praktik.php";
					} elseif (isset($_GET['i'])) {
						if ($_GET['ptk'] == 'ked') {
							include "_admin/insert/i_praktikKed.php";
						} elseif ($_GET['ptk'] == 'kep') {
							include "_admin/insert/i_praktikKep.php";
						} elseif ($_GET['ptk'] == 'nkl') {
							include "_admin/insert/i_praktikNkl.php";
						} elseif ($_GET['ptk'] == 'nnk') {
							include "_admin/insert/i_praktikNnk.php";
						} else {
							include "_error/index.php";
						}
					} elseif (isset($_GET['it_ked'])) {
						include "_ip/insert/i_tarifKed.php";
					} elseif (isset($_GET['m'])) {
						include "_ip/insert/i_praktik_mess.php";
					} elseif (isset($_GET['p_i'])) {
						include "_print/p_praktik_invoicePDF.php";
					} elseif (isset($_GET['u'])) {
						include "_ip/update/u_praktik.php";
					} elseif (isset($_GET['ub'])) {
						include "_ip/update/u_praktik_bayar.php";
					} elseif (isset($_GET['uh'])) {
						include "_ip/update/u_praktik_tarif.php";
					} elseif (isset($_GET['um'])) {
						include "_ip/update/u_praktik_mess.php";
					} elseif (isset($_GET['t'])) {
						include "_ip/insert/i_praktik_tempat.php";
					} else {
						include "_ip/view/v_praktik.php";
					}
				} elseif (isset($_GET['ptkn'])) {
					include "_ip/view/v_praktik_praktikan.php";
				} elseif (isset($_GET['pfs'])) {
					include "_ip/view/v_profesi.php";
				} elseif (isset($_GET['uni'])) {
					include "_ip/view/v_unit.php";
				} elseif (isset($_GET['tmp'])) {
					include "_ip/view/v_tempat.php";
				} elseif (isset($_GET['test'])) {
					include "test.php";
				} elseif (isset($_GET['test1'])) {
					include "test1.php";
				} elseif (isset($_GET['trf'])) {
					include "_ip/view/v_tarif.php";
				} elseif (isset($_GET['trs'])) {
					if (isset($_GET['dtl'])) {
						include "_ip/view/v_transaksi_detail.php";
					} else {
						include "_ip/view/v_transaksi.php";
					}
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
	<a class="scroll-to-top rounded" href="body">
		<i class="fas fa-angle-up"></i>
	</a>
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