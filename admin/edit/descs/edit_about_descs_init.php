<?php
// edit_aboutdescs_init.php
// 12-18-11 rlb
// init code for About Us description
// update file, cancel changes or set up variables
// for descs_form, which uses textarea field

$about_fname = ADMIN_PATH."files/about_desc.dat";
$desc_type = "about";

// check for submit button
if (isset($_POST['descs_submit']))
{
	// save info to about_desc.dat
	extract($_POST);

	file_put_contents($about_fname, $desc_inp);
	// now, return to main
	header("Location: admin_about.php");
}
// check for cancel button
else if (isset($_POST['descs_cancel']))
{
	// don't update and just return to admin home page
	header("Location: admin_about.php");
}
else
{

	// retrieve About Us 
	$about = "";
	if (file_exists($about_fname))  $about = file_get_contents($about_fname);
	// set up variables for form
	$heading_fld = "Update About Us Screen";
	$legend_fld  = "About Us Message";
	$action_fld  = "edit_about_descs.php";
	$desc_fld    = $about;
}

?>