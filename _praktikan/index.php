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
		$sql_praktikan = "SELECT * FROM tb_praktikan ";
		$sql_praktikan .= " JOIN tb_user ON tb_praktikan.id_user = tb_user.id_user";
		$sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
		$sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
		$sql_praktikan .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
		$sql_praktikan .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd";
		$sql_praktikan .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
		$sql_praktikan .= " JOIN tb_pembimbing_pilih ON tb_praktikan.id_praktikan = tb_pembimbing_pilih.id_praktikan";
		$sql_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing";
		$sql_praktikan .= " WHERE tb_user.id_user = " . $_SESSION['id_user'];
		// echo $sql_praktikan;
		$q_praktikan = $conn->query($sql_praktikan);
		$d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo "<script>alert('-DATA PRAKTIKAN-');document.location.href='?error404';</script>";
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

								<?php if ($d_praktikan['id_jurusan_pdd'] == 1) { ?>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#tatatertib">
										Tatatertib
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#matrix-kegiatan">
										Matrix Kegiatan
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?matrix_keg">
										<i class="fa-solid fa-table fa-sm fa-fw mr-2"></i>
										Matrix Kegiatan
									</a>
								<?php } else if ($d_praktikan['id_jurusan_pdd'] == 2) { ?>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#tatatertib">
										<img src="./_img/icongif/checklist.gif" width="15px" height="15px">
										Tatatertib
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#matrixkegiatan">
										<img src="./_img/icongif/document.gif" width="15px" height="15px">
										Matrix Kegiatan
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?kep_kompetensi" style="transition: none; box-shadow: none;">
										<img src="./_img/icongif/medicine.gif" width="15px" height="15px">
										Kompetensi Keperawatan
									</a>
								<?php } ?>
							</div>
						</li>
						<div class="topbar-divider"></div>
						<!-- Nav Item - User -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-md-block text-gray-600 small"><?= $d_praktikan['nama_praktikan']; ?></span>
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
				</nav><?php if ($d_praktikan['id_jurusan_pdd'] == 1) { ?>
					<!-- Modal Tatatertib dan Pernyataan-->
					<div class="modal fade" id="tatatertib">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content" style="height: 500px;">
								<div class="modal-body">
									<iframe src="./_file/ked_tatatertib.pdf" width="100%" height="100%"></iframe>
								</div>
							</div>
						</div>
					</div>
				<?php } else if ($d_praktikan['id_jurusan_pdd'] == 2) { ?>
					<!-- Modal Tatatertib dan Pernyataan-->
					<div class="modal fade" id="tatatertib">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content" style="height: 500px;">
								<div class="modal-header">
									Tatatertib
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="./_file/kep_tatatertib.pdf" width="100%" height="100%"></iframe>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal Matrix Kegiatan-->
					<div class="modal fade" id="matrixkegiatan">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content" style="height: 500px;">
								<div class="modal-header">
									Matrix Kegiatans
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="./_file/kep_martrix_keg.pdf" width="100%" height="100%"></iframe>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>

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
					<?php if ($d_praktikan['pernyataan_praktikan'] == 'T') { ?>

						<!-- Modal Tatatertib dan Pernyataan-->
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
										<div class="text-gray-900">
											<div class="text-center h5 mb-4 b">SURAT PERNYATAAN</div>
											Saya, mahasiswa peserta pendidikan klinis Ilmu Keperawatan Jiwa di RS Jiwa Provinsi Jawa Barat, yang bertanda tangan di bawah ini :
											<div class="m-4">
												<table>
													<tr>
														<td width="110px">Nama</td>
														<td>: <?= $d_praktikan['nama_praktikan'] ?></td>
													</tr>
													<tr>
														<td>NIM</td>
														<td>: <?= $d_praktikan['no_id_praktikan'] ?></td>
													</tr>
													<tr>
														<td>Universitas</td>
														<td>: <?= $d_praktikan['nama_institusi'] ?></td>
													</tr>
													<tr>
														<td>Periode Stase</td>
														<td> : <?= tanggal($d_praktikan['tgl_mulai_praktik']) . " - " . tanggal($d_praktikan['tgl_selesai_praktik']) ?></td>
													</tr>
												</table>
											</div>
											Setelah membaca dan memahami tata tertib serta uraian tugas dan wewenang di bagian ilmu Keperawatan jiwa, saya berjanji akan mentaati peraturan yang berlaku sesuai yang tercantum. Jika saya terbukti melanggar aturan, amak saya bersedia dikenakan sangsi sesuai dengan aturan yang berlaku.
										</div><br>
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