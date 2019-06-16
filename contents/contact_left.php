<?php 
// contact_left.php
// 12-12-11 rlb
// left side content for Contact Us Page

?>
			<div id="div_contact">
				<h1>Contact Us</h1>
				<p>Use form below to email Choctaw Physical Therapy.</p>
				<form action="contact.php" method="post" name="contact_form">
				<table cellspacing="4px">
					<tr>
						<td></td><td><h4><?php echo $msg; ?></h4></td>
					</tr>
					<tr>
						<td class="contact_label">Subject:</td>
						<td><input type="text" name="subject" size="30"></td>
					</tr>
					<tr><td> </td><td></td></tr>
					<tr><td> </td><td></td></tr>
					<tr><td> </td><td></td></tr>
					<tr><td> </td><td></td></tr>
					<tr>
						<td class="contact_label">Body:</td>
						<td><textarea name="body" rows="13" cols="40"></textarea></td>
					</tr>	
					<tr><td> </td><td></td></tr>
					<tr><td> </td><td></td></tr>
					<tr><td> </td><td></td></tr>
					<tr><td> </td>
						<td><input class="contact_button" type="submit" name="submit" value="Send" 
									onclick="return validate_form(this)">&nbsp; &nbsp;
						</td>
					</tr>
					<tr><td><br></td><td></td></tr>
					<tr><td><br></td><td></td></tr>
					<tr><td><br></td><td></td></tr>
					<tr><td><br></td><td></td></tr>
				</table>
				</form>
			</div>