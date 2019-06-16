<?php
// add_testimonial.php
// 12-18-11 rlb
// Adds testimonial to the patient page.  GET variable 
// determines where to place the testimonial and is 
// processed in add_testimonial_init.php

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/tests/add_testimonial_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/tests/tests_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/tests/tests_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>