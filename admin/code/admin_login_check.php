<?php
// admin_login_check.php
// 12-09-11  rlb
// check that user is logged in
// if not, calls login page.

// turn sessions on
if (!session_id()) session_start();

// check that session[pt] has been set or go to login
if (!isset($_SESSION['pt']))
{
	header ("Location: admin_login.php");
}

?>