<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-database"></i> Administrasi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Administrasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Administrasi</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah_adm" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Administrasi</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=adm">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
                  <?php if(!empty($_GET['notif'])){?>
                    <?php if($_GET['notif']=="tambahberhasil"){?>
                        <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                    <?php } else if($_GET['notif']=="editberhasil"){?>
              	       <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                    <?php }?>
                  <?php }?>
            	</div>
              </div>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No</th>
                      <th width="80%">Administrasi</th>
                      <th width="15%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?PHP
                      $batas = 2;
                          if(!isset($_GET['halaman'])){
                              $posisi = 0;
                              $halaman = 1;
                          }else{
                            $halaman = $_GET['halaman'];
                              $posisi = ($halaman-1) * $batas;
                          } 
                      ?>
                  	<?php
                        //menampilkan data adm
                          $sql_h = "SELECT `kode_adm`, `adm` FROM `adm`";
                        	if(isset($_POST["katakunci"])){
                        	$katakunci_adm = $_POST["katakunci"];
                        	$_SESSION['katakunci_adm'] = $katakunci_adm;
                        	$sql_h .= " where `adm` LIKE '%$katakunci_adm%'";
                        	} 
                        	$sql_h .= " order by `adm` limit $posisi, $batas ";
                        
                          $query_h = mysqli_query($koneksi,$sql_h);
                          $no=$posisi+1;
                          while($data_h = mysqli_fetch_row($query_h)){
                          $kode_adm = $data_h[0];
                          $adm = $data_h[1];
                     ?>	
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $adm;?></td>
                          <td>
                          <a href="index.php?include=edit_adm&data=<?php echo $kode_adm;?>" class="btn btn-xs btn-info">
                          <i class="fas fa-edit"></i> Edit</a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $adm; ?>?')) window.location.href = 'index.php?include=adm&aksi=hapus&data=<?php echo $kode_adm;?>'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus 
                          </a> 
                        </td>
                        </tr>
                        <?php
                        $no++;
                      }?>
                  </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
              	<?php
                    //hitung jumlah semua data 
                    	$sql_jum = "select `kode_adm`, `adm` from `adm`"; 
                      if (isset($_SESSION['katakunci_adm'])){
                      $katakunci_adm = $_SESSION['katakunci_adm'];
                      $sql_jum .= " where `adm` LIKE '%$katakunci_adm%'";
                       } 
                      $sql_jum .= " order by `kode_adm`";

                      $query_jum = mysqli_query($koneksi,@$sql_jum);
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
                              href='index.php?include=adm&halaman=1'>First</a></li>";
                              echo "<li class='page-item'><a class='page-link' 
                              href='index.php?include=adm&halaman=$sebelum'>??</a></li>";
                    	     }
                           for($i=1; $i<=$jum_halaman; $i++){
                              if($i!=$halaman){
                                      echo "<li class='page-item'><a class='page-link' 
                                      href='index.php?include=adm&halaman=$i'>$i</a></li>";
                              }else{
                                      echo "<li class='page-item'>
                                      <a class='page- link'>$i</a></li>";
                              }
                           }
                        if($halaman!=$jum_halaman){
                          	  echo "<li class='page-item'><a class='page-link'  
                                    href='index.php?include=adm&halaman=$setelah'>??</a></li>";
                              echo "<li class='page-item'><a class='page-link' 
                                    href='index.php?include=adm&halaman=$jum_halaman'>
                                    Last</a></li>";
                          }
                          
                      	}?>
                    	</ul>
                      

              </div>
            </div>
            <!-- /.card -->

    </section>