<?php
// edit_bios_init.php
// 12-23-11 rlb
// init code for bios admin page
// allows user to edit info in the bio, 
// including image, name, desc, and display order
// GET variable determines which bios is being edited

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
// pull out bio based on b_loc
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
		
		if ($b_loc != $new_loc)
		{
			array_splice($bios_list, $b_loc-1, 1);
			array_splice($bios_list, $new_loc-1, 0, $bio_entry);
		}
		else
			$bios_list[$b_loc-1] = $bio_entry;
		// convert array to string for output and save
		$bios_file = implode("\n*\n",$bios_list);
	
		file_put_contents($bios_fname, $bios_file);
		// now, return to main
		header("Location: admin_therapists.php");
	}
}
// check for delete button
else if (isset($_POST['bios_delete']))
{
	array_splice($bios_list, $b_loc-1, 1);
	// convert array to string for output
	$bios_list = implode("\n*\n",$bios_list);
	file_put_contents($bios_fname, $bios_list);
	// now, return to therapists page
	header("Location: admin_therapists.php");
}
// check for cancel button
else if (isset($_POST['bios_cancel']))
{
	// don't update and just return to admin therapists page
	header("Location: admin_therapists.php");
}

// make sure that array element exists...just in case
if (count($bios_list) < $b_loc) header("Location: admin_therapists.php");
$bio_entry = $bios_list[$b_loc-1];
$bio_info = array_map("trim",explode("\n",$bio_entry));
$bio_name = $bio_info[0];
$bio_src  = trim($bio_info[1]);
// check for image source.  If no photo, need to run add image when clicked
$image_flg = true;
if ($bio_src == "")
{
	// first, check $_SESSION variable to see if image file has
	// been passed back from add_image page
	if (isset($_SESSION['img_name']) && $_SESSION['img_name'] != "")
	{
		$bio_src = $_SESSION['img_name'];
		unset($_SESSION['img_name']);
	}
	else
	{
		$image_flg = false;
		$bio_src = "add_image.jpg";
	}
}
$bio_desc = "";
$i = 2;
while ($i < count($bio_info))
{
	if ($bio_desc != "") $bio_desc .= "\n";
	$bio_desc .= trim(strip_tags($bio_info[$i]));
	$i++;
}
	// set up variables for form
	$add_flg     = false;
	$heading_fld = "Update Employee Screen";
	$legend_fld  = "Biographical Information";
	$action_fld  = "edit_bios.php?b_loc=".$b_loc;
?>