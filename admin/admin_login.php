<?php
// admin_login.php
// 12-09-11 rlb
// login page for pt site administration

// turn sessions on
if (!session_id()) session_start();

require_once("code/admin_include.php");
require("code/admin_login_process.php");
require("html/admin_html_head.php");

?>
<body>
<div id="container">
<?php require("html/admin_header.php"); ?>
	<div id="content">
		<div id="left">
			<h1>Login Page</h1>
			<form action="admin_login.php" method="POST">
				<p><input name="passwd" type="password" value=""></p>
				<p><input class="contact_button" name="submit_login" type="submit" value="Login">
			</form>
			<p class="err_msg"><?php echo $err_msg;?></p>
		</div>
		<div id="right">
		</div>
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/admin_footer.php"); ?>
</div><!-- end of div - container -->
</body>
</html>