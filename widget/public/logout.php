<?php require_once("../include/session.php");?>
<?php require_once("../include/function.php");?>
<?php
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("login.php");
?>