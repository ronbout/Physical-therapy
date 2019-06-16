<?php
// check_forms.php
// 12-28-11 rlb
// check that the files listed in forms.dat
// actually exist on disk.  If they don't,
// remove them from forms.dat

$err_flg = false;
$forms_i = 0;
foreach($forms_list as $form_info)
{
	// convert string into array
	$form_info =  array_map("trim",explode("\n",$form_info));
	$form_name = $form_info[0];
	if (!file_exists($forms_dir.$form_name))
	{
		array_splice($forms_list,$forms_i,1);
		$err_flg = true;
	}
	else
		$forms_i += 1;
}
if ($err_flg)
{
	$forms_file = implode("\n*\n",$forms_list);
	file_put_contents($forms_fname, $forms_file);
}

?>