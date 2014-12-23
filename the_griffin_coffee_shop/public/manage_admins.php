<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php
	$admin_set = find_all_admins();
?>
<?php $layout_context = "admin"?>
<?php	include("../include/layout/header.php");?>
	<div id="main">
		<div id="navigator">
				</br>
				<a href="admin.php">&laquo; Main menu</a></br>
		</div><!--navigator-->
		<div id="page">
				<?php echo message();?>
				<h2>Manage Admin</h2>
				<table>
					<tr>
						<th style="text-align:left; width:200px;">Username</th>
						<th colspan="2" style="text-align:left;">Actions</th>
					</tr>
					<?php
						while($admin = mysqli_fetch_assoc($admin_set)){
					?>
						<tr>
							<td><?php echo htmlentities($admin["username"]); ?></br>
									<?php //echo htmlentities($admin["hashed_password"]); ?>
							</td>
							<td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a></td>
							<td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Delete</a></td>
						</tr>
					<?php } ?>
				</table>
				</br>
				<a href="new_admin.php">Add new admin</a>
				<hr>
			</div><!--page-->	
		</div><!--main-->

<?php	include("../include/layout/footer.php");?>	