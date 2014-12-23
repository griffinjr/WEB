<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php
	if(isset($_POST["submit"])){
		$subject_id = $current_subject["id"];
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		$content = mysql_prep($_POST["content"]);
		
		//validations
		$required_fields = array("menu_name","position","visible","content");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("new_page.php?subject=" . urlencode($current_subject["id"]));
		} 
		
		$sql = "INSERT INTO page (subject_id, menu_name, position, visible, content)
					VALUES ({$subject_id},'{$menu_name}',{$position},{$visible},'{$content}')";
		$hasil = mysqli_query($koneksi,$sql);
		
		if($hasil){
		//SUCCESS
			$_SESSION["message"] = "Page created.";
			redirect_to("manage_contents.php");
		} else{
		//FAILURE
			$_SESSION["message"]  = "Page creation failed.";
			redirect_to("new_page.php");
		}
	
	} else{
		redirect_to("new_page.php");
	}
?>
<?php
	if(isset($koneksi)){	mysqli_close($koneksi);}
?>