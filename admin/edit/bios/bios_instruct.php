<?php
// bios_instruct.php
// 12-23-11 rlb
// Display instructions for the bios fields
// for the Therapists page.
// applies to both add and editing bios.

if ($add_flg)
{
	$instruct_text = '<p>Add a New Employee Biography by entering
		the employee name and bio description.</p>
		<p>To add/change photo, click on the image.</p>
		<p>Click &lt;Update&gt; to add to website.</p>';
}
else
{
	$instruct_text = '<p>Edit an Employee Biography by updating
		the employee name and/or bio description.</p>
		<p>To add/change photo, click on the image.</p>
		<p>Also, change the order of the bio on the page using the
		Order field.</p>
		<p>Click &lt;Update&gt; to update website.</p>
		<p>&ltDelete&gt; to Remove the employee from the website.';
}

?>
<h2>Instructions</h2>
<br>
<p>This is the Employee Biography Entry.</p>
<?php echo $instruct_text; ?>
