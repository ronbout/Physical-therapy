<?php
// edit_testimonial_init.php
// 12-18-11 rlb
// init code for testimonial editing.  GET variable -fname-
// will determine whether it is from the Home Page 
// or the Patients page.  If Patients page, then also
// need to know which testimonial -t_loc-.  If Patients page, need
// to allow for deletion.
// Need to check for form submit, form cancel, or form prep

if (!isset($_GET['fname']) || !isset($_GET['t_loc']))
{
	// cannot process without GET variables, send back to main admin
	header("Location: admin.php");
}
extract($_GET);
// set up flag for main testimonial.  need to test often
if ($fname == "main_testimonial")
	$main_flg = true;
else
	$main_flg = false;
	
$test_fname = ADMIN_PATH."files/".$fname.".dat";

// retrieve testimonial
$tests_file = "";
if (file_exists($test_fname))  $tests_file = file_get_contents($test_fname);
// pull out testimonial based on t_loc
// use array map to trim each element as explode inserts \n creating extra space every time
$tests_list = array_map("trim",explode("*",$tests_file));
$t_cnt = count($tests_list);

// check for submit button
if (isset($_POST['test_submit']))
{
	// extract info and update file, making sure tests goes in correct order
	extract($_POST);
	$test = $t_desc;
	$test .= "\n-\n".trim($t_name)."\n".trim($t_city);
	// get old loc and new loc..if different remove original
	// and then insert new location
	if ($t_loc != $new_loc)
	{
		array_splice($tests_list, $t_loc-1, 1);
		array_splice($tests_list, $new_loc-1, 0, $test);
	}
	else
		$tests_list[$t_loc-1] = $test;
	// convert array to string for output and save
	$tests_list = implode("\n*\n",$tests_list);
	file_put_contents($test_fname, $tests_list);
	// now, return to admin
	if ($main_flg)
		header("Location: admin_index.php");
	else
		header("Location: admin_patients.php");
}
// check for delete button
else if (isset($_POST['test_delete']))
{
	array_splice($tests_list, $t_loc-1, 1);
	// convert array to string for output
	$tests_list = implode("\n*\n",$tests_list);
	file_put_contents($test_fname, $tests_list);
	// now, return to main
	if ($main_flg)
		header("Location: admin_index.php");
	else
		header("Location: admin_patients.php");
}
// check for cancel button
else if (isset($_POST['test_cancel']))
{
	// don't update and just return to admin page
	if ($main_flg)
		header("Location: admin_index.php");
	else
		header("Location: admin_patients.php");
}
else
{
	// make sure that array element exists...just in case
	if (count($tests_list) < $t_loc)
	{
		if ($main_flg)
			header("Location: admin_index.php");
		else
			header("Location: admin_patients.php");
	}
	$test = $tests_list[$t_loc-1];
	// testimonial is separated from name/city by "-"
	$test_name = "";
	$test_city = "";
	$test_info = explode("-",$test);
	$test_desc = trim($test_info[0]);
	if (count($test_info) > 1)
	{
		// patient name/city, if present, are on 2 lines
		$test_patient = trim($test_info[1]);
		$test_patient = explode("\n",$test_patient);
		$test_name = trim($test_patient[0]);
		if (count($test_patient) > 1)
			$test_city = trim($test_patient[1]);
	}
	// set up variables for form
	$add_flg     = false;
	$heading_fld = "Update Testimonial Screen";
	$legend_fld  = "Testimonial Information";
	$action_fld  = "edit_testimonial.php?fname=".$fname."&t_loc=".$t_loc;
}

?>