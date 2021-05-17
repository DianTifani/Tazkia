<?php 
	if(isset($_GET['data'])){
		$kode_travel = $_GET['data'];
		$_SESSION['kode_travel']=$kode_travel;
		
	  //get data travel
		$sql_d = "select `travel` from `travel` where `kode_travel` = '$kode_travel'";
	$query_d = mysqli_query($koneksi,$sql_d);
	while($data_d = mysqli_fetch_row($query_d)){
	     $travel= $data_d[0];
	}
	}
	?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Paket Travel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=travel">Paket Travel</a></li>
              <li class="breadcrumb-item active">Edit Paket Travel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Paket Travel</h3>
        <div class="card-tools">
          <a href="index.php?include=travel" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      <?php if(!empty($_GET['notif'])){?>
          <?php if($_GET['notif']=="editkosong"){?>
              <div class="alert alert-danger" role="alert"> Maaf data Paket Travel wajib di isi</div>
          <?php }?>
        <?php }?>
      </div>
      <form class="form-horizontal" action="index.php?include=konfirmasi_edit_travel" method="post">
        <div class="card-body">
          <div class="form-group row">
            <label for="travel" class="col-sm-3 col-form-label">Paket Travel</label>
            <div class="col-sm-7">
             <input type="text" class="form-control" id="travel" name="travel" value="<?php echo $travel;?>">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>