<?php 
// admin.php for administering pt site
// 12-05-11 RLB

require_once("code/admin_include.php");
require("code/main_admin_process.php");
require("code/admin_login_check.php");
require("html/admin_html_head.php");

?>
<body OnKeyPress="return disableEnterKey(event)">
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<h1>Web Site Administration</h1>
			<?php require("html/admin_main_instruct.php");?>
		</div>
		<div id="right">
			<?php require("html/admin_right.php");?>
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>