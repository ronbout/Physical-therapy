<?php
// edit_basics_init.php
// 12-16-11 rlb
// init code for basic contact info admin page
// allows user to edit basic information that
// is displayed on right side of web pages
// also, email is used for Contact Us page

// 12-28-11 rlb  added return page variable as this
// can be run from any admin page

if (isset($_GET['pg']) && $_GET['pg'] != "")
	$rtn_pg = $_GET['pg'];
else
	$rtn_pg = "admin_index.php";

// check for submit button
if (isset($_POST['basics_submit']))
{
	// save info to basics.dat
	extract($_POST);
	$basics_file = $b_addr;
	$basics_file .= "\n*\n".$b_city;
	$basics_file .= "\n*\n".$b_phone;
	$basics_file .= "\n*\n".$b_fax;
	$basics_file .= "\n*\n".$b_email;
	$basics_file .= "\n*\n".str_replace("<br>","\n",$b_hours);
	file_put_contents($basics_fname, $basics_file);
	// now, return to calling page
	header("Location: ".$rtn_pg);
}
// check for cancel button
else if (isset($_POST['basics_cancel']))
{
	// don't update and just return to calling page
	header("Location: ".$rtn_pg);
}
else
{
	// prepare form
	// convert <br> to \n in pt_hours for textarea
	$pt_hours = str_replace("<br>","\n",$pt_hours);
	$action_fld = "edit_basics.php?pg=".$rtn_pg;
}

?>