<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>

<?php
	if(isset($_POST["submit"])){
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		
		//validations
		$required_fields = array("menu_name","position","visible");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("new_subject.php");
		} 
		
		$sql = "INSERT INTO subject (menu_name, position, visible)
					VALUES ('{$menu_name}',{$position},{$visible})";
		$hasil = mysqli_query($koneksi,$sql);
		
		if($hasil){
		//SUCCESS
			$_SESSION["message"] = "Subject created.";
			redirect_to("manage_contents.php");
		} else{
		//FAILURE
			$_SESSION["message"]  = "Subject creation failed.";
			redirect_to("new_subject.php");
		}
	
	} else{
		redirect_to("new_subject.php");
	}
?>
<?php
	if(isset($koneksi)){	mysqli_close($koneksi);}
?>