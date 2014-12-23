<?php include("../include/layout/header.php");?>
<?php $layout_context = "admin";?>	
<?php require_once("../include/function.php");?>

		<div id="main">
		<div id="navigation">
			&nbsp;
		</div>
		
		<div id="page">
		<div id="container">
			<h2>Admin Menu</h2>
			<p>Welcome to the Admin Server</p>
			<ul>
				<li><a href="manage_contents.php">Manage Website Content</a></li>
				<li><a href="manage_admins.php">Manage Admin Users</a></li>
				<li><a href="picture.php">Upload Gambar</a></li>
				<li><a href="home.php">WebPage</a></li>
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div>
		</div>
		</div>
<?php include("../include/layout/footer.php");?>	