<?php
// admin_include.php
// 12-11-11 rlb
// define statements used in pt website admin
// mainly used for setting admin path
// back to root

define("ADMIN_PATH","../");
define("HTML_ADMIN_PATH", "../");
require_once(ADMIN_PATH."code/pt_defines.php");
require_once(ADMIN_PATH."code/pt_funcs.php");
$basics_fname = ADMIN_PATH."files/basics.dat";
require_once(ADMIN_PATH."code/load_basics.php");
?>