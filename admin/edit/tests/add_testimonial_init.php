<?php
// add_testimonial_init.php
// 12-20-11 rlb
// init code for adding a testimonial.  GET variable -t_loc-.  
// will determine where in list to put new testimonial

if (!isset($_GET['t_loc']))
{
	// cannot process without GET variables, send back to main admin
	header("Location: admin.php");
}
extract($_GET);
$test_fname = ADMIN_PATH."files/testimonials.dat";

// retrieve testimonial
$tests_file = "";
if (file_exists($test_fname))  $tests_file = file_get_contents($test_fname);
// use array map to trim each element as explode inserts \n creating extra space every time
$tests_list = array_map("trim",explode("*",$tests_file));
$t_cnt = count($tests_list);

// check for submit button
if (isset($_POST['test_submit']))
{
	// save info to main_desc.dat
	extract($_POST);
	$test = trim($t_desc);
	$test .= "\n-\n".trim($t_name)."\n".trim($t_city);
	array_splice($tests_list, $t_loc, 0, $test);
	// convert array to string for output and save
	$tests_list = implode("\n*\n",$tests_list);
	file_put_contents($test_fname, $tests_list);
	// now, return to patients
	header("Location: admin_patients.php");
}
// check for cancel button
else if (isset($_POST['test_cancel']))
{
	// don't update and just return to admin patients page
	header("Location: admin_patients.php");
}
else
{
	$test_desc = "";
	$test_name = "";
	$test_city = "";
	$main_flg  = false;
	$add_flg   = true;
	$heading_fld = "Add Testimonial Screen";
	$legend_fld  = "New Testimonial Information";
	$action_fld  = "add_testimonial.php?t_loc=".$t_loc;
}

?>