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

		<h2>LAPORAN DATA MENTOR/PEMBIMBING <br/> RS JIWA PROVINSI JAWA BARAT</h2>
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
				<th>NIP NIPK MENTOR</th>
				<th>NAMA MENTOR</th>
				<th>UNIT KERJA</th>
				<th>STATUS</th>
			</tr>
			<?php 
			$no = 1;
			$sql_mou = "SELECT * FROM tb_mentor 
                JOIN tb_mentor_jenis ON tb_mentor.id_mentor_jenis = tb_mentor_jenis.id_mentor_jenis 
                JOIN tb_unit ON tb_mentor.id_unit = tb_unit.id_unit 
                JOIN tb_jenjang_pdd ON tb_mentor.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                ORDER BY nama_mentor ASC";
                       $q_mou = $conn->query($sql_mou);
            $jml=0;
            
			while($data = $q_mou->fetch(PDO::FETCH_ASSOC)){
            
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nip_nipk_mentor']; ?></td>
				<td><?php echo $data['nama_mentor']; ?></td>
				<td><?php echo $data['nama_unit']; ?></td>
				<td align="center">
                    <?php if($data['status_mentor']=='Aktif') {
                            echo "<span class='alert-success'> AKTIF </span>"; 
                        }else{
                            echo "<span class='alert-danger'> TIDAK AKTIF </span>"; 

                        }?>
                    </td>
			</tr>
			<?php 
			}
			?>
                
				
			
		</table>
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
