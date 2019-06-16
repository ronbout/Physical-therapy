<?php
// therapists_init.php
// 11-24-11 rlb
// init code for therapists page
// retrieves list of therapists including name,
// photo link, and description

// retrieve list of therapists and parse info
// each therapists info is separated by "*", so
// read into string and then explode into array by "*"

$therapists_fname = "files/bios.dat";

$therapists_file = "";
if (file_exists($therapists_fname))
{
	$therapists_file = file_get_contents($therapists_fname);
	if (!$therapists_file)
	{
		$therapists_file = "";
	}
}
$therapists_html = "";
$therapists_list = array_map("trim",explode("*",$therapists_file));
if ($therapists_list == array("")) 	$therapists_list = array();
$therapist_cnt = 0;
foreach($therapists_list as $therapist)
{
	// now explode based on \n
	$therapist_info = array_map("trim", explode("\n",trim($therapist)));
	$therapist_name = $therapist_info[0];
	// strip the name for use as an anchor name which matches the drop-down menu
	$therapist_a_name = str_replace(" ","",$therapist_name);
	$therapist_a_name = str_replace(",","",$therapist_a_name);
	$therapist_a_name = trim(str_replace(".","",$therapist_a_name));
	$therapist_src  = trim($therapist_info[1]);
	$therapist_desc = "";
	$i = 2;
	while ($i < count($therapist_info))
	{
		$therapist_desc .= "<br>".$therapist_info[$i];
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
	$therapists_html .= "\n".'<div class="'.$div_class.'">'."\n";
	$therapists_html .= '<a name="'.$therapist_a_name.'"><h1 class="h1_therapist">';
	$therapists_html .= $therapist_name.'</h1></a>';
	$therapists_html .= "\n";
	if ($therapist_src)
	{
		$therapists_html .= '<img class="'.$fl_class.'" src="pt_site_imgs/'.$therapist_src.'"';
		$therapists_html .= ' alt="'.$therapist_name.'" title="'.$therapist_name.'" />';
		$therapists_html .= "\n";
	}
	$therapists_html .= '<p>'.$therapist_desc.'</p>';
	$therapists_html .= "</div>";
}
?>