<?php
	//require_once("../../../config/koneksi.php");

	$id = $_GET['id'];

    $queryfoto = "SELECT * FROM tbl_foto WHERE fotoid = '$id'";
    $sqlfoto = $pdo->prepare($queryfoto);
    $sqlfoto->execute();
    $cocok = $sqlfoto->rowCount();
    $img=$sqlfoto->fetch();
    $album=$img['albumid'];

    if ($cocok > 0) {
        $file = "../Assets/image/foto/".$img['lokasifile'];
        unlink($file);
    }

	$query = "DELETE FROM tbl_foto WHERE fotoid = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	
	if($sql){
		?>
		<script type="text/javascript">
			alert('Data telah terhapus');
			setTimeout("location.href='?page=foto&aksi=tampil_foto&id=<?php echo $album?>'", 1000);
		</script>
		<?php
	}else{
		echo $query;
		?>
		<script type="text/javascript">
			alert('Data gagal terhapus');
			setTimeout("location.href='?page=foto&aksi=tampil_foto&id=<?php echo $album?>'", 1000);
		</script>
		<?php
	}	
?>