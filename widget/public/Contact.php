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
</div>
<!-- end #wrapper -->
	
	<div id="contact">
		<h1><br>Hubungi Kami</h1><br>
		<p>Masukkan kritik/saran dan informasi anda</p>

		
		<form action="send.html">
		<table>
		<tr>
		 <td><label>Nama</label></td>
		 <td><input type="text"
		 name="nama"/>
		 </td>
		</tr>
		
		<tr>
		 <td><label>Gender</label></td>
	     <td><input type="radio"
		 name="gender"
		 value="laki-laki"/>Laki-laki
		 <input type="radio"
		 name="gender"
		 value="perempuan"/>Perempuan
		 </td>										
		</tr>
		
		<tr>
		 <td><label>No. Telp</label></td>
		 <td><input type="text"
		 name="telp"/>
		</tr>
		
		<tr>
		 <td><label>Alamat E-mail</label></td>
		 <td><input type="text"
		 name="e-mail"/>
		 </td>
		</tr>
		
		<tr>
		 <td><label>Pesan Anda</label></td>
		 <td><textarea rows="5" class="box" name="pesan">
		 </textarea>
		 </td>
		 </td>
		</tr>
		
		<tr>
		 <td><input type="submit"
		 name="send"
		 value="Kirim"/>
		 </td>
		</tr>
		
		</table>
	    <p>	Terima kasih atas pertanyaan yang diajukan, kami akan meresponse pertanyaan anda sesegera mungkin.</p>
		</form>
		</div>
	<!--end contact-->
	
	
	
<div id="container">
	<div id="footer">
	<p id="legal">Copyright &copy The Griffin Coffee Shop.</p>
	<p id="brand">The Griffin Coffee Shop</p>
	</div>
	</div>
	<!--end footer-->
  </div>
  <!--end #container-->
</body>
</html>