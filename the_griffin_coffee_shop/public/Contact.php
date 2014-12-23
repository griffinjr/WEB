<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/session.php");?>
<?php require_once("../include/function.php");?>
<?php include("../include/layout/headerweb.php");?>
<?php $sql = "SELECT * FROM subject ORDER BY position";
	$menu = mysqli_query($koneksi,$sql);
?>


<?php
	if(isset($_POST["send"])){
		$contact_id = (int)($_POST["contact_id"]);
		$nama = mysql_prep($_POST["nama"]);
		$jenis = (int) $_POST["jenis"];
		$telepon = (int) $_POST["telepon"];
		$email = mysql_prep($_POST["email"]);
		$pesan = mysql_prep($_POST["pesan"]);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("contact.php");
		} 
		
		$sql = "INSERT INTO contact (contact_id, nama, jenis, telepon, email, pesan)
					VALUES ({$contact_id},'{$nama}',{$jenis},{$telepon},'{$email}','{$pesan}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		if($hasil){
		//SUCCESS
			$_SESSION["message"] = "Terima Kasih Pesan Terkirim.";
			redirect_to("contact.php");
		} else{
		//FAILURE
			$_SESSION["message"]  = "Gagal, Silahkan Coba Lagi.";
		}
	
	} else{
		
	}
?>

<div id="container">
<div id="headmenu">
	<div id="menu">
		<ul>
			<?php while($subject = mysqli_fetch_assoc($menu)){?>
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
<!-- end #headmenu -->

	<div id="contact">
	<?php $errors = errors(); ?>
		<h1><br>Hubungi Kami</h1>
		<p>Masukkan kritik/saran dan informasi anda</p>
		<form action="contact.php" method= "POST";>
		<table>
		<tr>
		 <td><label>Nama</label></td>
		 <td><input type="text" name="nama"/>
		 </td>
		</tr>
		
		<tr>
		 <td><label>Gender</label></td>
	     <td>
		 <input type="radio" name="jenis" value="1"/>Laki-laki
		 <input type="radio" name="jenis" value="0"/>Perempuan
		 </td>										
		</tr>
		
		<tr>
		 <td><label>No. Telp</label></td>
		 <td><input type="text"
		 name="telepon"/>
		</tr>
		
		<tr>
		 <td><label>Alamat E-mail</label></td>
		 <td><input type="text"
		 name="email"/>
		 </td>
		</tr>
		
		<tr>
		 <td><label>Pesan Anda</label></td>
		 <td><textarea cols = "30" rows="5" class="box" name="pesan">
		 </textarea>
		 </td>
		 </td>
		</tr>
		
		<tr>
		 <td><input type="submit" name="send" value="Send"/></td>
		</tr>
		
		</table>
	    <p>	Terima kasih atas pertanyaan yang telah diajukan, </br>Kami akan meresponse pertanyaan anda sesegera mungkin.</p>
		<p><?php echo message(); ?></p>
		</form>
	</div>
	<!--end contact-->
	
<?php include("../include/layout/footerweb.php");?>