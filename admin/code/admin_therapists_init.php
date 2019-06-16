<?php
// admin_therapists_init.php
// 12-23-11 rlb
// init code for therapists admin page
// retrieves list of therapists including name,
// photo link, and description and adds link for editing


// retrieve list of therapists and parse info
// each therapists info is separated by "*", so
// read into string and then explode into array by "*"



$therapists_fname = ADMIN_PATH."files/bios.dat";

$therapists_file = "";
if (file_exists($therapists_fname))
{
	$therapists_file = file_get_contents($therapists_fname);
	if (!$therapists_file)
	{
		$therapists_file = "";
	}
}

$b_loc = 0;
$therapists_html = '<p class="add_bio_link">'.str_repeat("*",16).'<br><a href="add_bios.php?b_loc='.$b_loc.'">Add New Bio Here</a>';
$therapists_html .= '<br><br>'.str_repeat("*",16).'</p>';
$therapists_list = array_map("trim",explode("*",$therapists_file));
if ($therapists_list == array("")) $therapists_list = array();
$therapist_cnt = 0;
foreach($therapists_list as $therapist)
{
	// now explode based on \n
	$therapist_info = explode("\n",trim($therapist));
	$therapist_name = $therapist_info[0];
	// anchor name not used in admin pages
	//$therapist_a_name = str_replace(" ","",$therapist_name);
	//$therapist_a_name = str_replace(",","",$therapist_a_name);
	//$therapist_a_name = trim(str_replace(".","",$therapist_a_name));
	$therapist_src  = trim($therapist_info[1]);
	$therapist_desc = "";
	$i = 2;
	while ($i < count($therapist_info))
	{
		$therapist_desc .= "<br>".trim(strip_tags($therapist_info[$i]));
		$i++;
	}
	$therapist_cnt++;
	// build HTML, alternating left/right images
	if ($therapist_cnt % 2)
	{
		$fl_class  = "f_left";
		$div_class = "therapist_l";
	}
	else
	{
		$fl_class  = "f_right";
		$div_class = "therapist_r";
	}
	$b_loc += 1;
	$therapists_html .= "\n".'<div class="'.$div_class.'">'."\n";
	$therapists_html .= '<a href="edit_bios.php?b_loc='.$b_loc.'">';
	$therapists_html .= '<h1 class="h1_therapist">';
	$therapists_html .= $therapist_name.'</h1></a>';
	$therapists_html .= "\n";
	if ($therapist_src)
	{
		$therapists_html .= '<a href="edit_image.php?pg=therapists&img_src='.$therapist_src.'">';
		$therapists_html .= '<img class="'.$fl_class.'" src="'.HTML_ADMIN_PATH.'pt_site_imgs/'.$therapist_src.'?v='.rand().'" '."\n";
		$therapists_html .= ' alt="'.$therapist_name.'" title="'.$therapist_name.'" />';
		$therapists_html .= "</a>\n";
	}
	$therapists_html .= '<p><a href="edit_bios.php?b_loc='.$b_loc.'">'.$therapist_desc.'</a></p>';
	$therapists_html .= "</div>";
	$therapists_html .= '<p class="add_bio_link">'.str_repeat("*",16).'<br><a href="add_bios.php?b_loc='.$b_loc.'">Add New Bio Here</a>';
	$therapists_html .= '<br><br>'.str_repeat("*",16).'</p>';
}
?>