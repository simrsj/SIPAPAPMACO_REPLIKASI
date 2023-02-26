<?php
if ($_SESSION['status_user'] == "Y") {

	//data user 
	try {
		$sql_user = "SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user'];
		$q_user = $conn->query($sql_user);
		$d_user = $q_user->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo "<script>alert('$ex -DATA PRIVILEGES-');";
		echo "document.location.href='?error404';</script>";
	}

	//data praktikan dan user 
	try {
		$sql_praktikan = "SELECT * FROM tb_praktikan ";
		$sql_praktikan .= " JOIN tb_user ON tb_praktikan.id_user = tb_user.id_user";
		$sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
		$sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
		$sql_praktikan .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
		$sql_praktikan .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd";
		$sql_praktikan .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
		$sql_praktikan .= " WHERE tb_user.id_user = " . $_SESSION['id_user'];
		// echo $sql_praktikan;
		$q_praktikan = $conn->query($sql_praktikan);
		$d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo "<script>alert('-DATA PRAKTIKAN- $sql_praktikan');document.location.href='?error404';</script>";
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
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - Menu 3 Bar -->
						<li class="nav-item dropdown no-arrow d-sm-none rounded my-auto">
							<a class="nav-item dropdown-toggle" href="#" id="menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-sm-inline text-gray-600 small"><?= $d_praktikan['nama_praktikan']; ?></span>
								<i class="fa fa-bars"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="menu">
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
						<li class="nav-item rounded-circle no-arrow my-auto d-none d-sm-block mr-1">
							<a href="?asd" class="btn btn-success btn-sm">
								Matrix Kegiatan
							</a>
						</li>
						<li class="nav-item rounded-circle no-arrow my-auto d-none d-sm-block mr-1">
							<a href="?asd" class="btn btn-success btn-sm">
								Matrix Kegiatan
							</a>
						</li>
						<li class="nav-item rounded-circle no-arrow my-auto d-none d-sm-block mr-1">
							<a href="?asd" class="btn btn-success btn-sm">
								Matrix Kegiatan
							</a>
						</li>
						<div class="topbar-divider"></div>
						<!-- Nav Item - User -->
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
					</ul>
				</nav>
				<br>
				<br>
				<br>
				<div class="wrapper mb-4">
					<?php if ($d_praktikan['pernyataan_praktikan'] == 'T') { ?>

						<!-- Modal-->
						<div class="modal fade" id="tatatertib" data-backdrop="static">
							<div class="modal-dialog modal-xl  modal-dialog-scrollable" role="document">
								<div class="modal-content">
									<div class="modal-body" height="100%">
										<?php
										if ($d_praktikan['id_jurusan_pdd'] == 1) {
											$jurusan = "ked";
										} else if ($d_praktikan['id_jurusan_pdd'] == 2) {
											$jurusan = "kep";
										}
										?>
										<iframe src="./_file/<?= $jurusan ?>_tatatertib.pdf" width="100%" height="100%"></iframe>
										<hr style="background-color: gray; height: 2px; border: 0;">
										<?php
										include $jurusan . "_pernyataan.php"
										?><br>
										<div class="font-italic text-danger text-center text-sm ">dengan mengklik tombol dibawah anda <b>SETUJU</b> dengan mentaati peraturan yang berlaku sesuai yang tercantum</div>
										<form id="form_pernyataan">
											<input type="button" class="btn btn-outline-danger col pernyataan" value="SETUJU" name="pernyataan" id="<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $d_praktikan['id_praktikan']))) ?>">
										</form>
									</div>
								</div>
							</div>
						</div>
						<script>
							$(document).ready(function() {
								$('#tatatertib').modal('show');

								$(".pernyataan").click(function() {

									$.ajax({
										type: 'POST',
										url: "_praktikan/exc/x_pernyataan.php",
										data: {
											"id": $(this).attr('id'),
											"pernyataan": 'Y',
										},
										dataType: 'json',
										success: function(response) {
											//ambil data file yang diupload
											if (response.ket == "SETUJU") {

												Swal.fire({
													icon: 'success',
													showConfirmButton: false,
													html: '<span class"text-xs"><b>SURAT PERNYATAAN</b><br>DISETUJUI<br>' +
														'<a href="?" class="btn btn-outline-primary">OK</a>',
													timer: 5000,
													timerProgressBar: true,
													didOpen: (toast) => {
														toast.addEventListener('mouseenter', Swal.stopTimer)
														toast.addEventListener('mouseleave', Swal.resumeTimer)
													}
												}).then(
													function() {
														document.location.href = "?";
													}
												);
											} else {
												document.location.href = "?";
											}
										},
										error: function(response) {
											console.log(response.responseText);
											alert('eksekusi query gagal');
										}
									});
								});
							});
						</script>
					<?php } else if ($d_praktikan['pernyataan_praktikan'] == 'Y') { ?>
						<?php
						include "_praktikan/index_data.php";
						?>
					<?php } ?>
				</div>
				<footer class="footer sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>RS Jiwa Provinsi Jawa Barat <?= date('Y'); ?></span>
						</div>
					</div>
				</footer>
			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
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