<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php
$judul = $_POST['judul'];
$ket = $_POST['body'];

$file_name = $_FILES['gambar']['name'];
$file_size = $_FILES['gambar']['size'];
$file_tmp = $_FILES['gambar']['tmp_name'];

$file_ext= strtolower(end(explode(".", $file_name)));
$ext_boleh = array("jpg","jpeg","png","gif","bmp");

if(in_array($file_ext, $ext_boleh) ){
	//EXT FILE DIPERBOLEHKAN
	if($file_size <= 2*1024*1024){
		
		$sumber = $file_tmp;
		$tujuan = "images/".$file_name;
		move_uploaded_file($sumber, $tujuan);
	
		//2. masukkan query
		$sql = "INSERT INTO gallery(title, body, file)
					VALUES ('$judul', '$ket', '$tujuan')";
		mysqli_query($koneksi,$sql);
		
		if(mysqli_error($koneksi)){
			echo "Upload gambar gagal";
			echo mysqli_error($koneksi);
			die();
		}
		header("Location: admin.php");
	} else{
		echo "Ukuran gambar max 2MB";
	}
} else{
	//EXT FILE DILARANG
	echo "Jenis file yang diperbolehkan hanya gambar.";
}

?>