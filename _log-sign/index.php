<?php
if (empty($_SESSION['username_user'])) {
?>
	<?php
	include "./_log-sign/exc/x_captcha.php";
	?>
	<nav class="navbar fixed-top navbar-light bg-light shadow-lg mb-5">
		<ul class="navbar-nav">
			<li class="nav-item">
				<!-- <img src="./_img/logopemprov.png" class="img-fluid" alt="Responsive image" width="60px">
				<img src="./_img/logorsj.png" class="img-fluid" alt="Responsive image" width="60px">
				<img src="./_img/paripurnakars.png" class="img-fluid" alt="Responsive image" width="80px">
				<img src="./_img/wbk.png" class="img-fluid" alt="Responsive image" width="60px"> -->
				<a class="navbar-brand bg-primary rounded p-2 text-xxl b text-white" href="?">SIPAPAP MACO</a><br>
				<div class="d-none  d-lg-inline b">(Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)</div>
			</li>
		</ul>

		<a class="nav-link dropdown-toggle bg-outline-primary p-2 btn btn-outline-primary" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline b">LINK</span><i class="fa-solid fa-link"></i>
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right text-center shadow p-2 rounded" aria-labelledby="userDropdown">
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
	</nav>
	<br><br><br><br>
	<div class="text-center mb-1">
		<div class="btn btn-primary">
			<?= tanggal_hari(date('w')) . " " . date("d M Y"); ?>, <span id="jam"></span>
		</div>
	</div>

	<?php
	if (isset($_GET['reg'])) include "_log-sign/view/v_register.php";
	elseif (isset($_GET['login'])) include "_log-sign/view/v_login.php";
	elseif (isset($_GET['act_user']) && isset($_GET['crypt'])) include "_log-sign/view/v_aktivasi_akun.php";
	elseif (isset($_GET['forgot_pass'])) include "_log-sign/view/v_lupa_password.php";
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