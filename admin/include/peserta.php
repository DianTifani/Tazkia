<?php 
  if((isset($_GET['aksi']))&&(isset($_GET['data']))){
    if($_GET['aksi']=='hapus'){
    $kode_peserta = $_GET['data'];
  
    //get foto
    $sql_f = "SELECT `foto` FROM `peserta` WHERE `kode_peserta`='$kode_peserta'";
    $query_f = mysqli_query($koneksi,$sql_f);
    $jumlah_f = mysqli_num_rows($query_f);
    if($jumlah_f>0){
    while($data_f = mysqli_fetch_row($query_f)){
    $foto = $data_f[0];
  
    //menghapus foto dalam folder foto
    unlink("foto/$foto");
    }
  }
    //hapus adm
    $sql_dh = "delete from `adm_peserta` where `kode_peserta` = '$kode_peserta'";
    mysqli_query($koneksi,$sql_dh);
    //hapus data peserta
    $sql_dm = "delete from `peserta` where `kode_peserta` = '$kode_peserta'";
    mysqli_query($koneksi,$sql_dm);
    }
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data Peserta</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Peserta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data Peserta</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah_peserta" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Peserta</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <form method="post" action="index.php?include=peserta"> 
                    <div class="row">
                      <div class="col-md-4 bottom-10">
                        <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                      </div>
                      <div class="col-md-5 bottom-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  Search</button>
                      </div>
                    </div><!-- .row -->
                  </form> 
                </div><br><br><br>

                <br><br>
                <div class="col-sm-12">
                  <?php if(!empty($_GET['notif'])){?>
                    <?php if($_GET['notif']=="tambahberhasil"){?>
                      <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                    <?php } else if($_GET['notif']=="editberhasil"){?>
                      <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                    <?php }?>
                  <?php }?>
                </div>
                <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="25%">Kode Peserta</th>
                        <th width="40%">Nama</th>
                        <th width="20%">Paket Travel</th>
                        <th width="10%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $batas = 2;
                        if(!isset($_GET['halaman'])){
                          $posisi = 0;
                          $halaman = 1;
                        }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                        } 
                        //menampilkan data peserta
                        $sql_mhs = "select `m`.`kode_peserta`, `m`.`nama`, `j`.`travel` 
                                  from `peserta` `m`
                                  inner join `travel` `j` 
                                  on `m`.`kode_travel` = `j`.`kode_travel` "; 
                        if (isset($_POST["katakunci"])){
                            $katakunci_mhs = $_POST["katakunci"];
                            $sql_mhs .= " where `kode_peserta` LIKE '%$katakunci_mhs%' 
                            OR `nama` LIKE '%$katakunci_mhs%'";
                        } 
                        $sql_mhs .= " order by `m`.`kode_peserta` limit $posisi, $batas";

                        $query_mhs = mysqli_query($koneksi,$sql_mhs);
                        $no=$posisi+1;
                        while($data_mhs = mysqli_fetch_row($query_mhs)){
                          $kode_peserta = $data_mhs[0];
                          $nama = $data_mhs[1];
                          $travel = $data_mhs[2];
                        ?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $kode_peserta;?></td>
                            <td><?php echo $nama;?></td>
                            <td><?php echo $travel;?></td>
                            <td align="center">
                              <a href="index.php?include=edit_peserta&data=<?php echo $kode_peserta;?>" 
                              class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                              <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $kode_peserta.' - '.$nama; ?>?'))
                              window.location.href = 'index.php?include=peserta&aksi=hapus&data=<?php echo $kode_peserta;?>'" 
                              class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
                              <a href="index.php?include=detail_peserta&data=<?php echo $kode_peserta;?>" 
                              class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                          </tr>
                        <?php $no++; }?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
                //hitung jumlah semua data 
                $sql_jum = "select `m`.`kode_peserta`, `m`.`nama`, `j`.`travel` 
                            from `peserta` `m`
                            inner join `travel` `j` 
                            on `m`.`kode_travel` = `j`.`kode_travel` ";
                if (isset($_SESSION["katakunci_mhs"])){
                    $katakunci_mhs = $_SESSION["katakunci_mhs"];
                    $sql_jum .= " where `adm` LIKE '%$katakunci_mhs%'";
                } 
                $sql_jum .= " order by`m`.`kode_peserta`";

                $query_jum = mysqli_query($koneksi,$sql_jum);
                $jum_data = mysqli_num_rows($query_jum);
                $jum_halaman = ceil($jum_data/$batas);
              ?>

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <?php 
                  if($jum_halaman==0){
                  //tidak ada halaman
                  }else if($jum_halaman==1){
                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                  }else{
                    $sebelum = $halaman-1;
	                  $setelah = $halaman+1;                  
                      if($halaman!=1){
                        echo "<li class='page-item'><a class='page-link'
                        href='index.php?include=peserta&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=peserta&halaman=$sebelum'>«</a></li>";
                      }
                      for($i=1; $i<=$jum_halaman; $i++){
                          if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=peserta&halaman=$i'>$i</a></li>";
                          }else{
                            echo "<li class='page-item'>
                            <a class='page-link'>$i</a></li>";
                          }
                      }
                      if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link'  
                        href='index.php?include=peserta&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=peserta&halaman=$jum_halaman'>
                        Last</a></li>";
                      }
                    }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>