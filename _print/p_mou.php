<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA LAPORAN MOU RSJ </title>
    
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->

    <!-- Add-ons -->
</head>
<body>

	<center>

		<h2>LAPORAN MOU RS JIWA PROVINSI JAWA BARAT</h2>
        <br/>
        <br/>
        <br/>

		<?php 
	        include_once "koneksi.php";
            include_once "tanggal.php";
		?>

		<table border="1" class='table table-striped table-hover'>
			<tr align="center">
				<th>NO</th>
				<th>NAMA INSTITUSI</th>
				<th>TANGGAL AKHIR MOU</th>
				<th>NO MOU RSJ</th>
				<th>NO MOU INSTITUSI</th>
				<th>STATUS</th>
			</tr>
			<?php 
			$no = 1;
			$sql_mou = "SELECT * FROM tb_mou 
                    JOIN tb_institusi ON tb_mou.id_institusi = tb_institusi.id_institusi
                    JOIN tb_jurusan_pdd ON tb_mou.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_jenjang_pdd ON tb_mou.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_spesifikasi_pdd ON tb_mou.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_akreditasi ON tb_mou.id_akreditasi = tb_akreditasi.id_akreditasi
                    ORDER BY tb_institusi.nama_institusi ASC";
                       $q_mou = $conn->query($sql_mou);
            $berlaku=0;
             $tb = 0;
			while($data = $q_mou->fetch(PDO::FETCH_ASSOC)){
                 $date_end = strtotime($data['tgl_selesai_mou']);
                $date_now = strtotime(date('Y-m-d'));
                $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                if ($date_diff <= 0) {
                
                   $status = "<span class='alert-success'>BERLAKU</span";
                   $berlaku = $berlaku +1;
                } elseif ($date_diff > 0) {
                    $status = "<span class='alert-danger'>TIDAK BERLAKU</span>";
                    $tb = $tb +1;
                }
                
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama_institusi']; ?></td>
				<td><?php echo tanggal($data['tgl_selesai_mou']); ?></td>
				<td><?php echo $data['no_rsj_mou']; ?></td>
				<td><?php echo $data['no_institusi_mou']; ?></td>
				<td align="center"><?php echo $status; ?></td>
			</tr>
			<?php 
			}
			?>
                
				
			
		</table>
            <h5 align="right" class="alert-danger">JUMLAH MOU TIDAK BERLAKU : <?php echo $tb; ?> Institusi</h5>
            <h5 align="right">JUMLAH MOU YANG MASIH BERLAKU : <?php echo $berlaku; ?> Institusi</h5>
            <h5 align="right">Dicetak Pada : <?php echo tanggal(date('Y-m-d')); ?></h5>
		<br/>

		<!-- <a href="cetak.php" target="_blank">CETAK</a> -->


    <script>
		window.print();
	</script>

</body>
    
<!-- JS -->

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
</html>