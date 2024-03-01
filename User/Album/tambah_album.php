<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Album
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Tambah Album</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">

      <div class="col-sm-11" style="padding:10px;">
      <form action="?page=album&aksi=simpan_album" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Album</label>
                <input type="text" class="form-control" name="nama_album" required autofocus="" placeholder="Nama Album"/>
            </div>
           
            <div class="form-group">
				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi" placeholder="Deskripsi" required></textarea>
			</div>
      <input type="text" name="userid" id="userid" value="<?= $_SESSION['userid'] ?>" hidden>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="margin-top:15px">
			<a class="btn btn-danger" href="?page=album&aksi=tampil_album" style="margin-top:15px">Kembali</a>

        </form>
      </div>

    </div>
  </div>

</section><!-- /.content -->