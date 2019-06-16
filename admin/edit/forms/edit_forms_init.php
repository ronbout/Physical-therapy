<?php
// edit_forms_init.php
// 12-28-11 rlb
// init code for changing patient download forms
// on the Patients page.  Must change the forms.dat file
// as well as add/delete files to pt/forms directory

$forms_fname = ADMIN_PATH."files/forms.dat";
$forms_dir   = ADMIN_PATH."forms/";
$err_msg = "";

// retrieve file
$forms_file = "";
if (file_exists($forms_fname)) $forms_file = file_get_contents($forms_fname);
if ($forms_file != "")
	$forms_list = array_map("trim",explode("*",$forms_file));
else
	$forms_list = array();

// check for upload button
if (isset($_POST['forms_upload']))
{
	// run update code
	require("edit/forms/edit_forms_upload.php");
	unset($_POST['forms_upload']);
}
// check for Done button
else if (isset($_POST['forms_done']))
{
	// just return
	header("Location: admin_patients.php");
}
// check for Delete button
else if (isset($_POST['forms_delete']))
{
	extract($_POST);
	// loop through checkboxes and delete checked items
	// reverse order of checkboxes to make it easier to delete
	// i.e. deleting from top to bottom so array doesn't get renumbered
	if (!isset($form_del)) $form_del = array();
	$form_del = array_reverse($form_del, true);
	foreach ($form_del as $key=>$form_checkbox)
	{
		// delete file from forms directory
		$form_info = $forms_list[$form_checkbox];
		$form_info =  array_map("trim",explode("\n",$form_info));
		$form_name = $form_info[0];
		if (file_exists(ADMIN_PATH.'forms/'.$form_name)) unlink(ADMIN_PATH.'forms/'.$form_name);
		// update forms_list and write out
		array_splice($forms_list,$form_checkbox,1);
	}
	$forms_file = implode("\n*\n",$forms_list);
	file_put_contents($forms_fname, $forms_file);
	unset($_POST['forms_delete']);
}
else
{
	// make sure files listed in $forms_file actually exist on disk
	require("edit/forms/check_forms.php");
	// prepare form vars

}

?>