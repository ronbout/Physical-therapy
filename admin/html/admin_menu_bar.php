<?php
// admin_menu_bar.php
// 12-01 rlb
// drop down menu bar for admin portion of website

?>	
		<ul>
			<li><a href="index.php">Main</a></li>
			<li><a href="admin_index.php">Home</a></li>
			<li><a href="admin_about.php">About Us</a></li>
			<li><a href="admin_therapists.php">Therapists</a></li>
			<li><a href="admin_services.php">Services</a></li>
			<li><a href="admin_patients.php">Patients</a></li>
			<li><a href="<?php echo ADMIN_PATH;?>index.php" target="_blank">Website</a></li>
			<li><a href="admin_logout.php">Logout</a></li>
		</ul>