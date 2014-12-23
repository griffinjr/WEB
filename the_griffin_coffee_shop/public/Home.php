<?php require_once("../include/session.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/db_connection.php");?>
<?php include("../include/layout/headerweb.php");?>
<?php $layout_context = "public"?>
<?php find_selected_page(true); ?>
<?php $sql = "SELECT * FROM page WHERE subject_id=12350 ORDER BY position";
	$homepage = mysqli_query($koneksi,$sql);
?>
<?php $sql = "SELECT * FROM subject ORDER BY position";
	$menu = mysqli_query($koneksi,$sql);
?>
<?php $sql = "SELECT * FROM subject ORDER BY position";
	$categories = mysqli_query($koneksi,$sql);
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
	<!-- end #headmenu-->
	
	<div id="c_content">
	<div id="content">
		<div id="posts">
			<div id="post">
				<?php while($page = mysqli_fetch_assoc($homepage)){?>
				<h2 class="title">
				<?php echo $page['menu_name'];?>
				</h2>
				<div id="story">
					<p><em><ul><strong><?php echo $page['content'];?></strong> </ul></em></p>
				</div>
				<?php }?>
			
			</div>
		</div>
		<!-- end #posts -->
		<div id="categories">
			<h2>Categories</h2>
					<ul>
					<?php while($subject = mysqli_fetch_assoc($categories)){?>
					<li><a href="<?php echo $subject['menu_name'];?>.php" >
					<?php echo $subject['menu_name'];?></a></li>
					<?php }?>
					<li><a href="login.php">Login</a></li>
					</ul>
		</div>
		<!-- end #categories -->
</div>
<!-- end #content -->
</div>
<!-- end #c_content-->
			
<?php include("../include/layout/footerweb.php");?>
