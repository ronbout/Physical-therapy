<?php
// edit_basics.php
// 12-13-11 rlb
// edits the basic contact info

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/basics/edit_basics_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/basics/basics_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/basics/basics_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>