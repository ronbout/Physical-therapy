<?php
// edit_main_descs_init.php
// 12-17-11 rlb
// init code for Welcome description on Home page
// update file, cancel changes or set up variables
// for descs_form, which uses textarea field

$welcome_fname = ADMIN_PATH."files/main_desc.dat";
$desc_type = "main";

// check for submit button
if (isset($_POST['descs_submit']))
{
	// save info to main_desc.dat
	extract($_POST);

	file_put_contents($welcome_fname, $desc_inp);
	// now, return to main
	header("Location: admin_index.php");
}
// check for cancel button
else if (isset($_POST['descs_cancel']))
{
	// don't update and just return to admin home page
	header("Location: admin_index.php");
}
else
{

	// retrieve Welcome 
	$welcome = "";
	if (file_exists($welcome_fname))  $welcome = file_get_contents($welcome_fname);
	// set up variables for form
	$heading_fld = "Update Welcome Screen";
	$legend_fld  = "Home Page Welcome Message";
	$action_fld  = "edit_main_descs.php";
	$desc_fld    = $welcome;
}

?>