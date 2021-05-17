	<?php 
	if(isset($_GET['data'])){
		$kode_peserta = $_GET['data'];
		//get data peserta
		$sql_m = "select `m`.`nama`, `j`.`travel`, `m`.`foto` 
		from `peserta` `m` inner join `travel` `j` 
		on `m`.`kode_travel` = `j`.`kode_travel` 
		where `m`.`kode_peserta` = '$kode_peserta'";
		$query_m = mysqli_query($koneksi,$sql_m);
		while($data_m = mysqli_fetch_row($query_m)){
			$nama= $data_m[0];
			$travel = $data_m[1];
			$foto = $data_m[2];
		}	
	}
	?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Peserta</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=peserta">Data Peserta</a></li>
              <li class="breadcrumb-item active">Detail Data Peserta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="index.php?include=peserta" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Profil Peserta<strong></td>
                      </tr>               
                      <tr>
                        <td width="20%"><strong>Kode Peserta<strong></td>
                        <td width="80%"><?php echo $kode_peserta;?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama;?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Paket Travel<strong></td>
                        <td width="80%"><?php echo $travel;?></td>
                      </tr> 
                      <tr>
                        <td><strong>Foto Peserta<strong></td>
                        <td><img src="foto/<?php echo $foto;?>" class="img-fluid" width="200px;"></td>
                      </tr>
                      <tr>
                        <td><strong>Administrasi<strong></td>
                        <td>
                          <ul>
                            <?php
                            //get adm
                            $sql_h = "select `h`.`adm` from `adm_peserta` `hm`
                                      inner join `adm` `h` 
                                      on `h`.`kode_adm` = `hm`.`kode_adm` 
                                      where `hm`.`kode_peserta`='$kode_peserta'";
                                      $query_h = mysqli_query($koneksi,$sql_h);
                                      while($data_h = mysqli_fetch_row($query_h)){
                                      $adm= $data_h[0];
                                      ?>
                                        <li><?php echo $adm;?></li>
                                      <?php }?>
                          </ul>
                        </td>
                      </tr>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>