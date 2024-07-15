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
			<div id="map_canvas">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6497.027317860777!2d-97.29682528496558!3d35.49157505147819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87b23aeeb5b8980f%3A0xd5059b54a7fc2f1e!2s13390%20NE%2023rd%20St%2C%20Choctaw%2C%20OK%2073020!5e0!3m2!1sen!2sus!4v1721082414115!5m2!1sen!2sus" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div> 

			<h4>Hours:</h4>
			<p><a href="edit_basics.php?pg=<?php echo $cur_pg;?>"><?php echo $pt_hours;?></a></p>
			<?php require("html/admin_fb_right.php"); ?>