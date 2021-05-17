	<?php 
	if(isset($_SESSION['id_admin'])){
		$id_admin = $_SESSION['id_admin'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
	 
		if(empty($nama)){
		header("Location:index.php?include=edit_profil&notif=editkosong&jenis=nama");
		}else if(empty($email)){
		header("Location:index.php?include=edit_profil&notif=editkosong&jenis=email");
		}else{
			$sql = "update `admin` set `nama`='$nama', `email`='$email' 
			where `id_admin`='$id_admin'";
			mysqli_query($koneksi,$sql);
	 	header("Location:index.php?include=profil&notif=editberhasil");
		}
	}
	 
	?>
