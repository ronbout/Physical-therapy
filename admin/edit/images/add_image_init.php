<?php
// add_image_init.php
// 12-24-11 rlb
// init code for adding image to bio page.
// On upload, sizing needs to be checked and corrected if necessary

if (!isset($_GET['pg']) || !isset($_GET['img_src']))
{
	// cannot process without GET variables, send back to main admin
	header("Location: admin.php");
}
extract($_GET);

// set up image sources
$new_src = HTML_ADMIN_PATH."pt_site_imgs/no_image_bios.jpg";
$action_fld  = "add_image.php?pg=".$pg."&img_src=".$img_src."&b_loc=".$b_loc;

// figure out where came from either add bio or edit bio w no pic
if ($pg == "edit")
	$rtn_pg = "edit_bios.php?b_loc=".$b_loc;
else
	$rtn_pg = "add_bios.php?b_loc=".$b_loc;

// set up image size variables
$pic_x = 172;
$pic_y = 215;
$thumb_x = 110;
$thumb_y = 138;

// height of pic can vary, just need to keep x
$scale_opt = 1;
$err_msg = "";

// check for submit button
if (isset($_POST['image_submit']))
{
	// the file is already saved, need to set SESSION variable
	// so calling prog knows name
	extract($_POST);
	$_SESSION['img_name'] = $new_src_form;
	header("Location: ".$rtn_pg);
}
// check for cancel button
else if (isset($_POST['image_cancel']))
{
	// remove file if necessary and return
	extract($_POST);
	if ($update_flg_form)
		if (file_exists($new_src_form))
		{
			// remove tmp file
			unlink($new_src_form);
		}
	header("Location: ".$rtn_pg);
}
// check for upload image button
else if (isset($_POST['image_upload']))
{
	// use image upload from edit page, just need to determine new name
	// use function get_next_bios_image()
	$new_src = HTML_ADMIN_PATH."pt_site_imgs/".get_next_bios_image();
	require("edit/images/edit_image_upload.php");
}
else
{
	// prepare form
	// disable update new button until file uploaded successfully
	$update_flg = false;
}

?>