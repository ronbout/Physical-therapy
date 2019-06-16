<?php
// forms_form.php
// 12-29-11 rlb
// Display form for editing patient download forms

?>
<h1>Patient Download Files Maintenance</h1>
<p class="err_msg"><?php echo $err_msg;?></p>
<form name="forms_form" action="edit_forms.php" method="POST" enctype="multipart/form-data">
<fieldset>
<legend>Downloadable Patient Forms</legend>
	<table name="forms_table">
		<tr>
			<td class="td_heading">Doc Name</td>
			<td class="td_heading">Patient Page Desc</td>
			<td class="td_heading">Delete</td>
		</tr>
		<?php 
		// loop through each file in forms_list creating row of info
		foreach($forms_list as $key=>$form_info)
		{
			$form_info =  array_map("trim",explode("\n",$form_info));
			echo '
			<tr>
				<td><input name="form_fname[]" disabled="disabled" type="text" size="20" 
					  value="'.$form_info[0].'"></td>
				<td><input name="form_desc[]" type="text" size="25" 
					  value="'.$form_info[1].'"></td>
				<td class="center"><input name="form_del[]" type="checkbox" value="'.$key.'"></td>
			</tr>
			';
		}
		?>
	</table>
	<br>
	<h2>New Patient File Upload:</h2>
	<p><input name="forms_file" type="file" size="20" ></p>
	<p>Desc: <input name="forms_desc" type="text" size="25" >
		<input class="contact_button" name="forms_upload" type="submit" value="Upload" ></p>
</fieldset>
	<p><input class="contact_button" name="forms_done" type="submit" value="Finished">
	   <input class="contact_button" name="forms_delete" type="submit" value="Delete">
	</p>
</form>