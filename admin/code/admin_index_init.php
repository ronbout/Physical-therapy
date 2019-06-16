<?php
// admin_index_init.php
// 12-11-11 rlb
// init code for main page administration
// Retrieves photo link, Main Welcome and Testimonial
// and puts anchors around for editing

// retrieve photo link first
$photo_fname = ADMIN_PATH."files/photos.dat";
// set photo default
$pic_list = array("group_2.jpg");
if (file_exists($photo_fname))  $pic_list = file($photo_fname);
$pic_src = $pic_list[0];
$pic_html = '<p><a href="edit_image.php?pg=index&img_src='.$pic_src.'">
			<img src="'.HTML_ADMIN_PATH.'pt_site_imgs/'.$pic_src.'?v='.rand().'" ';
$pic_html .= 'alt="Employees" title="Choctaw Physical Therapy" /></a>';

// retrieve Welcome 
$welcome_fname = ADMIN_PATH."files/main_desc.dat";
$welcome = "";
if (file_exists($welcome_fname))  $welcome = file_get_contents($welcome_fname);
// strip tags to remove any anchors that will mess up the anchor for the entire textarea
$welcome = strip_tags($welcome);
$welcome = str_replace("\n","<br>",$welcome);
$welcome_html = '<p><a href="edit_main_descs.php">'.$welcome.'</a></p>';

$tests_html = load_testimonials("main_testimonial", true, ADMIN_PATH);

?>