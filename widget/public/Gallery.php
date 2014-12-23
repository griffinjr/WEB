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
<div id="gallery">
<div id="box">
<ul id="slider">
	<li id="1">
		<img src="images/coffee1.jpg" height="150" width="150">
	</li>
	<li id="2">
		<img src="images/coffee2.jpg" height="150" width="150">
	</li>
	<li id="3">
		<img src="images/coffee3.jpg" height="150" width="150">
	</li>
	<li id="4">
		<img src="images/coffee4.jpg" height="150" width="150">
	</li>
	<li>
		<img src="images/coffee5.jpg" height="150" width="150">
   </li>
</ul>

<ul id="thumb">
	<li><a href="#1"><img src="images/coffee1.jpg" height="25" width="25"></a></li>
	<li><a href="#2"><img src="images/coffee2.jpg" height="25" width="25"></a></li>
	<li><a href="#3"><img src="images/coffee3.jpg" height="25" width="25"></a></li>
	<li><a href="#4"><img src="images/coffee4.jpg" height="25" width="25"></a></li>
	<li><a href="#5"><img src="images/coffee5.jpg" height="25" width="25"></a></li>
</ul>
</div>

<div id="gallerycontent">
		<div id="post">
				<h2 id="title"> Gallery </h2>
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
				<div class="story">
					<p><strong>The Griffin Coffee Shop adalah pabrik kopi yang  telah menjalani usaha ini lebih
					dari 3 tahun. Kami bangga dengan warisan dan reputasi kami dalam memproduksi produk
					kopi yang inovatif dan bermutu tinggi yang sesuai dengan selera pelanggan kami yang berbeda-beda.
					</strong></p>
					
					<h3>Selamat datang di website kami!</h3>
					<ul>
						<li>Kami harap kami dapat menyediakan informasi tentang
						perusahaan dan produk-produk kami untuk menambah wawasan anda.</li>
						<li>Kami menggunakan peralatan tangan, yang menghasilkan sekitar 50kg kopi bubuk per hari.</li>
						<li>Kita mengirim kopi bubuk tersebut ke toko-toko kecil, kios, dan petani.</li>
					</ul>
				</div>
		</div>
	</div>
</div>
</div>
	
<div id="c_footer">
	<div id="footer">
	<p id="legal">Copyright &copy The Griffin Coffee Shop.</p>
	<p id="brand">The Griffin Coffee Shop</p>
	</div>
	</div>
<!--end footer-->
</div>
</body>
</html>