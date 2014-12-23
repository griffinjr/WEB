<div id="footer">
			Copyright <?php echo date("Y");?> &copy;The Griffin Coffee Shop
		</div><!--footer-->
	</body>
</html>
<?php
//5. tutup koneksi
if(isset($koneksi)){
	mysqli_close($koneksi);
}
?>