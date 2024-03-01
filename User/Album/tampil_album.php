<?php
$user = $_SESSION['userid'];
    $query = "SELECT * FROM tbl_album WHERE userid = '$user' ORDER BY tanggaldibuat DESC";
	$sql = $pdo->prepare($query);
	$sql->execute();
?>

<!-- Content Album-->
<section class="content-header">
  <h1>
    Album
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Album</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">

        <div class="col-sm-4" style="padding:10px;">
            <div class="card" style="width: 28rem;">
                <a href="?page=album&aksi=tambah_album">
                <img src="#" title="Menambah Album" width="90%" height="90%" class="card-img-top" alt="Tambah Foto">
                </a>
                <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"> </p>
                <center>
                    <a href="?page=album&aksi=tambah_album" class="btn btn-primary">Tambah Album</a>
                </center>
                </div>
            </div>
        </div>

        <?php
            while ($data = $sql->fetch()) {
                ?>
                <div class="col-sm-4" style="padding:10px;">
                    <div class="card" style="width: 28rem;">
                        <a href="?page=foto&aksi=tampil_foto&id=<?php echo $data['albumid'] ?>">
                        <?php
                            $queryfoto = "SELECT * FROM tbl_foto WHERE albumid = '$data[albumid]' ORDER BY tanggalunggah ASC";
                            $sqlfoto = $pdo->prepare($queryfoto);
                            $sqlfoto->execute();
                            $cocok = $sqlfoto->rowCount();
                            $r=$sqlfoto->fetch();

                            if ($cocok==0) {
                                ?>
                                <img src="../Assets/image/foto/album.jpg" title="<?php echo $data['namaalbum'] ?>" width="70%" height="70%" class="card-img-top" alt="Tambah Foto">
                                <?php
                            } else {
                                ?>
                                <img src="../Assets/image/foto/<?php echo $r['lokasifile']; ?>" title="<?php echo $data['namaalbum'] ?>" width="100%" height="100%" class="card-img-top" alt="Foto Pertama">
                                <?php
                            }
                            
                        ?>
                        </a>
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $data['album'] ?></h4>
                        <p class="card-text"><?php echo $data['deskripsi'] ?></p>
                        <p align="center"><?php echo $data['tanggaldibuat'] ?></p>
                        <center>
                            <a href="?page=foto&aksi=tampil_foto&id=<?php echo $data['albumid'] ?>" class="btn btn-primary" title="Melihat Foto"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                            <a href="?page=album&aksi=edit_album&id=<?php echo $data['albumid'] ?>" class="btn btn-warning" title="Mengedit Album"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            <a href="?page=album&aksi=hapus_album&id=<?php echo $data['albumid'] ?>" onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" title="Menghapus Album"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </center>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>

    </div>
  </div>

</section><!-- /.content -->