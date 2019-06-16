<?php
// patients_init.php
// 11-26-11 rlb
// init code for patients page
// retrieves file download info
// also retrieves testimonials 

// retrieve list of forms along with descriptions
// then create html code
$forms_fname = "files/forms.dat";
$forms_file = "";
if (file_exists($forms_fname))  
{
	$forms_file = file_get_contents($forms_fname);
	if (!$forms_file)  $forms_file = "";
}
$forms_html = "";
$forms_list = explode("*",$forms_file);
$forms_html = "";
foreach($forms_list as $dform)
{
	// now explode based on \n
	$form_info = explode("\n",trim($dform));
	$form_name = $form_info[0];
	$form_desc = $form_info[1];
	$forms_html .= '<p><a href="forms/form_download.php?fname=';
	$forms_html .= $form_name.'">'.$form_desc.'</a></p>'."\n";
}
// retrieve list of testimonials and parse info
// each testimonial is separated by "*", so
// read into string and then explode into array by "*"

$tests_html = load_testimonials("testimonials", false, "");


?>