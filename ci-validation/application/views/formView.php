<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
</head>
<body>
<h1>Student Registration</h1>
<hr />

<?php echo validation_errors(); ?>

<?php echo form_open('Welcome/form'); ?>

	Name : <input type="text" name="txt_name" value="<?php echo set_value('txt_name'); ?>">
	<br /><br />

	Email : <input type="text" name="txt_email" value="<?php echo set_value('txt_email'); ?>">
	<br /><br />

	Password : <input type="password" name="txt_password" value="<?php echo set_value('txt_password'); ?>">
	<br /><br />

	Confirm Password : <input type="password" name="txt_conf_password" value="<?php echo set_value('txt_conf_password'); ?>">
	<br /><br />

	<?php
		$arr_gender = array('Male','Female');
		foreach ($arr_gender as $gender) {
			?>
				<label><input type="radio" name="rdo_gender" value="<?=$gender?>" <?php echo set_checkbox('rdo_gender', '<?=$gender?>'); ?>><?=$gender?></label>
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
				<option value="<?=$city?>" <?php echo  set_select('cmb_city', '<?=$city?>'); ?>><?=$city?></option>
			<?php
		}
	?>
	</select> 
	<br /><br />

	<?php
		$arr_hobby = array('Playing','Cooking','Reading','Dancing','Swiming');
		foreach ($arr_hobby as $hobby) {
			?>
				<label><input type="checkbox" name="chk_hobby[]" value="<?=$hobby?>" <?php echo set_checkbox('chk_hobby[]', '<?=$hobby?>'); ?>><?=$hobby?></label>
			<?php
		}
	?> 
	<br /><br />

	Contact: <input type="text" name="txt_contact" value="<?php echo set_value('txt_contact'); ?>">
	<br /><br />

	<input type="submit" name="btn_submit" value="register">
</form>
</body>
</html>