                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form method="post">
                                <label>Nama Spesifikasi</label>
                                <input type="text" size="75%" name="name_specialist" placeholder="Isi nama spesifikasi">
                                <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
	                if(isset($_POST['submit']))
	                {
	                	$sql_insert="INSERT INTO `tb_specialist` (`id_specialist`, `name_specialist`) VALUES (NULL, '".$_POST['name_specialist']."')";

						$conn->query($sql_insert);
				?>
					<script>			
							document.location.href="?spf";
					</script>
				<?php
					}
				?>
						