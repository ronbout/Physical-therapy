<?php
// index_init.php
// 11-24-11 rlb
// init code for main page
// updates counter info and retrieves photo link
// also includes Main Welcome and Testimonial

// retrieve photo link first
$photo_fname = "files/photos.dat";
// set photo default
$pic_list = array("group_2.jpg");
if (file_exists($photo_fname))  $pic_list = file($photo_fname);
$pic_src = $pic_list[0];
$pic_html = '<p><img src="pt_site_imgs/'.$pic_src.'" ';
$pic_html .= 'alt="Employees" title="Choctaw Physical Therapy" '."\n";
$pic_html .= 'width="396" height="317" />';

// retrieve Welcome 
$welcome_fname = "files/main_desc.dat";
$welcome = "";
if (file_exists($welcome_fname))  $welcome = file_get_contents($welcome_fname);
$welcome = str_replace("\n","<br>",$welcome);
$welcome_html = "<p>".$welcome."</p>";

$tests_html = load_testimonials("main_testimonial", false, "");

?>	