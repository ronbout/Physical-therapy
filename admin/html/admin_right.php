<?php
// admin_right.php
// 12-10-11 rlb
// right-side section of main administration page
// contains counter info and password update form

$counter_fname = ADMIN_PATH."files/counters.dat";
// read from counts file and parse both counts 
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

?>
			<form name="main_admin_form" action="admin.php" method="POST">
			<div id="counters">
				<h2>Counters</h2>
				<table>
					<tr><td class="td_label">Total Visitors: </td>
						<td class="td_cnt"><?php echo $total_cnt;?></td>
					</tr>
					<tr><td class="td_label">Unique Visitors: </td>
						<td class="td_cnt"><?php echo $unique_cnt;?></td>
					</tr>
				</table>
				<p><input class="contact_button" name="reset_cnt" type="submit" 
					value="Reset Counters"></p>
			</div><!-- end of div - counters --> 
			<div id="password">			
				<h2>Password Update</h2>
				<p><?php echo $pass_msg;?></p>
				<table>
				<tr><td class="td_label">Current Pass: </td>
					<td><input name="passwd" type="password" size="10" value=""></td>
				</tr>
				<tr><td class="td_label">New Pass: </td>
					<td><input name="new_pass1" type="password" size="10" value=""></td>
				</tr>
				<tr><td class="td_label">Confirm Pass: </td>
					<td><input name="new_pass2" type="password" size="10" value=""></td>
				</tr>
				</table>
				<p><input class="contact_button" name="chg_pass" type="submit" value="Change Password"></p>
			</div><!-- end of div - password -->
			</form>