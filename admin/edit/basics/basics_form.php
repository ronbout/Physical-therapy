<?php
// basics_form.php
// 12-14-11 rlb
// Display form for basic contact info

// this contains 1 form for all the contact-related
// info that is found on the right side.

?>
<h1>Update Contact Screen</h1>
<form name="basics_form" action="<?php echo $action_fld;?>" method="POST">
	<fieldset>
	<legend>Basic Contact Information</legend>
	<table cellspacing="8" name="basics_table">
		<tr><td class="td_label">Address: </td>
			<td><input name="b_addr" type="text" size="30" value="<?php echo $pt_addr;?>"></td>
		</tr>
		<tr><td class="td_label">City: </td>
			<td><input name="b_city" type="text" size="30" value="<?php echo $pt_city;?>"></td>
		</tr>
		<tr><td class="td_label">Phone: </td>
			<td><input name="b_phone" type="text" size="30" value="<?php echo $pt_phone;?>"></td>
		</tr>
		<tr><td class="td_label">Fax: </td>
			<td><input name="b_fax" type="text" size="30" value="<?php echo $pt_fax;?>"></td>
		</tr>
		<tr><td class="td_label">E-mail: </td>
			<td><input name="b_email" type="text" size="30" value="<?php echo $pt_email;?>"></td>
		</tr>
		<tr><td class="td_label">Hours: </td>
			<td><textarea name="b_hours" cols="30" rows="3"><?php echo $pt_hours;?></textarea></td>
		</tr>
	</table>
	</fieldset>
	<p><input class="contact_button" name="basics_submit" type="submit" value="Update">
		<input class="contact_button" name="basics_cancel" type="submit" value="Cancel">
	</p>
</form>