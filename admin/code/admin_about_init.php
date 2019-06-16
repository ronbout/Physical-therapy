<?php
// admin_about_init.php
// 12-18-11 rlb
// init code for About Us page
// retrieves video link and about us description
// puts anchor tags in for editing

// retrieve about us description
$about_fname = ADMIN_PATH."files/about_desc.dat";
$about = "";
if (file_exists($about_fname))  $about = file_get_contents($about_fname);
// remove html tags so that any other anchors do not interfere
$about = strip_tags($about);
$about = str_replace("\n","<br>",$about);
$about_html = '<p><a href="edit_about_descs.php">'.$about.'</a></p>';

// retrieve video link
$video_fname = ADMIN_PATH."files/videos.dat";
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
$video_html = '<iframe width="415" height="238" 
				src="'.$video_src.'" frameborder="0" 
				allowfullscreen>
			</iframe>';
if ($video_src != "")
{
	$video_html .=	'<p class="center"><a href="edit_video.php"><strong>Click Here to Change Video</strong></a></p>';
}
else
{
	$video_html .= '<p class="center"><br><a href="edit_video.php"><strong>Click Here to Add Video</strong></a></p>';
}


?>