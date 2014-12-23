<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>

<?php $layout_context = "admin"?>
<?php include("../include/layout/header.php");?>
<?php find_selected_page(); ?>
		<div id="main">
			<div id="navigator">
				<?php echo navigation($current_subject, $current_page); ?>
			</div><!--navigator-->
			<div id="page">
					<?php echo message(); ?>
					<?php $errors = errors(); ?>
					<?php echo form_errors($errors); ?>
					<h2>Create Subject</h2>
					<form action="create_subject.php" method= "POST">
						<p>Menu name :
							<input type="text" name="menu_name"/>
						</p>
						<p>Position :
							<select name="position">
								<?php 
									$subject_set = find_all_subjects(false);
									$subject_count = mysqli_num_rows($subject_set);
									for($count = 1; $count <= ($subject_count + 1); $count++)
									{
										echo "<option value=\"{$count}\">{$count}</option>";
									}
								?>
								
							</select>
						</p>
						<p>Visible :
							<input type="radio" name="visible" value="0"/>No
							<input type="radio" name="visible" value="1"/>Yes
						</p>
						<input type="submit" name="submit" value="Create Subject"/>
					</form>
					</br>
					<a href="manage_contents.php">Cancel</a>
			</div><!--page-->	
		</div><!--main-->

<?php	include("../include/layout/footer.php");?>