<?php
	if(!isset($layout_context)){
		$layout_context = "public";
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<title>The Griffin Coffee Shop<?php if($layout_context == "admin") { echo "admin";} ?></title>
</head>
<body>
