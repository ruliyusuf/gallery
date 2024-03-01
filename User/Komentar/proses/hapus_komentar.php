<?php
	//require_once("../../../config/koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
	
    $id = $_GET['id'];

    $querykomentar = "SELECT * FROM tbl_komentarfoto WHERE komentarid = '$id'";
    $sqlkomentar = $pdo->prepare($querykomentar);
    $sqlkomentar->execute();
    $cocok = $sqlkomentar->rowCount();
    $komentar=$sqlkomentar->fetch();
    $fotoid=$komentar['fotoid'];

    $query = "DELETE FROM tbl_komentarfoto WHERE komentarid = '$id'";
    $sql = $pdo->prepare($query);
    $sql->execute();
    
	if($sql){
		?>
		<script type="text/javascript">
			setTimeout("location.href='?page=komentar&aksi=tampil_komentar'", 1000);
		</script>
		<?php
	}else{
		echo $query;
		?>
		<script type="text/javascript">
			setTimeout("location.href='?page=komentar&aksi=tampil_komentar'", 1000);
		</script>
		<?php
	}	
?>