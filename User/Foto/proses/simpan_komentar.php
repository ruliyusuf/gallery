<?php
	//require_once("../../../config/koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
	
    $fotoid = $_POST['fotoid'];
    $isikomentar = $_POST['isikomentar'];
    $komentarid = rand(10000000, 99999999);

        $query = "INSERT INTO tbl_komentarfoto (komentarid, fotoid, userid, tanggalkomentar, isikomentar) VALUES ('$komentarid', '$fotoid', '$user', '$tanggal', '$isikomentar')";
        $sql = $pdo->prepare($query);
        $sql->execute();
    
	if($sql){
		?>
		<script type="text/javascript">
			setTimeout("location.href='?page=foto&aksi=tampil_komentar&id=<?php echo $fotoid; ?>'", 1000);
		</script>
		<?php
	}else{
		echo $query;
		?>
		<script type="text/javascript">
			setTimeout("location.href='?page=foto&aksi=tampil_komentar&id=<?php echo $fotoid; ?>'", 1000);
		</script>
		<?php
	}	
?>