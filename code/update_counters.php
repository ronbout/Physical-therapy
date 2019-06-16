<?php
// update_counters.php
// 12-07-11 rlb
// update both total and unique counts
// stored in counts.dat

// as long as user has browser open, only count 1 time
// turn sessions on
if (!session_id()) session_start();

if (!isset($_SESSION['pt_visitor']))
{

	$_SESSION['pt_visitor'] = 1;
	$counter_fname = "files/counters.dat";
	// read from counts file and parse both counts and ip list
	// check if file exists first
	$counters_file = "";
	if (file_exists($counter_fname))
	{
		$counters_file = file_get_contents($counter_fname);
		if (!$counters_file)
		{
			$counters_file = "";
		}
	}

	$counters_info = explode("*", trim($counters_file));
	$total_cnt = (isset($counters_info[0]) && $counters_info[0] != "") ? trim($counters_info[0]) : 0;
	$unique_cnt = (isset($counters_info[1]) && $counters_info[1] != "") ? trim($counters_info[1]) : 0;
	$ip_list = (isset($counters_info[2]) && $counters_info[2] != "") ? trim($counters_info[2]) : "";

	// add to total hits counter
	$total_cnt += 1;

	// get user ip address
	$ip = $_SERVER['REMOTE_ADDR'];

	// search for ip address and update if not found
	if ($ip_list == "")
		$ip_list = array();
	else
		$ip_list = explode("\n",trim($ip_list));
	if (!in_array($ip, $ip_list))
	{
		$unique_cnt += 1;
		$ip_list[] = $ip;
	}
	$ip_list = implode("\n",$ip_list);

	// write out new info
	$counters_file = $total_cnt;
	$counters_file .= "\n*\n".trim($unique_cnt);
	$counters_file .= "\n*\n".$ip_list;
	file_put_contents($counter_fname, $counters_file);
}
?>