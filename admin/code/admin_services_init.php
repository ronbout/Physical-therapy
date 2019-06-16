<?php
// admin_services_init.php
// 12-20-11 rlb
// init code for services page
// retrieves pictures and services list

// retrieve list of services
$spec_file = "Orthopedics\nSpinal Rehab and Manipulation\nSports Medicine\n*\nJoint Replacement Rehab";
$spec_file .= "\nGeriatric\nSpinal Decompression\nTherapy Modalities (passive treatments)";
$spec_fname = ADMIN_PATH."files/specialties.dat";
if (file_exists($spec_fname)) $spec_file = file_get_contents($spec_fname);

$spec_list = array_map("trim",explode("*",$spec_file));
$spec_html = array();
for ($i = 0; $i < 2; $i++)
{
	$spec_list[$i] = explode("\n",$spec_list[$i]);

	$spec_html[$i] = '<a href="edit_services.php"><ul class="services">'."\n";
	foreach($spec_list[$i] as $specialty)
	{
		$spec_html[$i] .= "<li>".trim(strip_tags($specialty))."</li>\n";
	}
	$spec_html[$i] .= "</ul></a>\n";
}

// retrieve pictures
$photo_fname = ADMIN_PATH."files/photos.dat";
// set photo default
$pic_list = array("group_2.jpg","pt_1.jpg","pt_2.jpg","pt_3.jpg",
					"pt_4.jpg","pt_5.jpg","pt_6.jpg");
if (file_exists($photo_fname))  $pic_list = file($photo_fname);
$pic_html = array();
for ($i=0; $i < 6; $i++)
{
	// use $i+1 because 1st photo is for home page
	$pic_src = $pic_list[$i+1];
	$pic_html[$i] = "\n".'<a href="edit_image.php?pg=services&img_src='.$pic_src.'">';
	$pic_html[$i] .= '<img class="pt_img" src="'.HTML_ADMIN_PATH.'pt_site_imgs/'.$pic_src.'?v='.rand().'" '."\n";
	$pic_html[$i] .= 'alt="Physical Therapy '.($i.+1).'" title="Physical Therapy '.($i+1).'" '."\n";
	$pic_html[$i] .= 'width="172" height="138" /></a>'."\n";
}
?>