<?php
// descs_instruct.php
// 12-17-11 rlb
// Display instructions for the desc textarea fields
// applies to Home and About Us pages

echo '<h2>Instructions</h2>';
switch($desc_type)
{
	case("main"):
		$instruct_text = '<p>This is the Home Page Welcome.</p>';
		break;
	case("about"):
		$instruct_text = '<p>This is About Us description.</p>';
		break;
	default;
		$instruct_text = '<p>Unknown Description Page.</p>';
}
echo '<br>'.$instruct_text;
?>
<p>Make changes to the description and press &lt;Update&gt;.</p>
<p>Note: This description can contain HTML tags, such as 
<strong>'&lt;strong&gt;'</strong> and <strong>'&lt;a href=""&gt;'</strong>.</p>
<p>They should be changed only by someone with knowledge of HTML.</p>