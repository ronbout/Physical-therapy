<?php
// add_bios_init.php
// 12-26-11 rlb
// init code for add_bios admin page
// allows user to edit info in the bio, 
// including image, name, and desc
// GET variable determines where to place bio

if (!isset($_GET['b_loc']))
{
	// cannot process without GET variable, send back to main admin
	header("Location: admin.php");
}
extract($_GET);

$bios_fname = ADMIN_PATH."files/bios.dat";
$err_msg = "";

// retrieve bio
$bios_file = "";
if (file_exists($bios_fname))  $bios_file = file_get_contents($bios_fname);
// use array map to trim each element as explode inserts \n creating extra space every time
$bios_list = array_map("trim",explode("*",$bios_file));
$b_cnt = count($bios_list);

// check for submit button
if (isset($_POST['bios_submit']))
{
	// save info to bios.dat
	extract($_POST);
	if ($b_name == "")
	{
		$err_msg = "Name must be entered.";
	}
	else 
	{
		$bio_entry = $b_name;
		$bio_entry .= "\n".$b_src;
		$bio_entry .= "\n".$b_desc;

		array_splice($bios_list, $new_loc, 0, $bio_entry);
		// convert array to string for output and save
		$bios_file = implode("\n*\n",$bios_list);
		file_put_contents($bios_fname, $bios_file);
		// now, return to main
		header("Location: admin_therapists.php");
	}
}
// check for cancel button
else if (isset($_POST['bios_cancel']))
{
	// don't update and just return to admin therapists page
	header("Location: admin_therapists.php");
}
else
{
	// first, check $_SESSION variable to see if image file has
	// been passed back from add_image page
	if (isset($_SESSION['img_name']) && $_SESSION['img_name'] != "")
	{
		$image_flg = true;
		$bio_src = $_SESSION['img_name'];
		unset($_SESSION['img_name']);
	}
	else
	{
		$image_flg = false;
		$bio_src = "add_image.jpg";
	}
	$bio_name = "";
	$bio_desc = "";
	// set up variables for form
	$add_flg     = true;
	$heading_fld = "Add Employee Screen";
	$legend_fld  = "Biographical Information";
	$action_fld  = "add_bios.php?b_loc=".$b_loc;
}
?>