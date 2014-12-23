<?php require_once("../include/session.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/function.php");?>
<?php require_once("../include/validation_function.php");?>
<?php find_selected_page(); ?>
<?php
	if(!$current_subject){
	redirect_to("manage_content.php");
	}
?>

<?php
	if(isset($_POST["submit"])){
		$subject_id = $current_subject["id"];
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		$content = mysql_prep($_POST["content"]);
		
		//validations
		$required_fields = array("menu_name","position","visible","content");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("new_page.php?subject=". urlencode($current_subject["id"]));
		} 
		
		$sql = "INSERT INTO page (subject_id, menu_name, position, visible, content)
					VALUES ({$subject_id},'{$menu_name}',{$position},{$visible},'{$content}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		if($hasil){
		//SUCCESS
			$_SESSION["message"] = "Page created.";
			redirect_to("manage_contents.php?subject=". urlencode($current_subject["id"]));
		} else{
		//FAILURE
			$_SESSION["message"]  = "Page creation failed.";
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
					<?php echo message(); ?>
					<?php $errors = errors(); ?>
					<?php echo form_errors($errors); ?>
					<h2>Create Page</h2>
					<form action="new_page.php?subject=<?php echo $current_subject["id"]; ?>" method= "POST">
						<p>Menu name :
							<input type="text" name="menu_name"/>
						</p>
						<p>Position :
							<select name="position">
								<?php 
									$page_set = find_pages_for_subject($current_subject["id"], false);
									$page_count = mysqli_num_rows($page_set); 
									for($count = 1; $count <= ($page_count + 1); $count++)
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
						<p>Content:
							</br>
							<textarea name="content" rows="10" cols="80"></textarea>
						</p>
						<input type="submit" name="submit" value="Create Page"/>
					</form>
					</br>
					<a href="manage_contents.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a>
			</div><!--page-->	
		</div><!--main-->

<?php	include("../include/layout/footer.php");?>	