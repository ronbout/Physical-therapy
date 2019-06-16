<?php
// main_admin_process.php
// 12-10-11 rlb
// processes main_admin_form from main admin_right page, right side
// either resets the counters or updates the password

// check for counter reset
if (isset($_POST['reset_cnt']))
{
	// delete counter file
	$counter_fname = "../files/counters.dat";
	if (file_exists($counter_fname)) unlink($counter_fname);
}

$pass_msg = "";
// check for password update
if (isset($_POST['chg_pass']))
{
	extract($_POST);
	$pass_fname = "files/misc.dat";
	// check that original password is correct
	// get password from file
	$pwd_file = trim(file_get_contents($pass_fname));
	// compare entered password to stored password
	$passwd = md5(trim($passwd));
	if ($passwd != $pwd_file)
	{
		// unable to log in
		$pass_msg = "Invalid Current Password.";
	}
	else
	{
		if ($new_pass1 == "")
		{
			$pass_msg = "Must enter new Password.";
		}
		else
		{
			// check that both new passwords match
			if ($new_pass1 != $new_pass2)
			{
				$pass_msg = "New passwords must match.";
			}
			else
			{
				// update new password 
				// turn off for sample site
				//file_put_contents($pass_fname, md5(trim($new_pass1)));
				$pass_msg = "Cannot change Password on sample site.";
			}
		}
	}
}

?>