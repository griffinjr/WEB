<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php
	$admin = find_admin_by_id($_GET["id"]);
	if(!$admin){
		redirect_to("manage_admin.php");
	}
?>
<?php
	if(isset($_POST["submit"])){
		$id = $admin["id"];
		$username = mysql_prep($_POST["username"]);
		$hashed_password = password_encrypt($_POST["password"]);
		
		//validations
		$required_fields = array("username","password");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("username" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("edit_admin.php?id=". urlencode($admin["id"]));
		} 
		
		$sql = "UPDATE admin SET 
					username = '{$username}',
					hashed_password = '{$hashed_password}'
					WHERE id = {$id}
					LIMIT 1";
		$hasil = mysqli_query($koneksi, $sql);
		
		if($hasil &&  mysqli_affected_rows($koneksi) == 1){
		//SUCCESS
			$_SESSION["message"] = "Admin updated.";
			redirect_to("manage_admins.php");
		} else{
		//FAILURE
			$_SESSION["message"]  = "Admin update failed.";
		}
	
	} else{
		
	}
?>
<?php $layout_context = "admin"?>
<?php include("../include/layout/header.php");?>
		<div id="main">
			<div id="navigator">
			</div><!--navigator-->
			<div id="page">
					<?php echo message(); ?>
					<?php $errors = errors(); ?>
					<?php echo form_errors($errors); ?>
					<h2>Edit Admin: <?php echo htmlentities($admin["username"]); ?></h2>
					<form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method= "POST">
						<p>Username :
							<input type="text" name="username" value="<?php  echo htmlentities($admin["username"]); ?>" />
						</p>
						<p>Password :
							<input type="password" name="password"/>
						</p>
						<input type="submit" name="submit" value="Edit Admin"/>
					</form>
					</br>
					<a href="manage_admins.php">Cancel</a>
			</div><!--page-->	
		</div><!--main-->
		
<?php	include("../include/layout/footer.php");?>	