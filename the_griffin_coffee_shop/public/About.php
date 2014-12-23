<?php require_once("../include/db_connection.php");?>
<?php include("../include/layout/headerweb.php");?>
<?php $sql = "SELECT * FROM subject ORDER BY position";
	$menu = mysqli_query($koneksi,$sql);
?>
<?php $sql = "SELECT * FROM page WHERE subject_id=12352 ORDER BY position";
	$aboutpage = mysqli_query($koneksi,$sql);
?>

<div id="container">
<div id="headmenu">
	<div id="menu">
		<ul>
			<?php while($subject = mysqli_fetch_assoc($menu)){?>
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
<!-- end #headmenu -->
<div id="container">
	<div id="about">
		<div id="post">
				<?php while($page = mysqli_fetch_assoc($aboutpage)){?>	
				<h2 id="title"><strong><?php echo $page['menu_name'];?></strong></h2>
				<div id="story">
				<p><strong><?php echo $page['content'];?></strong></P>
				<?php } ?>
				</div>
		</div>
		<!--end #post-->
	</div>
	</div>
	
<?php include("../include/layout/footerweb.php");?>