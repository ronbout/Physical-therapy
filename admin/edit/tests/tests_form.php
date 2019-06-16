<?php
// tests_form.php
// 12-18-11 rlb
// Display textarea forms for testimonials on either the Home or Patient page
// Patient page testimonial must provide ability to delete testimonial
// as well as change order

?>
<h1><?php echo $heading_fld;?></h1>
<form name="tests_form" action="<?php echo $action_fld;?>" method="POST">
	<fieldset>
	<legend><?php echo $legend_fld;?></legend>
		<p>Testimonial:</p>
		<p><textarea name="t_desc" cols="48" rows="15"><?php echo $test_desc;?></textarea></p>
		<table cellspacing="8" class="test_table">
		<tr><td class="td_label">Name:</td>
			<td><input name="t_name" type="text" size="30" value="<?php echo $test_name;?>">
				 &nbsp;&nbsp;
				 	<?php 
					// if patients page, add ability to delete and move
					if (!$main_flg && !$add_flg)
					{
						// create select list for testimonial location
						echo "\n".'Order: <select name="new_loc" size="1">'."\n";
						for ($i = 1; $i <= $t_cnt; $i++)
						{
							echo '	<option';
							if ($i == $t_loc) echo ' selected="selected"';
							echo '>'.$i.'</option>'."\n";
						}
						echo '</select>'."\n";
					}	
				?>
			</td>
		</tr>
		<tr><td class="td_label">City:</td>
			<td><input name="t_city" type="text" size="30" value="<?php echo $test_city;?>"></td>
		</tr>
		</table>
	</fieldset>
	<p><input class="contact_button" name="test_submit" type="submit" value="Update">
	   <input class="contact_button" name="test_cancel" type="submit" value="Cancel">
		<?php 
			// if patients page, add ability to delete
			if ($main_flg || $add_flg)
			{
				// put dummy input field to make testing easier during processing
				echo "\n".'<input type="hidden" name="new_loc" value="'.$t_loc.'" />'."\n";
			}
			else
			{
				echo "\n".'<input class="contact_button" name="test_delete" type="submit" value="Delete">'."\n";
			}	
		?>
	</p>
</form>