<?php
if (empty($_SESSION['username_user'])) {
?>
	<?php
	// include "./_log-sign/exc/x_captcha.php";
	?>
	<div class="">
		<div class="row p-2 fixed-top bg-light shadow-lg mb-5 ">
			<div class="col-11">
				<a class="badge badge-primary text-lg b text-white text-decoration-none" href="?">SIPAPAP MACO</a><br>
				<div class=" d-none d-lg-inline b">(Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)</div>
			</div>
			<div class="col-1">
				<a class="dropdown-toggle btn btn-outline-primary  btn-sm  my-auto" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class=" d-none d-lg-inline b">LINK</span>
					<i class="fa fa-bars"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right text-center shadow p-2 rounded" aria-labelledby="userDropdown">
					<a class="btn btn-danger btn-sm col-md mb-2" href="?panduan">
						<span class="b">PANDUAN</span>
					</a>
					<a class="btn btn-outline-dark btn-sm col-md mb-2" href="?">
						<i class="fa-solid fa-house fa-fw mr-2"></i>
						Home
					</a>
					<a class="btn btn-outline-success btn-sm col-md mb-2" href="?reg">
						<i class="fa-solid fa-user fa-fw mr-2"></i>
						Register
					</a>
					<a class="btn btn-outline-primary btn-sm col-md" href="?login">
						<i class="fas fa-sign-out-alt fa-fw mr-2"></i>
						Log-In
					</a>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<div class="text-center mb-1">
		<div class="btn btn-light b text-primary">
			<?= tanggal_hari(date('w')) . ", " . tanggal(date("Y-m-d")); ?>, <span id="jam"></span>
		</div>
	</div>

	<?php
	if (isset($_GET['reg'])) include "_log-sign/view/v_register.php";
	elseif (isset($_GET['login'])) include "_log-sign/view/v_login.php";
	elseif (isset($_GET['act_user']) && isset($_GET['crypt'])) include "_log-sign/view/v_aktivasi_akun.php";
	elseif (isset($_GET['forgot_pass'])) include "_log-sign/view/v_lupa_password.php";
	elseif (isset($_GET['forgot_pass_user'])) include "_log-sign/view/v_lupa_password_isi.php";
	elseif (isset($_GET['panduan'])) include "panduan.php";
	// elseif (isset($_GET['dashboard'])) include "_log-sign/register.php";
	else include "_log-sign/view/v_login.php";
	?>

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
		alert('Anda sebelumnya SUDAH LOGIN dengan nama <?= $_SESSION['username_user ']; ?>');
		alert('Anda akan diarahkan langsung ke halaman');
	</script>
<?php
	header("Refresh:0");
}
?>