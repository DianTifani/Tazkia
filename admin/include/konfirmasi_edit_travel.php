<?php 
	if(isset($_SESSION['kode_travel'])){
	  	$kode_travel = $_SESSION['kode_travel'];
		$travel = $_POST['travel'];
	 
			if(empty($travel)){
					header("Location:index.php?include=edit_travel&data=".$kode_travel." &notif=editkosong");
			}else{
				$sql = "update `travel` set `travel`='$travel' 
				where `kode_travel`='$kode_travel'";
				mysqli_query($koneksi,$sql);
				header("Location:index.php?include=travel&notif=editberhasil");
			}
			}
	?>
