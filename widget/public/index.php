<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php $layout_context = "public"?>
<?php include("../include/layout/header.php");?>
<?php find_selected_page(true); ?>

		<div id="main">
			<div id="navigator">
				<?php echo public_navigation($current_subject, $current_page); ?>
			</div><!--navigator-->
			<div id="page">
					<?php if($current_page) {?>
					<h2><?php echo  htmlentities($current_page["menu_name"]); ?></h2>
					<?php echo  nl2br(htmlentities($current_page["content"]));?>
					<?php } else { ?>
						
						<p>Welcome To The Gri n' Zee Shop! 
<?php $logo = mysqli_fetch_assoc($hasil);?>
<img src="<?php echo $logo('file');?>"/></p>
						
					<?php } ?>
			</div><!--page-->	
		</div><!--main-->

<?php	include("../include/layout/footer.php");?>