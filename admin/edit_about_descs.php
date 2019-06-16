<?php
// edit_about_descs.php
// 12-18-11 rlb
// edits the about us page info

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/descs/edit_about_descs_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/descs/descs_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/descs/descs_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>