<?php
session_start();
include("../koneksi/koneksi.php");
if(isset($_GET["include"])){
	$include = $_GET["include"];
		if($include=="konfirmasi_login"){
		    include("include/konfirmasi_login.php");
		}else if($include=="sign_out"){
			include("include/sign_out.php");
			
		}else if($include=="konfirmasi_tambah_adm"){
			include("include/konfirmasi_tambah_adm.php");
		}else if($include=="konfirmasi_edit_adm"){
			include("include/konfirmasi_edit_adm.php");

		}else if($include=="konfirmasi_tambah_peserta"){
			include("include/konfirmasi_tambah_peserta.php");
		}else if($include=="konfirmasi_edit_peserta"){
			include("include/konfirmasi_edit_peserta.php");
		

		}else if($include=="konfirmasi_tambah_travel"){
			include("include/konfirmasi_tambah_travel.php");
		}else if($include=="konfirmasi_edit_travel"){
			include("include/konfirmasi_edit_travel.php");
		
		}else if($include=="konfirmasi_tambah_user"){
			include("include/konfirmasi_tambah_user.php");
		}else if($include=="konfirmasi_edit_user"){
			include("include/konfirmasi_edit_user.php");
		
		}else if($include=="konfirmasi_edit_profil"){
			include("include/konfirmasi_edit_profil.php");
		}
					
	}	
?>
<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?>	
</head>
<?php
	//cek ada get include
	if(isset($_GET["include"])){
		$include = $_GET["include"];
		//cek apakah ada session id admin
		if(isset($_SESSION['id_admin'])){
			//pemanggilan ke halaman-halaman menu admin
	    ?>
	    <body class="hold-transition sidebar-mini layout-fixed">
			<div class="wrapper">
				<?php include("includes/header.php") ?>
				<?php include("includes/sidebar.php") ?>
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<?php
						if($include=="adm"){
							include("include/adm.php");
						}else if($include=="tambah_adm"){
							include("include/tambah_adm.php");
						}else if($include=="edit_adm"){
							include("include/edit_adm.php");

						}else if($include=="peserta"){
							include("include/peserta.php");
						}else if($include=="tambah_peserta"){
							include("include/tambah_peserta.php");
						}else if($include=="edit_peserta"){
							include("include/edit_peserta.php");
						}else if($include=="detail_peserta"){
							include("include/detail_peserta.php");

						}else if($include=="travel"){
							include("include/travel.php");
						}else if($include=="tambah_travel"){
							include("include/tambah_travel.php");
						}else if($include=="edit_travel"){
							include("include/edit_travel.php");

						}else if($include=="user"){
							include("include/user.php");
						}else if($include=="tambah_user"){
							include("include/tambah_user.php");
						}else if($include=="edit_user"){
							include("include/edit_user.php");

						}else if($include=="profil"){
							include("include/profil.php");
						}else if($include=="edit_profil"){
							include("include/edit_profil.php");

						}else{
							include("include/kelompok.php");
					}?>
					 <!-- /.content -->
					</div>
					<!-- /.content-wrapper -->
					<?php include("includes/footer.php") ?>
				</div>
				<!-- ./wrapper -->
				<?php include("includes/script.php") ?>
		</body>
			<?php    
	  }else{
		//pemanggilan halaman form login
		include("include/login.php");
	  }  
	}else{
	  //pemanggilan halaman form login
	  include("include/login.php");
	}
	?>

</html>
