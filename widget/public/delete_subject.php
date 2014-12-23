<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>

<?php
	$current_subject  = find_subject_by_id($_GET["subject"], false);
	if(!$current_subject){
		redirect_to("manage_contents.php");
	}
	
	$pages_set = find_pages_for_subject($current_subject["id"], false);
	if(mysqli_num_rows($pages_set) > 0){
		$_SESSION["message"] = "Can't delete a subject with pages.";
		redirect_to("manage_contents.php?subject={$current_subject["id"]}");
	}
	
	$id = $current_subject["id"];
	$sql = "DELETE FROM subject
					WHERE id = '{$id}'
					LIMIT 1";
	$hasil = mysqli_query($koneksi,$sql);
	
	if($hasil && mysqli_affected_rows($koneksi) == 1){			
		//SUCCESS
		$_SESSION["message"] = "Subject deleted.";
		redirect_to("manage_contents.php");
	} else{
		//FAILURE
		$_SESSION["message"] = "Subject deletion failed.";
		redirect_to("manage_contents.php?subject={$id}");
	}
?>