<?php
	if(!isset($_SESSION['user_id'])){
    		redirect('/welcome/index');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
</head>
<body>
	<h3>Update Profile</h3>
	<hr />

	<?php echo form_open('Welcome/update'); ?>

		Name : <input type="text" name="txt_name" value="<?=$user_name?>">
		<br /><br />

		Email : <input type="text" name="txt_email" value="<?=$user_email?>">
		<br /><br />
		
		<?php
		$arr_gender = array('Male','Female');
		foreach ($arr_gender as $gender) {
			?>
				<label><input type="radio" name="rdo_gender" value="<?=$gender?>" <?=$user_gender==$gender?"checked":""?>><?=$gender?></label>
			<?php
		  }
		?>
		<br /><br />

		<select name="cmb_city">
			<option value="">--Select City--</option>
		<?php
			$arr_city = array('Mumbai','Nashik','Pune');
			foreach ($arr_city as $city) {
				?>
					<option value="<?=$city?>" <?php echo  set_select('cmb_city', '<?=$city?>'); ?> <?=$user_city==$city?"selected":""?>><?=$city?></option>
				<?php
			}
		?>
		</select> 
		<br /><br />

		<?php
		$arr_hobby = array('Playing','Cooking','Reading','Dancing','Swiming');
			foreach ($arr_hobby as $hobby) {
				?>
					<label><input type="checkbox" name="chk_hobby[]" value="<?=$hobby?>" <?php echo set_checkbox('chk_hobby[]', '<?=$hobby?>'); ?> <?=in_array($hobby,$user_hobby)?"checked":""?>><?=$hobby?></label>
				<?php
			}
		?> 
		<br /><br />

		Contact: <input type="text" name="txt_contact" value="<?=$user_contact?>">
		<br /><br />

		<input type="submit" name="btn_update" value="Update Profile">
	</form>
</body>
</html>