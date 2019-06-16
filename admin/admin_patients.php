<?php 
// admin_patients.php
// 12-20-11 rlb
// administration page for patients page
// displays editable fields as links

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("code/admin_patients_init.php");
require("html/admin_html_head.php"); 

?>

<body onload="initialize()">
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require(ADMIN_PATH."contents/patients_left.php");?>
		</div><!-- end of div - left -->
		<div id="right">
			<?php require("html/admin_map_right.php");?>
		</div><!--  end of div - right  -->
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
	<?php require("html/admin_footer.php"); ?>
</div><!-- end of container -->
</body>
</html>