<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php
	if(isset($_POST["submit"])){
		$username = mysql_prep($_POST["username"]);
		$hashed_password = password_encrypt($_POST["password"]);
		
		//validations
		$required_fields = array("username","password");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("username" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("new_admin.php");
		} 
		
		$sql = "INSERT INTO admin (username, hashed_password)
					VALUES ('{$username}','{$hashed_password}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		if($hasil){
		//SUCCESS
			$_SESSION["message"] = "Admin created.";
			redirect_to("manage_admins.php");
		} else{
		//FAILURE
			$_SESSION["message"]  = "Admin creation failed.";
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
					<h2>Create Admin</h2>
					<form action="new_admin.php" method= "POST">
						<p>Username :
							<input type="text" name="username"/>
						</p>
						<p>Password :
							<input type="password" name="password"/>
						</p>
						<input type="submit" name="submit" value="Create Admin"/>
					</form>
					</br>
					<a href="manage_admins.php">Cancel</a>
			</div><!--page-->	
		</div><!--main-->
		
<?php	include("../include/layout/footer.php");?>