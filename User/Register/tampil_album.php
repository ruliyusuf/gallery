<?php
    $query = "SELECT * FROM tbl_album ORDER BY tanggaldibuat DESC";
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

        <?php
            while ($data = $sql->fetch()){
                ?>
                <div class="col-sm-3" style="padding:10px;">
                    <div class="card" style="width: 28rem;">
                        <a href="" onClick="alert('Silahkan untuk login dahulu!')">
                        <?php

                            $queryfoto = "SELECT * FROM tbl_foto WHERE albumid = '$data[albumid]' ORDER BY tanggalunggah ASC";
                            $sqlfoto = $pdo->prepare($queryfoto);
                            $sqlfoto->execute();
                            $cocok = $sqlfoto->rowCount();
                            $r=$sqlfoto->fetch();

                            if ($cocok==0) {
                                ?>
                                <img src="Assets/image/foto/album.jpg" title="<?php echo $data['namaalbum'] ?>" width="75%" height="75%" class="card-img-top" alt="Tambah Foto">
                                <?php
                            } else {
                                ?>
                                <img src="Assets/image/foto/<?php echo $r['lokasifile']; ?>" title="<?php echo $data['namaalbum'] ?>" width="100%" height="100%" class="card-img-top" alt="Foto Pertama">
                                <?php
                            }
                            
                        ?>
                        </a>
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $data['namaalbum'] ?></h4>
                        <p class="card-text"><?php echo $data['deskripsi'] ?></p>
                        <p align="center"><?php echo $data['tanggaldibuat'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>

    </div>
  </div>

</section><!-- /.content -->