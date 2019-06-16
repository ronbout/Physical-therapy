<?php
// load_basics.php
// 12-03-11 rlb
// retrieve basic info for pt website
// including address, contact info, hours, etc
// all info is in /files/basic.dat

// if used in admin pages, do not call pt_defines as it
// has different path
//if (!defined('ADMIN_PATH')) 
require_once("pt_defines.php");
$basics_file = "";
if (file_exists($basics_fname))
{
	$basics_file = file_get_contents($basics_fname);
	if (!$basics_file)
	{
		$basics_file = "";
	}
}

$basics_info = array_map("trim",explode("*", $basics_file));
// check each element of array and load data if present
// otherwise, use default...just in case file problem
$addr_default  = "13390 NE 23rd St.";
$city_defualt  = "Choctaw, Ok 73020";
$phone_default = "405-769-5555";
$fax_default   = "405-769-5558";
$email_default = "choctawpt23@yahoo.com";
$hours_default = "Mon-Thu:  7am - 5pm\nFriday:  7am - 4pm";
$pt_addr  = (isset($basics_info[ADDR_LOC])) ? trim($basics_info[ADDR_LOC]) : $addr_default;
$pt_city  = (isset($basics_info[CITY_LOC])) ? trim($basics_info[CITY_LOC]) : $city_default;
$pt_phone = (isset($basics_info[PHONE_LOC])) ? trim($basics_info[PHONE_LOC]) : $phone_default;
$pt_fax   = (isset($basics_info[FAX_LOC])) ? trim($basics_info[FAX_LOC]) : $fax_default;
$pt_email = (isset($basics_info[EMAIL_LOC])) ? trim($basics_info[EMAIL_LOC]) : $email_default;
$pt_hours = (isset($basics_info[HOURS_LOC])) ? trim($basics_info[HOURS_LOC]) : $hours_default;
$pt_hours = str_replace("\n","<br>",$pt_hours);


?>