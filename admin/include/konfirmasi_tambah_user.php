<?php
	$id = $_POST['id_admin'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$level = $_POST['level'];

	if(empty($id)){
		header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=id_admin");
	}else if(empty($nama)){
		header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=nama");
	}else if(empty($email)){
		header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=email");
	}else if(empty($user)){
		header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=user");
	}else if(empty($level)){
		header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=level");
	}else{
		$sql = "insert into `admin` (`id_admin`, `nama`, `email`, `username`, `level`) 
		values ('$id', '$nama', '$email', '$user','$level')";
		mysqli_query($koneksi,$sql);
	header("Location:index.php?include=user&notif=tambahberhasil");	
	}

	?>