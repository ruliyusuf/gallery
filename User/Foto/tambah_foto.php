<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Foto
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Tambah Foto</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">

      <div class="col-sm-11" style="padding:10px;">
      <form action="?page=foto&aksi=simpan_foto" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Judul Foto</label>
                <input type="text" name="userid" id="userid" value="<?= $_SESSION['userid'] ?>" hidden>
                <input type="hidden" class="form-control" name="albumid" required value="<?php echo $_GET['id']; ?>" placeholder="Id Album"/>
                <input type="text" class="form-control" name="judulfoto" required autofocus="" placeholder="Judul Foto"/>
            </div>
           
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" name="deskripsifoto" placeholder="Deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label>File Foto</label>
                <input type="file" class="form-control" name="lokasifile" required placeholder="File Foto"/>
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
			<a class="btn btn-danger" href="?page=foto&aksi=tampil_foto" style="margin-top:15px">Kembali</a>

        </form>
      </div>

    </div>
  </div>

</section><!-- /.content -->
