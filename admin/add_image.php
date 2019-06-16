<?php
// add_image.php
// 12-24-11 rlb
// adds image for bio page.  processing
// done in add_image_init.php

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/images/add_image_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/images/add_images_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/images/add_images_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>