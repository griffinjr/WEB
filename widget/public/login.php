<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php
	$username = "";
	if(isset($_POST["submit"])){
		//validations
		$required_fields = array("username","password");		
		validate_presences($required_fields);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("login.php");
		}
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$found_admin = attempt_login($username, $password);
		
		
		if($found_admin){
		//SUCCESS
			$_SESSION["admin_id"] = $found_admin["id"]; 
			$_SESSION["username"] = $found_admin["username"]; 
			redirect_to("admin.php");
		} else{
		//FAILURE
			$_SESSION["message"]  = "Username/password not found.";
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
					<h2>Login</h2>
					<form action="login.php" method= "POST">
						<p>Username :
							 <input type="text" name="username" value="" />
						</p>
						<p>Password :
							 <input type="password" name="password"/>
						</p>
						<input type="submit" name="submit" value="Submit"/>
					</form>
			</div><!--page-->	
		</div><!--main-->
		
<?php	include("../include/layout/footer.php");?>	