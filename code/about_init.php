<?php
// about_init.php
// 11-27-11 rlb
// init code for About Us page
// retrieves video link about us description

// retrieve about us description
$about_fname = "files/about_desc.dat";
$about = "";
if (file_exists($about_fname))  
{
	$about = file_get_contents($about_fname);
	if (!$about) $about = "";
}
$about = str_replace("\n","<br>",$about);
$about_html = "<p>".$about."</p>";

// retrieve video link
$video_fname = "files/videos.dat";
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

?>