<?php
// admin_map_right.php
// 12-12-11 rlb
// admin version of right side (map) of pt website

$cur_pg = $_SERVER['PHP_SELF'];

?>
			<h2>Visit Us:</h2>
			<h4 class="center">
			<a href="edit_basics.php?pg=<?php echo $cur_pg;?>"><?php echo $pt_addr;?><br>
				<?php echo $pt_city;?></a><br>
			<p>
			<table class="t_side">
				<tr><td class="td_label">Phone: &nbsp;</td>
					<td> <a href="edit_basics.php?pg=<?php echo $cur_pg;?>"><?php echo $pt_phone;?></a></td></tr>
				<tr><td class="td_label">Fax: &nbsp;</td>
					<td> <a href="edit_basics.php?pg=<?php echo $cur_pg;?>"><?php echo $pt_fax;?></a></td></tr>
			</table></p>
			<a href="edit_basics.php?pg=<?php echo $cur_pg;?>"><?php echo $pt_email;?></a></h4>
			<br>
			<div id="map_canvas"></div> 
			<p class="center">
				<a target="_blank"
					href="http://maps.google.com/maps?q=13390+NE+23rd+St++Choctaw+OK+73020&hl=en&ll=35.495233,-97.29342&spn=0.006429,0.013475&sll=35.493325,-97.295378&sspn=0.001607,0.003369&vpsrc=6&hnear=13390+NE+23rd+St,+Choctaw,+Oklahoma+73020&t=m&z=16&iwloc=r0">
				Click For Larger Map</a>
			</p>
			<h4>Hours:</h4>
			<p><a href="edit_basics.php?pg=<?php echo $cur_pg;?>"><?php echo $pt_hours;?></a></p>
			<?php require("html/admin_fb_right.php"); ?>