<?php
// html_head.php
// 11-24-11 rlb
// HTML head section

require("code/pt_funcs.php");
$basics_fname = "files/basics.dat";
require("code/load_basics.php");
require_once("code/myfuncs.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script	async	src="https://www.googletagmanager.com/gtag/js?id=UA-78794541-1"	></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() {
		dataLayer.push(arguments);
	}
	gtag("js", new Date());

	gtag("config", "UA-78794541-1");
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/png" href="images/favicon.png" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Choctaw Physical Therapy</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script> 
<script type="text/javascript" src="code/pt_funcs.js"></script> 
</head>