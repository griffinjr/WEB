<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php find_selected_page(); ?>
<?php
	if(!$current_subject){
		redirect_to("manage_contents.php");
	}
?>

<?php
	if(isset($_POST["submit"])){
		
		//validations
		$required_fields = array("menu_name","position","visible");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(empty($errors)){
			$id = $current_subject["id"];
			$menu_name = mysql_prep($_POST["menu_name"]);
			$position = (int) $_POST["position"];
			$visible = (int) $_POST["visible"];
			
			$sql = "UPDATE subject SET 
							menu_name = '{$menu_name}',
							position = '{$position}',
							visible = '{$visible}'
							WHERE id = '{$id}'
							LIMIT 1";
			$hasil = mysqli_query($koneksi,$sql);
			
			if($hasil && mysqli_affected_rows($koneksi) >= 0){
			//SUCCESS
				$_SESSION["message"] = "Subject updated.";
				redirect_to("manage_contents.php");
			} else{
			//FAILURE
				$message  = "Subject update failed.";
			}
		}
	} else{
		
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
					<h2>Edit Subject: <?php echo htmlentities($current_subject["menu_name"]); ?></h2>
					<form action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method= "POST">
						<p>Menu name :
							<input type="text" name="menu_name" value="<?php echo htmlentities($current_subject["menu_name"]); ?>"/>
						</p>
						<p>Position :
							<select name="position">
								<?php 
									$subject_set = find_all_subjects(false);
									$subject_count = mysqli_num_rows($subject_set);
									for($count = 1; $count <= ($subject_count); $count++)
									{
										echo "<option value=\"{$count}\"";
										if($current_subject["position"] == $count){
											echo " selected";
										}
										echo ">{$count}</option>";
									}
								?>
								
							</select>
						</p>
						<p>Visible :
							<input type="radio" name="visible" value="0"
							<?php 
								if($current_subject["visible"] == 0){
									{echo " checked";}
								}
							?>/>No
							<input type="radio" name="visible" value="1"
							<?php 
								if($current_subject["visible"] == 1){
									{echo " checked";}
								}
							?>/>Yes
						</p>
						<input type="submit" name="submit" value="Edit Subject"/>
					</form>
					</br>
					<a href="manage_contents.php">Cancel</a>
					&nbsp;
					&nbsp;
					<a href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>" onclick="return confirm('Are you sure?') ">Delete subject</a>
			</div><!--page-->	
		</div><!--main-->

<?php	include("../include/layout/footer.php");?>	