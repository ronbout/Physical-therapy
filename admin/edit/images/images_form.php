<?php
// images_form.php
// 12-14-11 rlb
// Display form for editing images

?>
<h1>Image Maintenance Screen</h1>
<p class="err_msg"><?php echo $err_msg;?></p>
<form name="image_form" action="<?php echo $action_fld;?>" method="POST" enctype="multipart/form-data">
	<fieldset>
	<legend>Images</legend>
	<table name="image_table">
		<tr>
			<td class="td_heading">New</td>
			<td class="td_heading">Current</td>
			<td class="td_heading">Previous</td>
		</tr>
			<td><?php
				// either display no image or uploaded tmp image
				if ($update_flg)
				{
					echo '<a href="'.$new_src.'?v='.rand().'" target="_blank">
						  <img class="admin_img" src="'.$new_src.'?v='.rand().'" width="'.$thumb_x.'" height="'.$thumb_y.'" /></a>';
				}
				else
				{
					echo '<img class="admin_img" src="'.$no_src.'" width="'.$thumb_x.'" height="'.$thumb_y.'" />';
				}
			?></td>
			<td><?php 
					echo '<a href="'.$cur_src.'?v='.rand().'" target="_blank">
						  <img class="admin_img" src="'.$cur_src.'?v='.rand().'" width="'.$thumb_x.'" height="'.$thumb_y.'" /></a>';
			?></td>
			<td><?php
				if ($bak_flg)
				{
					echo '<a href="'.$bak_src.'?v='.rand().'" target="_blank">
						  <img class="admin_img" src="'.$bak_src.'?v='.rand().'" width="'.$thumb_x.'" height="'.$thumb_y.'" /></a>';
				}
				else
				{
					echo '<img class="admin_img" src="'.$no_src.'" width="'.$thumb_x.'" height="'.$thumb_y.'" />';
				}
			?></td>
		</tr>
		</table>
		<br>
		<h2>New File Upload:</h2>
		<p><input name="image_file" type="file" size="20" accept="image/*">
			<input class="contact_button" name="image_upload" type="submit" value="Upload" >
		</p>
	</fieldset>
	<p><input class="contact_button" name="image_submit" type="submit" value="Use New Image"
			<?php if (!$update_flg) echo 'disabled="disabled"';?> >
		<input class="contact_button" name="image_previous" type="submit" value="Restore Previous"
			<?php if (!$bak_flg) echo 'disabled="disabled"';?> >
		<input class="contact_button" name="image_cancel" type="submit" value="Cancel">
		<input name="new_src_form" type="hidden" value="<?php echo $new_src;?>" >
		<input name="update_flg_form" type="hidden" value="<?php echo $update_flg;?>" >
	</p>
</form>