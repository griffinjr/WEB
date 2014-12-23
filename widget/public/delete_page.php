<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>

<?php
$current_page=find_page_by_id($_GET["page"], false);
	if(!$current_page){
		redirect_to("manage_contents.php");
	}
	
	$id = $current_page["id"];
	$sql = "DELETE FROM page
				WHERE id = '{$id}'
				LIMIT 1";
				
	$hasil = mysqli_query($koneksi,$sql);
	
	if($hasil && mysqli_affected_rows($koneksi) == 1){			
		//SUCCESS
		$_SESSION["message"] = "Page deleted.";
		redirect_to("manage_contents.php");
	} else{
		//FAILURE
		$_SESSION["message"] = "Page deletion failed.";
		redirect_to("manage_contents.php?subject={$id}");
	}
?>