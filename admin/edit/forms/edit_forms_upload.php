<?php
// edit_forms_upload.php
// 12-28-11 rlb
// uploads patients file and updates
// forms.dat.  Must include description to 
// display on patients page.


extract($_POST);
if (!isset($_FILES['forms_file']['name']) || !$_FILES['forms_file']['name'])
	$err_msg = "File must be entered";
else
{
	if ($_FILES['forms_file']['error'])
		$err_msg = "Error uploading file.";
	else
	{
		// make sure includes a description for patients page
		if (!isset($_POST['forms_desc']) || $_POST['forms_desc'] == "")
		{
			$err_msg = "Must include description for Patients Page.";
		}
	}
}
if (!$err_msg)
{	
	// get file info and move to forms dir
	$form_name = $_FILES['forms_file']['name'];
	$tmp_name  = $_FILES['forms_file']['tmp_name'];
	$form_desc = $_POST['forms_desc'];
	move_uploaded_file($tmp_name, $forms_dir.$form_name);
	// update forms file
	$form_info = $form_name."\n".$form_desc;
	$forms_list[] = $form_info;
	$forms_file = implode("\n*\n",$forms_list);
	file_put_contents($forms_fname, $forms_file);
}
unset($_FILES['forms_file']);
?>