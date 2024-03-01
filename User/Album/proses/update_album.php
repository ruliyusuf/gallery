<?php
	//require_once("../../../config/koneksi.php");

	date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
    $albumid = $_POST['albumid'];
	$namaalbum = $_POST['namaalbum'];
	$deskripsi = $_POST['deskripsi'];

	$query = "UPDATE tbl_album SET  
									namaalbum = '$namaalbum',
                                    tanggaldibuat = '$tanggal',
									deskripsi = '$deskripsi'
									WHERE albumid = '$albumid'";
	$sql = $pdo->prepare($query);
	$sql->execute();
						
	if($sql){
		?>
		<script type="text/javascript">
			alert('Data telah tersimpan');
			setTimeout("location.href='?page=album&aksi=tampil_album'", 1000);
		</script>
		<?php
	}else{
		echo $query;
		?>
		<script type="text/javascript">
			alert('Data gagal tersimpan');
			setTimeout("location.href='?page=album&aksi=edit_album&id=<?php echo $albumid; ?>'", 1000);
		</script>
		<?php
	}	
?>