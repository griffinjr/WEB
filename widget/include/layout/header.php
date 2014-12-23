<?php
	if(!isset($layout_context)){
		$layout_context = "public";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The Griffin Coffee Shop<?php if($layout_context == "admin") { echo "admin";} ?></title>
		<link rel="stylesheet" type="text/css" href="stylesheets/public.css"/>
	</head>
	<body>
		<div id="header">
			<h1>The Griffin Coffee Shop <?php if($layout_context == "admin") { echo "admin";} ?></h1>
		</div><!--header-->