<?php
	//require_once("../../../config/koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
	
    $id = $_GET['id'];
    $status = $_GET['status'];
    $likeid = rand(10000000, 99999999);

    $queryfoto = "SELECT * FROM tbl_foto WHERE fotoid = '$id'";
    $sqlfoto = $pdo->prepare($queryfoto);
    $sqlfoto->execute();
    $cocok = $sqlfoto->rowCount();
    $img=$sqlfoto->fetch();
    $album=$img['albumid'];
    $user = $img['userid'];

    if ($status == 'like') {
        $query = "INSERT INTO tbl_likefoto (likeid, fotoid, userid, tanggallike) VALUES ('$likeid', '$id', '$user', '$tanggal')";
        $sql = $pdo->prepare($query);
        $sql->execute();
    } else {
        $querylike = "SELECT * FROM tbl_likefoto WHERE fotoid = '$id' AND userid = '$user'";
        $sqllike = $pdo->prepare($querylike);
        $sqllike->execute();
        $like = $sqllike->fetch();
        $idlike = $like['likeid'];

        $query = "DELETE FROM tbl_likefoto WHERE likeid = '$idlike'";
        $sql = $pdo->prepare($query);
        $sql->execute();
    }
    
	if($sql){
		?>
		<script type="text/javascript">
			setTimeout("location.href='?page=foto&aksi=tampil_foto&id=<?php echo $album?>'", 1000);
		</script>
		<?php
	}else{
		echo $query;
		?>
		<script type="text/javascript">
			setTimeout("location.href='?page=foto&aksi=tampil_foto&id=<?php echo $album?>'", 1000);
		</script>
		<?php
	}	
?>