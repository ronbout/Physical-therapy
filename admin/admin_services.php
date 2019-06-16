<?php 
// admin_services_index.php
// 12-20-11 rlb
// administration page for website Services page
// displays editable fields as link

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("code/admin_services_init.php");
require("html/admin_html_head.php");

?>

<body onload="initialize()">
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require(ADMIN_PATH."contents/services_left.php");?>
		</div><!-- end of div - left -->
		<div id="right">
			<?php require("html/admin_map_right.php");?>
		</div><!--  end of div - right  -->
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>