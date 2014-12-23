<?php require_once("../include/db_connection.php");?>
<?php $sql = "SELECT * FROM page";
	$hasil = mysqli_query($koneksi,$sql);
?>
<?php $sql = "SELECT * FROM subject ORDER BY position";
	$hasil = mysqli_query($koneksi,$sql);
?>
<html>
<head>
<title>The Griffin Coffee Shop</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
<div id="wrapper">
	<div id="menu">
		<ul>
			<?php while($subject = mysqli_fetch_assoc($hasil)){?>
					<li><a href="<?php echo $subject['menu_name'];?>.php" >
					<?php echo $subject['menu_name'];?></a></li>
					<?php }?>
		</ul>
		</div>
	<!-- end #menu -->
		<div id="header">
		<h1>The Griffin Coffee Shop</h1>
		<h2>The Griffin Coffee Shop</h2>
		</div>
		<!-- end #header -->	
	<div id="content">
		<div id="posts">
			<div id="post">
				<?php while($page = mysqli_fetch_assoc($hasil)){?>
				<h2 class="title">
				
				<?php echo $page['menu_name'];?>
				</h2>
				<div class="story">
					<p><em><strong><?php echo $page['content'];?></strong></em></p>
				</div>
				<?php }?>
			</div>
			<div id="post">
				<h2 id="title">A Few Examples of Common Tags</h2>
				<div id="story">
					<p><strong>This is an example of a paragraph.</p>
					<h3>Heading Level Three</h3>
					<p>Example:</p>
					<ul>
						<li>List item number one</li>
						<li>List item number two</li>
						<li>List item number three </li>
					</ul>
					<p>Example:</p>
					<ol>
						<li>List item number one</li>
						<li>List item number two</li>
						<li>List item number three</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- end #posts -->
		<div id="links">
			<ul>
				<li>
					<h2>Categories</h2>
					<ul>
						<li><a href="#">contoh</a></li>
						<li><a href="#">contoh</a></li>
						<li><a href="#">contoh</a></li>
						<li><a href="#">contoh</a></li>
						<li><a href="#">contoh</a></li>
						<li><a href="#">contoh</a></li>
						<li><a href="#">contoh</a></li>
					</ul>
				</li>
 
			</ul>
		</div>
		<!-- end #links -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
<!-- end #content -->
<div id="container">
<div id="footer">
	<p id="legal">Copyright &copy The Griffin Coffee Shop.</p>
	<p id="brand">The Griffin Coffee Shop</p>
</div>
</div>
<!--end footer-->
</div>
<!-- end #container -->
</body>
</html>
