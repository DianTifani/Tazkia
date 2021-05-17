<?php 
	$kode_peserta = $_POST['kode_peserta'];
	$nama = $_POST['nama'];
	$kode_travel = $_POST['travel'];
	 
	$_SESSION['kode_peserta']=$kode_peserta;
	$_SESSION['nama']=$nama;
	$_SESSION['travel']=$kode_travel;
	if(empty($kode_peserta)){
	header("Location:index.php?include=tambah_peserta&notif=tambahkosong&jenis=kode_peserta");
	}else if(empty($nama)){
	header("Location:index.php?include=tambah_peserta&notif=tambahkosong&jenis=nama");
	}else if(empty($kode_travel)){
	header("Location:index.php?include=tambah_peserta&notif=tambahkosong&data=travel");
	}else{
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $kode_peserta.".jpg";
	$direktori = 'foto/'.$nama_file;
	if(move_uploaded_file($lokasi_file,$direktori)){
	$sql = "insert into `peserta` 
	(`kode_peserta`, `nama`, `kode_travel`, `foto`) 
	values ('$kode_peserta', '$nama', '$kode_travel', '$nama_file')";
	mysqli_query($koneksi,$sql);
	}else{
	$sql = "insert into `peserta` (`kode_peserta`, `nama`, `kode_travel`) 
	values ('$kode_peserta', '$nama', '$kode_travel')";
	mysqli_query($koneksi,$sql);
	}
	if(isset($_POST['adm'])){
	   foreach($_POST['adm'] as $kode_adm){
	     $sql_i = "insert into `adm_peserta` (`kode_peserta`, `kode_adm`) 
	     values ('$kode_peserta', '$kode_adm')";
	     mysqli_query($koneksi,$sql_i);
	   }
	}
	unset($_SESSION['kode_peserta']);
	unset($_SESSION['nama']);
	unset($_SESSION['travel']);
	header("Location:index.php?include=peserta&notif=tambahberhasil");
	}
	?>
