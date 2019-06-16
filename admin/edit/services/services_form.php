<?php
// services_form.php
// 12-20-11 rlb
// Display form for specialties listing

// this contains 1 form for both groups of specialties

?>
<h1>Update Specialties Screen</h1>
<form name="services_form" action="edit_services.php" method="POST">
	<fieldset>
	<legend>Specialties Listing</legend>
	<table cellspacing="8" name="basics_table">
		<tr><td class="td_label td_top">Group 1</td>
			<td><textarea name="spec_list1" cols="38" rows="5"><?php echo $spec_list[0];?></textarea></td>
		</tr>
		<tr><td class="td_label td_top">Group 2</td>
			<td><textarea name="spec_list2" cols="38" rows="5"><?php echo $spec_list[1];?></textarea></td>
		</tr>
	</table>
	</fieldset>
	<p><input class="contact_button" name="services_submit" type="submit" value="Update">
		<input class="contact_button" name="services_cancel" type="submit" value="Cancel">
	</p>
</form>