<?php 
// index.php
// 11-24-11 rlb
// website patients page

require("html/html_head.php");
require("code/patients_init.php"); 

?>

<body onload="initialize()">
<div id="container">
<?php require("html/pt_header.php"); ?>
	<div id="content">
		<div id="left">
			<?php require("contents/patients_left.php");?>
		</div><!-- end of div - left -->
		<div id="right">
			<?php require("html/pt_map_right.php");?>
		</div><!--  end of div - right  -->
		<div id="footerline"></div>
	</div><!-- end of div - content  -->
<?php require("html/pt_footer.php"); ?>
</div><!-- end of container -->
</body>
</html>