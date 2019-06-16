<?php
// edit_image_init.php
// 12-21-11 rlb
// init code for images on the Home, Therapists, or 
// Services page.  If previous version of image (*_bak)
// is available, it should be made available, in case new
// picture doesn't look as good once in place and user 
// wants to change back easily.
// When new image is chosen, orig image should be saved
// to bak.
// On upload, sizing needs to be checked and corrected if necessary

if (!isset($_GET['pg']) || !isset($_GET['img_src']))
{
	// cannot process without GET variables, send back to main admin
	header("Location: admin.php");
}
extract($_GET);

// set up image sources
$cur_src = HTML_ADMIN_PATH."pt_site_imgs/".$img_src;
$new_src = HTML_ADMIN_PATH."pt_site_imgs/tmp_img.jpg";
$no_src  = HTML_ADMIN_PATH."pt_site_imgs/no_image_".$pg.".jpg";
$action_fld  = "edit_image.php?pg=".$pg."&img_src=".$img_src;
// determine if previous photo or use 'no image' pic
$bak_src = array_map("trim",explode('.',$img_src));
$bak_src = $bak_src[0]."_bak.".$bak_src[1];
$bak_src = HTML_ADMIN_PATH."pt_site_imgs/".$bak_src;
if (file_exists($bak_src)) 
{
	$bak_flg = true;
}
else
{
	$bak_flg = false;
}
// need special test for bios, which is from bios edit screen
if ($pg == "bios")
{
	$rtn_pg = "edit_bios.php?b_loc=".$b_loc;
	$action_fld  = "edit_image.php?pg=".$pg."&img_src=".$img_src."&b_loc=".$b_loc;
}
else
	$rtn_pg = "admin_".$pg.".php";

$thumb_x = 110;
switch($pg)
{
	case("index"):
		$pic_x = 396;
		$pic_y = 317;
		$thumb_y = 88;
		// height of pic can vary, just need to keep x
		$scale_opt = 0;   // scale_opt 0=must fit both x,y:  1=must fit x, scale y:  2=must fit y, scale x
		break;
	case("therapists"):
	case("bios"):
		$pic_x = 172;
		$pic_y = 215;
		$thumb_y = 138;
		// height of pic can vary, just need to keep x
		$scale_opt = 1;
		break;
	case("services");
		$pic_x = 172;
		$pic_y = 138;
		$thumb_y = 88;
		// height and width ratio must be the same (or close)
		$scale_opt = 0;
		break;
	default:
		// something has gone wrong.  Go back to main admin page
		header("Location: admin.php");
}

$err_msg = "";

// check for submit button
if (isset($_POST['image_submit']))
{
	// move current image to bak and move new image to current
	if (($result = rename($cur_src, $bak_src)) != true)
	{
		$err_msg = "Unknown Error Saving Current Image.<br>Please try again or <Cancel>.";
	}
	else
	{
		if (($result = rename($new_src, $cur_src)) != true)
		{
			$err_msg = "Unknown Error Updating New Image.<br>Please try again or <Cancel>.";
			// put back original image, if possible
			rename($bak_src, $cur_src);
		}
		else
		{
			// now, return to calling program
			header("Location: ".$rtn_pg);
		}
	}
}
// check for previous pic button
else if (isset($_POST['image_previous']))
{
	// switch src and _bak images and return.  use new_src as tmp file
	if (($result = rename($cur_src, $new_src)) != true)
	{
		$err_msg = "Unknown Error Saving Current Image.<br>Please try again or <Cancel>.";
	}
	else
	{
		if (($result = rename($bak_src, $cur_src)) != true)
		{
			$err_msg = "Unknown Error Updating Previous Image.<br>Please try again or <Cancel>.";
			// put back original image, if possible
			rename($new_src, $cur_src);
		}
		else
		{
			// put original into bak
			rename($new_src, $bak_src);
			header("Location: ".$rtn_pg);
		}
	}
	if ($err_msg)
	{
		// need to find out if new file had been uploaded as we are going back to form
		extract($_POST);
		$new_src = $new_src_form;
		$update_flg = $update_flg_form;
	}
}
// check for cancel button
else if (isset($_POST['image_cancel']))
{
	// don't update and just return to calling page
	if (file_exists($new_src))
	{
		// remove tmp file
		unlink($new_src);
	}
	header("Location: ".$rtn_pg);
}
// check for upload image button
else if (isset($_POST['image_upload']))
{
	require("edit/images/edit_image_upload.php");
}
else
{
	// prepare form
	// disable update new button until file uploaded successfully
	$new_src = HTML_ADMIN_PATH."pt_site_imgs/no_image_".$pg.".jpg";
	$update_flg = false;
}

?>