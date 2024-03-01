<?php
	// require_once("../../../config/koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');

    $userid = $_POST['userid'];
	$nama_album = $_POST['nama_album'];
	$deskripsi = $_POST['deskripsi'];
    $albumid = rand(1000, 9999);

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT * FROM tbl_album WHERE userid = '$userid' AND albumid = '$albumid'";
	$sql_id = $pdo->prepare($query_id);
	$sql_id->execute();
	$data = $sql_id->fetch();
	$jmldata = $sql_id->rowCount();

    if ($jmldata==0) {
        $query = "INSERT INTO tbl_album VALUES ('$albumid', '$nama_album', '$deskripsi', '$tanggal', '$userid')";
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
                setTimeout("location.href='?page=album&aksi=form_album'", 1000);
            </script>
            <?php
        }	
    } else {
        ?>
        <script type="text/javascript">
            alert('Username dan Email sudah digunakan oleh akun lain');
            setTimeout("location.href='?page=album&aksi=form_album'", 1000);
        </script>
        <?php
    }
    
?>