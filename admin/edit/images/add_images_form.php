<?php
// add_images_form.php
// 12-24-11 rlb
// Display form for adding an image
// to the bio page

?>
<h1>Create Image Screen</h1>
<p class="err_msg"><?php echo $err_msg;?></p>
<form name="image_form" action="<?php echo $action_fld;?>" method="POST" enctype="multipart/form-data">
	<fieldset>
	<legend>Upload Image</legend>
		<?php echo '
			<a href="'.$new_src.'?v='.rand().'" target="_blank">
			<img class="admin_img" src="'.$new_src.'?v='.rand().'" width="110" height="'.$thumb_y.'" /></a>';
		?>
		<br>
		<h2>New File Upload:</h2>
		<p><input name="image_file" type="file" size="20" accept="image/*">
			<input class="contact_button" name="image_upload" type="submit" value="Upload" >
		</p>
	</fieldset>
	<p><input class="contact_button" name="image_submit" type="submit" value="Save"
			<?php if (!$update_flg) echo 'disabled="disabled"';?> >
		<input class="contact_button" name="image_cancel" type="submit" value="Cancel">
		<input name="new_src_form" type="hidden" value="<?php echo $new_src;?>" >
		<input name="update_flg_form" type="hidden" value="<?php echo $update_flg;?>" >
	</p>
</form>