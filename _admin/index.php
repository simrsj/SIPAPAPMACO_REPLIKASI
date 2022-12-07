<?php
if ($_SESSION['status_user'] == "Y" && $_SESSION['level_user'] == 1) {

	//data user 
	$sql_user = "SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user'];
	try {
		$q_user = $conn->query($sql_user);
	} catch (Exception $ex) {
		echo "<script>alert('$ex -DATA PRIVILEGES-');";
		echo "document.location.href='?error404';</script>";
	}
	$d_user = $q_user->fetch(PDO::FETCH_ASSOC);

	//data privileges 
	$sql_prvl = "SELECT * FROM tb_user_privileges WHERE id_user = " . $_SESSION['id_user'];
	try {
		$q_prvl = $conn->query($sql_prvl);
	} catch (Exception $ex) {
		echo "<script>alert('$ex -DATA PRIVILEGES-');";
		echo "document.location.href='?error404';</script>";
	}
	$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);
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
			<li class="nav-item ">
				<a class="nav-link" href="?mou">
					<i class="fas fa-fw fa-handshake"></i>
					<span>MoU-Kerjasama</span></a>
			</li>

			<hr class="sidebar-divider">
			<div class="sidebar-heading">
				Kediklatan
			</div>

			<!-- Informasi -->
			<li class="nav-item ">
				<a class="nav-link" href="?info_diklat">
					<i class="fas fa-fw fa-info-circle"></i>
					<span>Informasi</span>
				</a>
			</li>

			<?php if ($d_prvl['r_kuota'] == "Y") { ?>
				<!-- Kuota -->
				<li class="nav-item ">
					<a class="nav-link" href="?kta">
						<i class="far fa-fw fa-circle"></i>
						<span>Kuota</span>
					</a>
				</li>
			<?php } ?>
			<?php if ($d_prvl['r_praktik'] == "Y") { ?>
				<!-- Praktik -->
				<li class="nav-item" style=" word-wrap: break-word;">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse_prk" aria-expanded="true" aria-controls="collapse_prk">
						<i class="fa-solid fa-fw fa-user-graduate"></i>
						<span>Praktik</span>
					</a>
					<div id="collapse_prk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<?php if ($d_prvl['r_praktik'] == "Y") { ?>
								<a class="collapse-item" href="?ptk">
									<i class="fas fa-envelope"></i>
									<span>Daftar Pengajuan</span>
								</a>
							<?php } ?>
							<?php if ($d_prvl['r_praktikan'] == "Y") { ?>
								<!-- Praktikan -->
								<a class="collapse-item" href="?ptkn">
									<i class="far fa-fw fa-address-book"></i>
									<span>Data Praktikan</span>
								</a>
							<?php } ?>
							<?php if ($d_prvl['r_praktik_pembimbing'] == "Y") { ?>
								<a class="collapse-item" href="?pmbb">
									<i class="fas fa-fw fa-users"></i>
									<span>Pembimbing-Ruangan</span>
								</a>
							<?php } ?>
							<?php if ($d_prvl['r_praktik_tarif'] == "Y") { ?>
								<a class="collapse-item" href="?ptrf">
									<i class="fas fa-fw fa-receipt"></i>
									<span>Tarif Praktik</span>
								</a>
							<?php } ?>
							<?php if ($d_prvl['r_praktik_bayar'] == "Y") { ?>
								<a class="collapse-item" href="?pbyr">
									<i class="fas fa-fw fa-wallet"></i>
									<span>Data Pembayaran</span>
								</a>
							<?php } ?>
						</div>
					</div>
				</li>
			<?php } ?>
			<?php if ($d_prvl['r_narsum'] == "Y") { ?>
				<!-- Narasumber -->
				<li class="nav-item" style=" word-wrap: break-word;">
					<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse_narsum" aria-expanded="true" aria-controls="collapse_narsum">
						<i class="fas fa-fw fa-person-chalkboard"></i>
						<span>Narasumber</span>
					</a>
					<div id="collapse_narsum" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<?php if ($d_prvl['r_narsum'] == "Y") { ?>
								<a class="collapse-item" href="?narsum">
									<i class="fas fa-envelope"></i>
									<span>Pengajuan</span>
								</a>
							<?php } ?>
						</div>
					</div>
				</li>
			<?php } ?>
			<li class="nav-item ">
				<a class="nav-link" href="?nil">
					<i class="fas fa-fw fa-clipboard-list"></i>
					<span>Data Nilai</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="?ars">
					<i class="fas fa-fw fa-archive"></i>
					<span>Arsip Praktik</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<li class="nav-item ">
				<a class="nav-link" href="http://192.168.7.89/kuesioner/login.php" target="_blank">
					<i class="fas fa-fw fa-list-ul"></i>
					<span>Survey</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">
				Data
			</div>

			<?php if ($_SESSION['level_user'] == 1) { ?>
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
							<a class="collapse-item" href="?d_pmbb">
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
								<i class="fas fa-school"></i>
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
							<a class="collapse-item" href="?pfs">
								<i class="fas fa-fw fa-table"></i>
								<span>Profesi Pendidikan</span>
							</a>
						</div>
					</div>
				</li>
			<?php } ?>

			<!-- Pengaturan Akun -->
			<?php if ($d_prvl['r_akun'] == "Y") { ?>
				<li class="nav-item">
					<a class="nav-link" href="?aku">
						<i class="fas fa-fw fa-user-cog"></i>
						<span>Pengaturan Akun</span>
					</a>
				</li>
			<?php } ?>

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

				//akun dan hak akses 
				if (isset($_GET['aku']) && $d_prvl['r_akun'] == 'Y') {
					if (isset($_GET['ha'])) include "_admin/view/v_akun_hak_akses.php";
					else include "_admin/view/v_akun.php";
				} elseif (isset($_GET['ars'])) {
					if (isset($_GET['dp'])) {
						include "_admin/view/v_praktik_arsip_dataPraktik.php";
					} else {
						include "_admin/view/v_praktik_arsip.php";
					}
				} elseif (isset($_GET['akr'])) {
					include "_admin/view/v_akreditasi.php";
				} elseif (isset($_GET['info_diklat'])) {
					include "_admin/view/v_info_diklat.php";
				} elseif (isset($_GET['ins'])) {
					if (isset($_GET['i'])) {
						include "_admin/insert/i_institusi.php";
					} elseif (isset($_GET['u'])) {
						include "_admin/update/u_institusi.php";
					} elseif (isset($_GET['d'])) {
						include "_admin/delete/d_institusi.php";
					} elseif (isset($_GET['val'])) {
						include "_admin/view/v_institusi_val.php";
					} else {
						include "_admin/view/v_institusi.php";
					}
				} elseif (isset($_GET['jrs'])) {
					include "_admin/view/v_jurusan.php";
				} elseif (isset($_GET['jjg'])) {
					include "_admin/view/v_jenjang.php";
				} elseif (isset($_GET['kta']) && $d_prvl['r_kuota'] == 'Y') {
					include "_admin/view/v_kuota.php";
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
					} elseif (isset($_GET['a'])) {
						include "_admin/view/v_mou_arsip.php";
					} else {
						include "_admin/view/v_mou.php";
					}
				}
				//daftar data pemibimbing
				elseif (isset($_GET['d_pmbb']) && $d_prvl['r_daftar_pembimbing'] == 'Y') include "_admin/view/v_daftarPembimbing.php";
				elseif (isset($_GET['nil'])) {
					if (isset($_GET['i']) && isset($_GET['p'])) {
						include "_admin/insert/i_nilaiKep.php";
					} elseif (isset($_GET['i']) && isset($_GET['pu'])) {
						include "_admin/insert/i_nilai_upload.php";
					} elseif (isset($_GET['u']) && isset($_GET['p'])) {
						include "_admin/update/u_nilaiKep.php";
					} else {
						include "_admin/view/v_nilai.php";
					}
				}
				//praktik pemibimbing
				else if (isset($_GET['pmbb']) && $d_prvl['r_praktik_pembimbing'] == 'Y') {
					if (isset($_GET['i'])) include "_admin/insert/i_praktik_pembimbing.php";
					else include "_admin/view/v_praktik_pembimbing.php";
				}
				//praktik
				else if (isset($_GET['ptk']) && $d_prvl['r_praktik'] == 'Y') {
					if (isset($_GET['i']) && $d_prvl['c_praktik'] == 'Y') include "_admin/insert/i_praktik.php";
					elseif (isset($_GET['m_i']) && $d_prvl['c_praktik_mess'] == 'Y') include "_admin/insert/i_praktik_mess.php";
					elseif (isset($_GET['m_u']) && $d_prvl['u_praktik_mess'] == 'Y') include "_admin/update/u_praktik_mess.php";
					else include "_admin/view/v_praktik.php";
				}
				//praktikan
				else if (isset($_GET['ptkn']) && $d_prvl['r_praktikan'] == 'Y') {
					if (isset($_GET['i']) && $d_prvl['c_praktikan'] == 'Y') include "_admin/insert/i_praktikan.php";
					else if (isset($_GET['u']) && $d_prvl['u_praktikan'] == 'Y') include "_admin/view/u_praktikan.php";
					else include "_admin/view/v_praktikan.php";
				}
				//praktik tarif
				elseif (isset($_GET['ptrf'])) {
					if (isset($_GET['i']) && $d_prvl['c_praktik_tarif'] == 'Y') include "_admin/insert/i_praktik_tarif.php";
					else include "_admin/view/v_praktik_tarif.php";
				}
				//praktik bayar
				elseif (isset($_GET['pbyr'])) {
					if ($d_prvl['r_praktik_bayar'] == 'Y') include "_admin/view/v_praktik_bayar.php";
				} elseif (isset($_GET['pfs'])) {
					include "_admin/view/v_profesi.php";
				} elseif (isset($_GET['uni'])) {
					include "_admin/view/v_unit.php";
				} elseif (isset($_GET['tmp'])) {
					include "_admin/view/v_tempat.php";
				} elseif (isset($_GET['trf'])) {
					include "_admin/view/v_tarif.php";
				} elseif (isset($_GET['trs'])) {
					if (isset($_GET['dtl'])) {
						include "_admin/view/v_transaksi_detail.php";
					} else {
						include "_admin/view/v_transaksi.php";
					}
				} elseif (isset($_GET['test'])) {
					include "test.php";
				} elseif (isset($_GET['error401'])) {
					include "_error/error401.php";
				} elseif (isset($_GET['error404'])) {
					include "_error/error404.php";
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
						<span>RS Jiwa Provinsi Jawa Barat <?php echo date('Y'); ?></span>
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
	</script>
<?php
	header("Refresh:0; url=?ls");
}
?>