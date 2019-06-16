<?php 
// patients_left.php
// 12-11-11 rlb
// left side content for patients page

?>
			<h1>New Patient Info and Downloads</h1>
			<p>To see how physical therapy has improved people's lives, please read some
				<a href="#testimonials">Testimonials</a>.</p>
			<p>To save time on your first visit, please download the appropriate
				form.</p>
			<a name="forms"><h3>Form Downloads:</h3></a>
			<?php echo $forms_html;?>
			<a name="testimonials"><h1>Testimonials:</h1></a>
			<?php echo $tests_html; ?>