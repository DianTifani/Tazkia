<?php
	$adm = $_POST['travel'];
	if(empty($adm)){
		header("Location:index.php?include=tambah_travel&notif=tambahkosong");
	}else{
		$sql = "insert into `travel` (`travel`) 
		values ('$adm')";
		mysqli_query($koneksi,$sql);
	header("Location:index.php?include=travel&notif=tambahberhasil");	
	}
	?>
