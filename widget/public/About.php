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
					<li><a href="<?php echo $subject['menu_name'];?>.php" ><?php echo $subject['menu_name'];?></a></li>
					<?php }?>
		</ul>
	</div>
	<!-- end #menu -->
	
	<div id="header">
		<h1>The Griffin Coffee Shop</h1>
		<h2>The Griffin Coffee Shop</h2>
	</div>
<!-- end #header -->
</div>
<!-- end #wrapper -->
	
   <div id="container">
	<div id="about">
		<div id="post">
				<h2 id="title"> About Us</h2>
				<div class="story">
					<ul>
					<?php while($page = mysqli_fetch_assoc($hasil)){?>
					<li><strong>				
				
				<?php echo $page['menu_name'];?>
					</strong></li>
					<li class="content-isi"><strong>				
				
				<?php echo $page['content'];?>
						</strong></li>
				<?php } ?>
					
						</ul>
					
					<h3>Selamat datang di website kami!</h3>
					<ul>
						<li>Kami harap kami dapat menyediakan informasi tentang
						perusahaan dan produk-produk kami untuk menambah wawasan anda.</li>
						<li>Kami menggunakan peralatan tangan, yang menghasilkan sekitar 50kg kopi bubuk per hari.</li>
						<li>Kita mengirim kopi bubuk tersebut ke toko-toko kecil, kios, dan petani.</li>
					</ul>
				</div>
		</div>
		<!-- end #contact -->
	</div>	
	<!-- end #container -->
	
<div id="container">
	<div id="footer">
	<p id="legal">Copyright &copy The Griffin Coffee Shop.</p>
	<p id="brand">The Griffin Coffee Shop</p>
	</div>
	</div>
    <!-- end #footer -->
   </div>
 </div>
<!-- end #container-->
</body>
</html>