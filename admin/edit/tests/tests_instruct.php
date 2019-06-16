<?php
// tests_instruct.php
// 12-18-11 rlb
// Display instructions for the testimonial textarea fields
// applies to Home and Patient pages
// each page will have different set of instructions

echo '
<h2>Instructions</h2>';
$instruct_text2 = "<p>The Testimonial, Patient Name, and City fields can 
					edited.</p>";
if ($main_flg)
{
	$instruct_text = '<p>This is the Home Page Testimonial.</p>';
}
else if ($add_flg)
{
	$instruct_text = '<p>The is a new Patient Page Testimonial.</p>';
}
else
{
	$instruct_text = '<p>The is a Patient Page Testimonial.</p>';
	$instruct_text2 .= '<p>You can change the order of the Testimonial 
		by using the Order field.  Also, the Testimonial can be removed
		with the &lt;Delete&gt; button.';
}
echo '<br>'.$instruct_text.$instruct_text2;
?>
<p>Make changes and press &lt;Update&gt;.</p>
<p>
<p>Note: This testimonial can contain HTML tags, such as 
<strong>'&lt;strong&gt;'</strong>.</p>
<p>They should be changed only by someone with knowledge of HTML.</p>