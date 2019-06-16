<?php
// edit_services.php
// 12-20-11 rlb
// edits list of specialties on services page
// list is broken into 2 groups

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/services/edit_services_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/services/services_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/services/services_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>