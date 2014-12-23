<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php
$admin = find_admin_by_id($_GET["id"]);
	if(!$admin){
		redirect_to("manage_admins.php");
	}
?>
<?php
	$id = $admin["id"];
	$sql = "DELETE FROM admin
					WHERE id = '{$id}'
					LIMIT 1";
	$hasil = mysqli_query($koneksi,$sql);
	
	if($hasil && mysqli_affected_rows($koneksi) == 1){			
		//SUCCESS
		$_SESSION["message"] = "Admin deleted.";
		redirect_to("manage_admins.php");
	} else{
		//FAILURE
		$_SESSION["message"] = "Admin deletion failed.";
		redirect_to("manage_admins.php");
	}
?>