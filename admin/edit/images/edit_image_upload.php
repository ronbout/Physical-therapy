<?php
// edit_image_upload.php
// 12-22-11 rlb
// code for uploading an image to the web site
// must check size and resize if necessary

$err_msg = "";
$update_flg = false;
// check size based on pg and resize as necessary
if (!isset($_FILES['image_file']['name']) || !$_FILES['image_file']['name'])
	$err_msg = "File must be entered";
else
{
	if ($_FILES['image_file']['error'])
		$err_msg = "Error uploading file.";
	else
	{
		// get file info
		$name = $_FILES['image_file']['name'];
		$tmp_name = $_FILES['image_file']['tmp_name'];
		// if scale_opt = 0, ratio x/y must be same, otherwise just set x and scale
		if (!$scale_opt)
		{
			if ($chk_result = check_img_size($tmp_name, $pic_x, $pic_y))
			{
				if ($chk_result == -1)
					$err_msg = "Unknown Error Validating File.";
				else
					$err_msg = "Invalid size for available space.<br>Please Check Instructions at right.";
			}
		}
	}
}
if (!$err_msg)
{
	// survived error checking, now resize and save
	if (($new_pic = resize_img($tmp_name, $pic_x, $pic_y, $scale_opt)) === false)
	{
		$err_msg = "Error Resizing Image.";
	}
	else
	{
		// now just save new file and go back to form w update flg on
		if (!imagejpeg($new_pic, $new_src))
		{
			$err_msg = "Unknown Error Saving Image.";
		}
		$update_flg = true;
	}
}
else
{
	// error, so set new_src to no image 
	$new_src = HTML_ADMIN_PATH."pt_site_imgs/no_image_".$pg.".jpg?v=".rand();
}
// remove tmp file
if (isset($tmp_name)) unlink($tmp_name);

?>