	<?php 
	if(isset($_GET['data'])){
		$kode_peserta = $_GET['data'];
		$_SESSION['kode_peserta']=$kode_peserta;
		//get data peserta
		$sql_m = "select `nama`, `kode_travel`, `foto` 
		from `peserta` where `kode_peserta` = '$kode_peserta'";
		$query_m = mysqli_query($koneksi,$sql_m);
		while($data_m = mysqli_fetch_row($query_m)){
			$nama= $data_m[0];
			$kd_jur = $data_m[1];
			$foto = $data_m[2];
		}
		//get hadministrasi
		$sql_h = "select `kode_adm` from `adm_peserta` 
	        where `kode_peserta`='$kode_peserta'";
		$query_h = mysqli_query($koneksi,$sql_h);
		$array_adm = array();
		while($data_h = mysqli_fetch_row($query_h)){
			$adm= $data_h[0];
			$array_adm[] = $adm;
		} 
	}
	?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Peserta</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=peserta">Data Peserta</a></li>
              <li class="breadcrumb-item active">Edit Data Peserta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Maasiswa</h3>
        <div class="card-tools">
          <a href="index.php?include=peserta" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
      	<?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
        <?php if($_GET['notif']=="editkosong"){?>
        <div class="alert alert-danger" role="alert">Maaf data 
        <?php echo $_GET['jenis'];?> wajib di isi</div>
        <?php }?>
        <?php }?>
      </div>
    	<form class="form-horizontal" method="post" 
		enctype="multipart/form-data" action="index.php?include=konfirmasi_edit_peserta">
		<div class="card-body">
			<div class="form-group row">
				<label for="foto" class="col-sm-12 col-form-label">
				<span class="text-info"><i class="fas fa-user-circle"></i><u>Data Peserta</u></span></label>
			</div>
			<div class="form-group row">
				<label for="kode_peserta" class="col-sm-3 col-form-label">Kode Peserta</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" name="kode_peserta" id="kode_peserta" value="<?php echo $kode_peserta;?>" readonly="readonly">
				</div>
			</div>
			<div class="form-group row">
				<label for="nama" class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="travel" 
				class="col-sm-3 col-form-label">Paket Travel</label>
				<div class="col-sm-7">
				<select class="form-control" id="travel" name="travel">
				<option value="0">- Pilih Paket Travel -</option>
			<?php
				$sql_j = "select `kode_travel`, `travel` from `travel` order by `kode_travel`";
				$query_j = mysqli_query($koneksi,$sql_j);
				while($data_j = mysqli_fetch_row($query_j)){
				$kode_travel = $data_j[0];
				$travel = $data_j[1];
				?>
				<option value="<?php echo $kode_travel;?>"
				<?php if($kode_travel==$kd_jur){?> selected="selected" 
				<?php }?>>
				<?php echo $travel;?><?php }?>>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="foto" class="col-sm-3 col-form-label">Foto </label>
				<div class="col-sm-7">
				<div class="custom-file">
				<input type="file" class="custom-file-input" name="foto" id="customFile">
				<label class="custom-file-label" for="customFile">Choose file</label>
				</div>  
				</div>
				</div>
				<div class="form-group row">
				<label for="adm" class="col-sm-3 col-form-label">Administrasi</label>
				<div class="col-sm-7">
				<?php 
				$sql_h = "select `kode_adm`, `adm` from `adm` 
				order by `kode_adm`";
				$query_h = mysqli_query($koneksi,$sql_h);
				$jum_adm = mysqli_num_rows($query_h);
				while($data_h = mysqli_fetch_row($query_h)){
				$kode_adm = $data_h[0];
				$adm = $data_h[1];
				?>
				<input type="checkbox"  name="adm[]" value="<?php echo $kode_adm; ?>"
				<?php if(in_array($kode_adm, $array_adm)){?>checked="checked" 
				<?php }?>/> 
				<?php echo $adm; ?></br>
				<?php }?>
				</div>
				</div>
			</div>
			</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
			<div class="col-sm-12">
			<button type="submit" class="btn btn-info float-right">
			<i class="fas fa-plus"></i> Tambah</button>
			</div>  
	</div>
	<!-- /.card-footer -->
	</form>

    </div>
    <!-- /.card -->

    </section>
    