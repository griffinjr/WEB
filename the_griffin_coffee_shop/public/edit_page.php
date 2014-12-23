<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php find_selected_page(); ?>
<?php
	if(!$current_page){
		redirect_to("manage_content.php");
	}
?>

<?php
	if(isset($_POST["submit"])){
		$id = $current_page["id"];
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		$content = mysql_prep($_POST["content"]);	
		
		//validations
		$required_fields = array("menu_name","position","visible","content");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(empty($errors)){
		
			$sql = "UPDATE page SET 
							menu_name = '{$menu_name}',
							position = {$position},
							visible = {$visible},
							content = '{$content}'
							WHERE id = {$id}
							LIMIT 1";
							
			$hasil = mysqli_query($koneksi,$sql);
			
			if($hasil && mysqli_affected_rows($koneksi) == 1){
			//SUCCESS
				$_SESSION["message"] = "Page updated.";
				redirect_to("manage_contents.php");
			} else{
			//FAILURE
				$message  = "Page update failed.";
			}
	}
	 else{
		
	}
}
?>
<?php $layout_context = "admin"?>
<?php include("../include/layout/header.php");?>

		<div id="main">
			<div id="navigator">
				<?php echo navigation($current_subject, $current_page); ?>
			</div><!--navigator-->
			<div id="page">
					<?php
						if(!empty($message)){
							echo "<div class=\"message\" >". htmlentities($message) . "</div>";
						}
					?>
					<?php echo form_errors($errors); ?>
					<h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]); ?></h2>
					<form action="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>" method= "POST">
						<p>Menu name :
							<input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>"/>
						</p>
						<p>Position :
							<select name="position">
								<?php 
									$page_set = find_pages_for_subject($current_page["subject_id"], false);
									$page_count = mysqli_num_rows($page_set); 
									for($count = 1; $count <= $page_count; $count++)
									{
										echo "<option value=\"{$count}\">{$count}</option>";
									}
								?>
							</select>
						</p>
						<p>Visible :
							<input type="radio" name="visible" value="0"
							<?php 
								if($current_page["visible"] == 0){
									{echo " checked";}
								}
							?>/>No
							<input type="radio" name="visible" value="1"
							<?php 
								if($current_page["visible"] == 1){
									{echo " checked";}
								}
							?>/>Yes
						</p>
						<p>Content:
							</br>
							<textarea name="content" rows="10" cols="80">
							<?php echo htmlentities($current_page["content"]);?>
							</textarea>
						</p>
						<input type="submit" name="submit" value="Edit Subject"/>
					</form>
					</br>
					<a href="manage_contents.php">Cancel</a>
					&nbsp;
					&nbsp;
					<a href="delete_page.php?page=<?php echo urlencode($current_page["id"]); ?>" onclick="return confirm('Are you sure?') ">Delete page</a>
			</div><!--page-->	
		</div><!--main-->

<?php	include("../include/layout/footer.php");?>	