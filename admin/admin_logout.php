<?php 
// admin_logout.php
// 12-18-11 rlb
// logs user out by deleting session and returning
// to admin login page

// turn sessions on
if (!session_id()) session_start();

// check that session[pt] has been set or go to login
if (isset($_SESSION['pt'])) unset($_SESSION['pt']);
header ("Location: admin_login.php");

?>