<!DOCTYPE html>
<html>
<head>
	<title>CETAK INVOICE PRAKTIK RS JIWA </title>
    
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template -->
    <!-- <link href="../css/sb-admin-2.min.css" rel="stylesheet"> -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->

    <!-- Add-ons -->
</head>
<body>
		<?php 
	        include_once "koneksi.php";
            include_once "tanggal.php";
		?>
	<center>
	<table border=1 width = '800px;'>
	<tr>
		<th rowspan = 6><img src="../_img/logopemprov.png" height='100px'></th>
		<th>PEMERINTAH DAERAH PROVINSI JAWA BARAT</th>
  	</tr>
  	<tr>
		<th>DINAS KESEHATAN</th>
	</tr>
	<tr>
		<th>RUMAH SAKIT JIWA</th>
	</tr>
	<tr>
		<td><center>Jalan Kolonel Masturi KM. 7 – Cisarua Telepon: (022) 2700260</center></td>
	</tr>
	<tr>
		<td><center>Fax: (022) 2700304 Website: www.rsj.jabarprov.go.id email: rsj@jabarprov.go.id</center></td>
	</tr>
	<tr>
		<td><center>KABUPATEN BANDUNG BARAT – 40551</center></td>
	</tr>
	</table>
	<hr>	

	<table border="1" width = "800px;">
			<tr >
				<th></th>
				<td align="right">Kab Bandung Barat, {tanggal}</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td>Nomor </td>
							<td>:</td>
							<td>420/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Diklat-RSJ/2022</td>
						</tr>
						<tr>
							<td>Sifat</td>
							<td>:</td>
							<td>Biasa</td>
						</tr>
						<tr>
							<td>Lampiran</td>
							<td>:</td>
							<td>-</td>
						</tr>
						<tr>
							<td>Perihal</td>
							<td>:</td>
							<td>Praktik Keperawatan Jiwa</td>
						</tr>
					</table>
				</td>
				<td>Kepada,<br>
				<br>Yth.	{universitas}
				<br>di 
				<br>Tempat
				</td>	
			</tr>
	</table>
	</center>
	<p>
	Menindaklanjuti surat dari {universitas}, Nomor: {tablepraktik_nomorsurat} tanggal {tanggal_surat} perihal Permohonan Izin Praktik Orientasi Klinik Program Studi Sarjana Keperawatan. Pada dasarnya kami dapat menerima Permohonan Praktik Lapangan tersebut untuk {jumlah praktikan} orang {praktikan} pada tanggal {tanggal mulai} sampai dengan {tanggal selesai}. <br>
</p>
<p>
Sesuai Peraturan Gubernur Jawa Barat Nomor 15 Tahun 2020 tentang Tarif Layanan Unit Pelaksanaan Teknis Daerah Rumah Sakit Jiwa, maka Rincian Anggaran Biaya yang harus Saudara penuhi adalah sebagai berikut :

	</p>
	<p>
	Perlu kami informasikan pembayaran ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) dengan Nomor: BJB-0063028738002. Bukti transfer dapat dikirim melaui email  diklit.rsj.jabarprov@gmail.com dan nomor WA Bendahara Penerimaan RSJ (081321412643)<br/>
	Demikian agar menjadi maklum. Atas perhatian dan kerja sama Saudara kami ucapkan terima kasih.

	</p>

		<table border="1" class='table table-striped table-hover'>
			<tr align="center">
				<th>NO</th>
				<th>JENIS KEGIATAN</th>
				<th>Frek</th>
				<th>MHS</th>
				<th>TARIF</th>
				<th>SATUAN</th>
				<th>JUMLAH (Rp)</th>
			</tr>
			<?php 
			$no = 1;
			$sql_mou = "SELECT * FROM tb_tarif_pilih";
                       $q_mou = $conn->query($sql_mou);
            $berlaku=0;
             $tb = 0;
			while($data = $q_mou->fetch(PDO::FETCH_ASSOC)){
                //  $date_end = strtotime($data['tgl_selesai_mou']);
                // $date_now = strtotime(date('Y-m-d'));
                // $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                // if ($date_diff <= 0) {
                
                //    $status = "<span class='alert-success'>BERLAKU</span";
                //    $berlaku = $berlaku +1;
                // } elseif ($date_diff > 0) {
                //     $status = "<span class='alert-danger'>TIDAK BERLAKU</span>";
                //     $tb = $tb +1;
                // }
                
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama_jenis_tarif_pilih']; ?></td>
				<td><?php echo $data['nama_tarif_pilih']; ?></td>
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
