<?php
// descs_form.php
// 12-17-11 rlb
// Display textarea forms for descriptions on either the Home page or About Us

?>
<h1><?php echo $heading_fld;?></h1>
<form name="basics_form" action="<?php echo $action_fld;?>" method="POST">
	<fieldset>
	<legend><?php echo $legend_fld;?></legend>
		<textarea name="desc_inp" cols="48" rows="20"><?php echo $desc_fld;?></textarea>
	</fieldset>
	<p><input class="contact_button" name="descs_submit" type="submit" value="Update">
		<input class="contact_button" name="descs_cancel" type="submit" value="Cancel">
	</p>
</form>