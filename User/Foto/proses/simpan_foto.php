<?php
	//require_once("../../../config/koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');

	$user = $_POST['userid'];
	$judulfoto = $_POST['judulfoto'];
	$deskripsifoto = $_POST['deskripsifoto'];
	$foto_video = $_POST['foto_video'];
	$albumid = $_POST['albumid'];
    $fotoid = rand(10000000, 99999999);

	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$lokasifile = $_FILES['lokasifile']['name'];
	$x = explode('.', $lokasifile);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['lokasifile']['size'];
	$file_tmp = $_FILES['lokasifile']['tmp_name'];
	$foto = 'IMG-'.$fotoid.'.'.$ekstensi;

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 5044070){
			$upload = move_uploaded_file($file_tmp, '../Assets/image/foto/'.$foto);
			if ($upload) {
		    	$query = "INSERT INTO tbl_foto (fotoid, albumid, userid, tanggalunggah, judulfoto, lokasifile, deskripsifoto) VALUES ('$fotoid', '$albumid', '$user', '$tanggal', '$judulfoto', '$foto', '$deskripsifoto')";
				$sql = $pdo->prepare($query);
				$sql->execute();
					
				if($sql){
					?>
					<script type="text/javascript">
						alert('Data telah tersimpan');
						setTimeout("location.href='?page=foto&aksi=tampil_foto&id=<?php echo $albumid; ?>'", 1000);
					</script>
					<?php
				}else{
					echo $query;
					?>
					<script type="text/javascript">
						alert('Data gagal tersimpan');
						setTimeout("location.href='?page=foto&aksi=tambah_foto&id=<?php echo $albumid; ?>'", 1000);
					</script>
					<?php
				}
			} else {
				?>
				<script type="text/javascript">
					alert('Data gambar gagal diupload. Silahkan turunkan resolusi gambar.');
					setTimeout("location.href='?page=foto&aksi=tambah_foto&id=<?php echo $albumid; ?>'", 1000);
				</script>
				<?php
			}	
		} else {
			?>
			<script type="text/javascript">
				alert('Ukuran file terlalu besar');
				setTimeout("location.href='?page=foto&aksi=tambah_foto&id=<?php echo $albumid; ?>'", 1000);
			</script>
			<?php
		}
	} else {
		?>
		<script type="text/javascript">
			alert('Ekstensi file yang di upload tidak di perbolehkan');
			setTimeout("location.href='?page=foto&aksi=tambah_foto&id=<?php echo $albumid; ?>'", 1000);
		</script>
		<?php
	}	
?>