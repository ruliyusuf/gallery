<?php
    $id = $_GET['id'];
    $queryfoto = "SELECT * FROM tbl_foto WHERE fotoid = '$id'";
    $sqlfoto = $pdo->prepare($queryfoto);
    $sqlfoto->execute();
    $cocok = $sqlfoto->rowCount();
?>


<!-- Content Foto Komentar-->
<section class="content-header">
  <h1>
    Status
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Status</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">

    <?php
        while ($data = $sqlfoto->fetch()) {
    ?>
      <div class="col-md-10">
        <!-- Box Comment -->
        <div class="box box-widget">
          <div class='box-header with-border'>
            <div class='user-block'>
                <?php
                    $queryuser = "SELECT * FROM tbl_user WHERE userid = '$data[userid]'";
                    $sqluser = $pdo->prepare($queryuser);
                    $sqluser->execute();
                    $dataakun = $sqluser->fetch();

                    $jk_akun = $dataakun['jeniskelamin'];

                    if ($jk_akun=="L") {
                        $ft_user = "user_laki.png";
                    } else {
                        $ft_user = "user_perempuan.png";
                    }
                    
                ?>
              <img class='img-circle' src='../Assets/image/user/<?php echo $ft_user;?>' alt='user image'>
              <span class='username'><a href=""><?php echo $dataakun['namalengkap'];?></a></span>
              <span class='description'>dipublikasi - <?php echo $data['tanggalunggah'];?></span>
            </div><!-- /.user-block -->
            <div class='box-tools'>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class='box-body'>
            <img class="img-responsive pad" src="../Assets/image/foto/<?php echo $data['lokasifile']; ?>" title="<?php echo $data['judulfoto'] ?>" alt="Photo Status">
            <p><?php echo $data['deskripsifoto'];?></p>
            <?php
                $querylike = "SELECT * FROM tbl_likefoto WHERE fotoid = '$data[fotoid]' AND userid = '$user'";
                $sqllike = $pdo->prepare($querylike);
                $sqllike->execute();
                $jmllike = $sqllike->rowCount();
                
                if ($jmllike == 0) {
                     ?>
                     <a href="?page=foto&aksi=like_ft&id=<?php echo $data['fotoid']; ?>&status=like" class='btn btn-default btn-xs' title="Anda Menyukai Foto"><i class='fa fa-thumbs-o-up'> Like</i></a>
                     <?php
                } else {
                     ?>
                     <a href="?page=foto&aksi=like_ft&id=<?php echo $data['fotoid']; ?>&status=unlike" class='btn btn-default btn-xs' title="Anda Tidak Menyukai Foto"><i class='fa fa-thumbs-o-down'></i> Unlike</a>
                     <?php
                }

                $querylike2 = "SELECT * FROM tbl_likefoto WHERE fotoid = '$data[fotoid]'";
                $sqllike2 = $pdo->prepare($querylike2);
                $sqllike2->execute();
                $jmllike2 = $sqllike2->rowCount();

                $querykomentar = "SELECT * FROM tbl_komentarfoto WHERE fotoid = '$data[fotoid]' ORDER BY tanggalkomentar ASC";
                $sqlkomentar = $pdo->prepare($querykomentar);
                $sqlkomentar->execute();
                $jmlkomentar = $sqlkomentar->rowCount();
            ?>
            <span class='pull-right text-muted'><?php echo $jmllike2; ?> Menyukai | <?php echo $jmlkomentar; ?> Komentar</span>
          </div><!-- /.box-body -->
          <div class='box-footer box-comments'>
            <?php
                while ($datakomentar = $sqlkomentar->fetch()) {
                    $queryuser2 = "SELECT * FROM tbl_user WHERE userid = '$datakomentar[userid]'";
                    $sqluser2 = $pdo->prepare($queryuser2);
                    $sqluser2->execute();
                    $dataakun2 = $sqluser2->fetch();

                    $jk_akun2 = $dataakun2['jeniskelamin'];

                    if ($jk_akun2=="L") {
                        $ft_user2 = "user_laki.png";
                    } else {
                        $ft_user2 = "user_perempuan.png";
                    }

            ?>
            <div class='box-comment'>
              <!-- User image -->
                    
              <img class='img-circle img-sm' src='../Assets/image/user/<?php echo $ft_user2;?>' alt='user image'>
              <div class='comment-text'>
                <span class="username">
                <?php echo $dataakun2['namalengkap'];?>
                  <span class='text-muted pull-right'>
                    <?php echo $datakomentar['tanggalkomentar'];?>
                    <a href="?page=foto&aksi=hapus_komentar&id=<?php echo $datakomentar['komentarid'] ?>" class='btn btn-box-tool' onclick="return confirm('Apakah anda yakin akan menghapus komentar ini?')" title="Anda menghapus komentar"><i class='fa fa-times'></i></a>
                  </span>
                </span><!-- /.username -->
                <?php echo $datakomentar['isikomentar'];?>
              </div><!-- /.comment-text -->
            </div><!-- /.box-comment -->
            <?php
                }
            ?>
          </div><!-- /.box-footer -->
          <div class="box-footer">
            <form action="?page=foto&aksi=simpan_komentar" method="POST">
              <img class="img-responsive img-circle img-sm" src="../Assets/image/user/<?php echo $ft_akun;?>" alt="alt text">
              <!-- .img-push is used to add margin to elements next to floating images -->
              <div class="img-push">
                <input type="hidden" class="form-control input-sm" name="fotoid" value="<?php echo $data['fotoid']; ?>" placeholder="Id Foto">
                <input type="text" class="form-control input-sm" name="isikomentar" autocomplete='off' placeholder="Tulis Komentar">
              </div>
            </form>
          </div><!-- /.box-footer -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    <?php
        }
    ?>
    </div>
  </div>

</section><!-- /.content -->