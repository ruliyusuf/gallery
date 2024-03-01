<?php
    $id = $_GET['id'];
    $queryfoto = "SELECT * FROM tbl_foto WHERE albumid = $id ORDER BY tanggalunggah ASC";
    $sqlfoto = $pdo->prepare($queryfoto);
    $sqlfoto->execute();
    $cocok = $sqlfoto->rowCount();

    $queryalbum = "SELECT * FROM tbl_album WHERE albumid = $id";
    $sqlalbum = $pdo->prepare($queryalbum);
    $sqlalbum->execute();
    $dataalbum = $sqlalbum->fetch();
?>

<!-- Content Album-->
<section class="content-header">
  <h1>
    Album Foto : <?php echo $dataalbum['namaalbum']; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Foto</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">
    <div class="col-sm-4" style="padding:10px;">
        <div class="card" style="width: 28rem;">
            <div class="box box-widget">
                <div class='box-header with-border'>
                    <div class='user-block'>
                    </div><!-- /.user-block -->
                    <div class='box-tools'>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <center>
                        <a href="?page=foto&aksi=tambah_foto&id=<?php echo $id ?>">
                            <img class="img-responsive pad" src="../Assets/image/foto/tambah1.png" title="Menambah Foto" width="76%" height="76%" alt="Tambah Foto">
                        </a>
                    </center>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
      </div>

        <?php         
            while ($data = $sqlfoto->fetch()) {
        ?>

        <div class="col-sm-4" style="padding:10px;">
            <div class="card" style="width: 28rem;">
                <div class="box box-widget">
                    <div class='box-header with-border'>
                        <div class='user-block'>
                        </div><!-- /.user-block -->
                        <div class='box-tools'>
                            <?php
                               $querylike = "SELECT * FROM tbl_likefoto WHERE fotoid = '$data[fotoid]' AND userid = '$user'";
                               $sqllike = $pdo->prepare($querylike);
                               $sqllike->execute();
                               $jmllike = $sqllike->rowCount();
                               
                               if ($jmllike == 0) {
                                    ?>
                                    <a href="?page=foto&aksi=like_foto&id=<?php echo $data['fotoid'] ?>&status=like&userid=<?= $_SESSION['userid'] ?>" class='btn btn-default btn-xs' title="Anda Menyukai Foto"><i class='fa fa-thumbs-o-up'> Like</i></a>
                                    <?php
                               } else {
                                    ?>
                                    <a href="?page=foto&aksi=like_foto&id=<?php echo $data['fotoid'] ?>&status=unlike" class='btn btn-default btn-xs' title="Anda Tidak Menyukai Foto"><i class='fa fa-thumbs-o-down'></i> Unlike</a>
                                    <?php
                               }
                            ?>   
                        <a href="?page=foto&aksi=hapus_foto&id=<?php echo $data['fotoid'] ?>" class='btn btn-box-tool' onclick="return confirm('Anda akan menghapus data ini?')" title="Hapus Foto"><i class='fa fa-times'></i></a>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                      <a href="?page=foto&aksi=tampil_komentar&id=<?php echo $data['fotoid'] ?>" onClick="">
                        <img class="img-responsive pad" src="../Assets/image/foto/<?php echo $data['lokasifile']; ?>" title="<?php echo $data['judulfoto'] ?>" width="100%" height="100%" alt="Photo">
                      </a>
                      </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
      <?php
            }
      ?>
    </div>
  </div>

</section><!-- /.content -->