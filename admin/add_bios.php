<?php
// add_bios.php
// 12-26-11 rlb
// adds an employee to the therapists bio page

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/bios/add_bios_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/bios/bios_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/bios/bios_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>