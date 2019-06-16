<?php
// admin_login_process.php
// 12-09-11 rlb
// processes login form if submitted

$err_msg = "";
// check for submit button
if (isset($_POST['submit_login']))
{
	// get password from file
	$pwd_file = trim(file_get_contents("files/misc.dat"));
	// compare entered password to stored password
	$pwd = md5(trim($_POST['passwd']));
	if ($pwd == $pwd_file)
	{
		// log the user in by setting session and sending to admin page
		$_SESSION['pt'] = 'pt';
		header("Location: admin.php");
	}
	else
	{
		// unable to log in
		$err_msg = "Invalid Password.  Try again.";
	}
}

?>