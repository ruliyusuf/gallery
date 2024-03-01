<?php
	//require_once("../../../config/koneksi.php");

	$id = $_GET['id'];

    $queryfoto = "SELECT * FROM tbl_foto WHERE albumid = '$id'";
    $sqlfoto = $pdo->prepare($queryfoto);
    $sqlfoto->execute();
    $cocok = $sqlfoto->rowCount();
    
    if ($cocok > 0) {
        while ($img=$sqlfoto->fetch()) {
            $file = "../Assets/image/foto/".$img['lokasifile'];
            unlink($file);
        }
    }

	$query = "DELETE FROM tbl_album WHERE albumid = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	
	if($sql){
		?>
		<script type="text/javascript">
			alert('Data telah terhapus');
			setTimeout("location.href='?page=album&aksi=tampil_album'", 1000);
		</script>
		<?php
	}else{
		echo $query;
		?>
		<script type="text/javascript">
			alert('Data gagal terhapus');
			setTimeout("location.href='?page=album&aksi=tampil_album'", 1000);
		</script>
		<?php
	}	
?>