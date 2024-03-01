<?php
    //require_once("../../config/koneksi.php");
	
    $id = $_GET['id'];
	$query = "SELECT * FROM tbl_album WHERE albumid = '$id'";
	$sql = $pdo->prepare($query);
	$sql->execute();
	$data = $sql->fetch();
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Album
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Edit Album</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">

      <div class="col-sm-11" style="padding:10px;">
      <form action="?page=album&aksi=update_album" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Album</label>
                <input type="hidden" class="form-control" name="albumid" value="<?php echo $data['albumid'];?>" required placeholder="Id Album"/>
                <input type="text" class="form-control" name="namaalbum" required autofocus="" value="<?php echo $data['namaalbum'];?>" placeholder="Nama Album"/>
            </div>
           
            <div class="form-group">
				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi" placeholder="Deskripsi" required><?php echo $data['deskripsi'];?></textarea>
			</div>

            <input type="submit" name="simpan" value="Update" class="btn btn-primary" style="margin-top:15px">
			<a class="btn btn-danger" href="?page=album&aksi=tampil_album" style="margin-top:15px">Kembali</a>

        </form>
      </div>

    </div>
  </div>

</section><!-- /.content -->