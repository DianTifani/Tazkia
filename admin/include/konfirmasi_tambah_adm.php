<?php
	$adm = $_POST['adm'];
	if(empty($adm)){
		header("Location:index.php?include=tambah_adm&notif=tambahkosong");
	}else{
		$sql = "insert into `adm` (`adm`) 
		values ('$adm')";
		mysqli_query($koneksi,$sql);
	header("Location:index.php?include=adm&notif=tambahberhasil");	
	}
	?>
