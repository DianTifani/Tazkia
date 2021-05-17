	<?php 
	if(isset($_SESSION['kode_adm'])){
	  	$kode_adm = $_SESSION['kode_adm'];
		$adm = $_POST['adm'];
	 
			if(empty($adm)){
					header("Location:index.php?include=edit_adm?data=".$kode_adm." &notif=editkosong");
			}else{
				$sql = "update `adm` set `adm`='$adm' 
				where `kode_adm`='$kode_adm'";
				mysqli_query($koneksi,$sql);
				header("Location:index.php?include=adm&notif=editberhasil");
			}
			}
	?>
