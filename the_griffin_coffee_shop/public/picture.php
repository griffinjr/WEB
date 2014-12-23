<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php include("../include/layout/header.php");?>
<?php $layout_context = "admin";?>

<div id="container">
<h2>Gallery</h2>
<form action="upload.php"
			method="POST"
			enctype="multipart/form-data">
<pre>
Title:
<input type="text"
			name="judul"/><br/>
Body:
<textarea name="body" rows="5" cols="50"></textarea></br>
File:
<input type="file"
			name="gambar"/><br/>
<input type="submit"
			name="simpan"
			value="Save"/><br/>		
</pre>
</form>
<form action="admin.php">
<input type="submit" name="cancel" value="Cancel"/>
</form>
</div>
<?php	include("../include/layout/footer.php");?>	