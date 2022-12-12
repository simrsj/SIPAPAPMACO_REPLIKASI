<?php
if (empty($_SESSION['username_user'])) {
?>
	<?php
	include "register_captcha.php";
	?>
	<nav class="navbar fixed-top navbar-light bg-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<!-- <img src="./_img/logopemprov.png" class="img-fluid" alt="Responsive image" width="60px">
				<img src="./_img/logorsj.png" class="img-fluid" alt="Responsive image" width="60px">
				<img src="./_img/paripurnakars.png" class="img-fluid" alt="Responsive image" width="80px">
				<img src="./_img/wbk.png" class="img-fluid" alt="Responsive image" width="60px"> -->
				<a class="navbar-brand bg-primary rounded p-2 text-xxl b text-white" href="?">SIPAPAP MACO</a><b>(Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)</b>
			</li>
		</ul>

		<a class="nav-link dropdown-toggle bg-outline-primary p-2 btn btn-outline-primary" href="#">
			<span class="mr-2 d-none d-lg-inline b">LINK</span><i class="fa-solid fa-link"></i>
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right text-center shadow p-2 rounded">
			<a class="" href="?">
				<i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
				Main Menu
			</a>
			<div class="dropdown-divider"></div>
			<a class="btn btn-outline-success btn-sm col mb-2" href="?reg">
				<i class="fas fa-sign-out-alt fa-fw mr-2"></i>
				Register
			</a>
			<a class="btn btn-outline-primary btn-sm col" href="?login">
				<i class="fas fa-sign-out-alt "></i>
				Log-In
			</a>
		</div>
	</nav>
	<br><br><br>

	<div class="text-center bg-white rounded text-md mb-2">
		<?php echo tanggal_hari(date('w')) . " " . date("d M Y"); ?>,
		<di id="jam"></di>
	</div>
	<?php
	if (isset($_GET['reg'])) include "_log-sign/register.php";
	elseif (isset($_GET['login'])) include "_log-sign/login.php";
	// elseif (isset($_GET['dashboard'])) include "_log-sign/register.php";
	else include "_log-sign/login.php";
	?>

	<script>
		function Bukains() {
			if ($('#instansi').val() == '0') {
				// console.log("Pilih Institusi Lainnya");
				$('#institusi_lainnya').append("<input type='text' class='form-control form-control' placeHolder='Isikan Nama Institusi' name='nama_institusi'>").focus();
			} else {
				// console.log("Tidak Pilih Institusi Lainnya");
				$('#institusi_lainnya').empty();
			}
		}
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
		alert('Anda sebelumnya SUDAH LOGIN dengan nama <?php echo $_SESSION['username_user ']; ?>');
		alert('Anda akan diarahkan langsung ke halaman');
	</script>
<?php
	header("Refresh:0");
}
?>