<?php
// edit_video_init.php
// 12-27-11 rlb
// init code for changing video in About Us page
// video must be posted on YouTube and the link is
// pasted into field.  The URL is then parsed into an 
// embedded video

$video_fname = ADMIN_PATH."files/videos.dat";
$no_link     = ADMIN_PATH."pt_site_imgs/no_video.jpg";
$err_msg = "";

// set up video size variables for displaying in form 
$video_x = 400;
$video_y = 229;

// retrieve file
if (file_exists($video_fname))
{
	$video_list = file($video_fname);
	if (!$video_list)  $video_list = array("");
}
else
{
	$video_list = array("");
}
$video_src = trim($video_list[0]);

// check for submit button
if (isset($_POST['video_submit']))
{
	// need to update video.dat
	extract($_POST);
	$video_file[0] = $new_link_form;
	file_put_contents($video_fname, $video_file);
	header("Location: admin_about.php");
}
// check for cancel button
else if (isset($_POST['video_cancel']))
{
	// just return
	header("Location: admin_about.php");
}
// check for upload image button
else if (isset($_POST['link_submit']))
{
	// user should enter the standard URL of 
	// the YouTube video.  Program needs to
	// parse and create link to embedded version
	require("edit/video/edit_video_submit.php");
}
else
{
	// prepare form
	// disable update new button until video link entered successfully
	$new_link = "";
	$submit_flg = false;
}

?>