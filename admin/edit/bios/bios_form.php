<?php
// bios_form.php
// 12-23-11 rlb
// Display form for bios on the Therapists page
// Must provide ability to delete bios
// as well as change order.

?>
<h1><?php echo $heading_fld;?></h1>
<p class="err_msg"><?php echo $err_msg;?></p>
<form name="bio_form" action="<?php echo $action_fld;?>" method="POST">
	<fieldset>
	<legend><?php echo $legend_fld;?></legend>
		<table class="bio_table" >
		<tr><td class="td_label td_top"></td>
			<td><?php 
				if ($image_flg)
				{
					$img_prog = "edit_image";
					$img_pg   = "bios";
					$b_src    = $bio_src;
				}
				else
				{
					$img_prog = "add_image";
					if ($add_flg)
						$img_pg = "add";
					else
						$img_pg   = "edit";
					$b_src    = "";
				}
				echo '<a href="'.$img_prog.'.php?pg='.$img_pg.'&img_src='.$bio_src.'&b_loc='.$b_loc.'">
					  <img class="admin_img" src="'.HTML_ADMIN_PATH.'pt_site_imgs/'.$bio_src.'?v='.rand().'" 
						alt="'.$bio_name.'" title="'.$bio_name.'" width="110" height="138" />';
			?></td>
			<td class="td_top">
				<table id="bio_name_table"cellspacing="8">
					<tr>
						<td class="td_label">Name: </td>
						<td><input name="b_name" type="text" size="30" value="<?php echo $bio_name;?>"></td>
					</tr>
					<tr>
						<td class="td_label">
						<?php 
							// if from edit page add ability to move
							if (!$add_flg)
							{
								// create select list for testimonial location
								echo 'Order: </td>
									  <td><select name="new_loc" size="1">'."\n";
								for ($i = 1; $i <= $b_cnt; $i++)
								{
									echo '	<option';
									if ($i == $b_loc) echo ' selected="selected"';
									echo '>'.$i.'</option>'."\n";
								}
								echo '</select>'."\n";
							}	
						?>
						</td>
					</tr>	
				</table>
			</td>
		</tr>
		</table>
		<p>Biography:</p>
		<p><textarea name="b_desc" cols="48" rows="15"><?php echo $bio_desc;?></textarea></p>
	</fieldset>
	<p><input class="contact_button" name="bios_submit" type="submit" value="Update">
	   <input class="contact_button" name="bios_cancel" type="submit" value="Cancel">
	   <input type="hidden" name="b_src" value="<?php echo $b_src;?>" />
		<?php 
			// if edit screen, put ability to delete
			if ($add_flg)
			{
				// put dummy input field to make testing easier during processing
				echo "\n".'<input type="hidden" name="new_loc" value="'.$b_loc.'" />'."\n";
			}
			else
			{
				echo "\n".'<input class="contact_button" name="bios_delete" type="submit" value="Delete">'."\n";
			}	
		?>
	</p>
</form>