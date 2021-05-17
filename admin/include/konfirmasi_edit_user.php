<?php 
	if(isset($_SESSION['kode_user'])){
	  	$kode_user = $_SESSION['kode_user'];
		$user = $_POST['user'];
	 
			if(empty($hobi)){
					header("Location:index.php?include=edit_user&data=".$kode_user." &notif=editkosong");
			}else{
				$sql = "update `user` set `user`='$user' 
				where `kode_user`='$kode_user'";
				mysqli_query($koneksi,$sql);
				header("index.php?include=Location:user&notif=editberhasil");
			}
			}
	?>