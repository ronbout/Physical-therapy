<?php
// edit_image.php
// 12-21-11 rlb
// edits images from either the Home, Therapists,
// or Services pages.  GET variables determine
// which image to update and is processed in 
// edit_image_init.php

require_once("code/admin_include.php");
require("code/admin_login_check.php");
require("edit/images/edit_image_init.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("edit/images/images_form.php");?>
		</div>
		<div id="right">
			<?php require("edit/images/images_instruct.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>