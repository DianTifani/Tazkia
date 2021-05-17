	<?php
	if(isset($_SESSION['kode_peserta'])){
		$kode_peserta = $_SESSION['kode_peserta'];
		$nama = $_POST['nama'];
		$kode_travel = $_POST['travel'];
	 
		$_SESSION['nama']=$nama;
		$_SESSION['travel']=$kode_travel;
		
	if(empty($kode_peserta)){
	header("Location:index.php?include=tambah_peserta&notif=editkosong&jenis=kode_peserta");
	}else if(empty($nama)){
	header("Location:index.php?include=tambah_peserta&notif=editkosong&jenis=nama");
	}else if(empty($kode_travel)){
	header("Location:index.php?include=tambah_peserta&notif=editkosong&jenis=travel");
	}else{
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $kode_peserta.".jpg";
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
			$sql = "update `peserta` set `nama`='$nama', 
			`kode_travel`='$kode_travel', `foto`='$nama_file'
			where `kode_peserta` = '$kode_peserta'";
			mysqli_query($koneksi,$sql);
		}else{
			$sql = "update `peserta` set `nama`='$nama', 
			`kode_travel`='$kode_travel'
			where `kode_peserta` = '$kode_peserta'";
			mysqli_query($koneksi,$sql);
		}
		//hapus adm
		$sql_d = "delete from `adm_peserta` where `kode_peserta`='$kode_peserta'";
		mysqli_query($koneksi,$sql_d);
		//tambah adm
		if(isset($_POST['adm'])){
		  foreach($_POST['adm'] as $kode_adm){
		    $sql_i = "insert into `adm_peserta` 
	            (`kode_peserta`, `kode_adm`) 
		     values ('$kode_peserta', '$kode_adm')";
		     mysqli_query($koneksi,$sql_i);
		  }
		}
		unset($_SESSION['kode_peserta']);
		unset($_SESSION['nama']);
    	unset($_SESSION['travel']);
		header("Location:index.php?include=peserta&notif=editberhasil");
	   }
	}
	?>
