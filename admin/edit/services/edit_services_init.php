<?php
// edit_services_init.php
// 12-20-11 rlb
// init code for editing list of specialties on 
// services page.  List is broken into 2 groups and
// modified w textarea fields

$services_fname = ADMIN_PATH."files/specialties.dat";

// check for submit button
if (isset($_POST['services_submit']))
{
	// save info to specialties.dat
	extract($_POST);
	$spec_file = $spec_list1."\n*\n".$spec_list2;	
	file_put_contents($services_fname, $spec_file);
	// now, return to main
	header("Location: admin_services.php");
}
// check for cancel button
else if (isset($_POST['services_cancel']))
{
	// don't update and just return to admin home page
	header("Location: admin_services.php");
}
else
{
	// prepare form
	// retrieve list of services
	$spec_file = "Orthopedics\nSpinal Rehab and Manipulation\nSports Medicine\n*\nJoint Replacement Rehab";
	$spec_file .= "\nGeriatric\nSpinal Decompression\nTherapy Modalities (passive treatments)";
	if (file_exists($services_fname)) $spec_file = file_get_contents($services_fname);

	$spec_list = array_map("trim",explode("*",$spec_file));
}

?>