<?php
// pt_funcs.php
// 11-28-11 rlb
// contains needed functions for pt website

function load_testimonials($filename, $admin_flg, $admin_path)
{
	// load testimonial for .dat file
	// must determine between main index page and patient page
	// -	$filename determines whether it is the home page or
	// patient page testimonial
	// -	$admin_flg determines whether it is being called from 
	// the admin pages.  If so, use $admin_path and include link
	// info.
	
	if ($admin_flg)
		$fname = $admin_path."files/".$filename.".dat";
	else
		$fname = "files/".$filename.".dat";
	$tests_file = "";
	if (file_exists($fname))
	{
		$tests_file = file_get_contents($fname);
		if (!$tests_file)
		{
			$tests_file = "";
		}
	}
	$t_loc = 0;
	if ($admin_flg)
		// if patients page, provide links to insert testimonials
		if ($filename == "testimonials")
			$tests_html = '<p><a href="add_testimonial.php?t_loc='.$t_loc.'">Add New Testimonial Here</a></p>';
		else
			$tests_html = "";
	else
		$tests_html = "";
	$tests_list = array_map("trim",explode("*",$tests_file));

	foreach($tests_list as $test)
	{
		// testimonial is separated from name/city by "-"
		$test_name = "";
		$test_city = "";
		$test_info = explode("-",$test);
		$test_desc = trim($test_info[0]);
		if (count($test_info) > 1)
		{
			// patient name/city, if present, are on 2 lines
			$test_patient = trim($test_info[1]);
			$test_patient = explode("\n",$test_patient);
			$test_name = trim($test_patient[0]);
			if (count($test_patient) > 1)
				$test_city = trim($test_patient[1]);
		}
		// convert testimonial array into string
		$testimonial = str_replace("\n","<br>",$test_desc);
		// build HTML
		$tests_html .= "\n".'<p class="testimonial">&ldquo;';
		if ($admin_flg)
		{
			$t_loc += 1;
			// strip tags from testimonial and add anchor
			$testimonial = strip_tags($testimonial);
			$tests_html .= '<a href="edit_testimonial.php?fname='.$filename.'&t_loc='.$t_loc.'">';
		}
		$tests_html .= $testimonial;
		$tests_html .= '&rdquo;</p>';
		$tests_html .= "\n";
		$tests_html .= '<p class="right">'.$test_name;
		if ($test_city)
			$tests_html .= "<br>".$test_city;
		$tests_html .= "</p>\n";
		if ($admin_flg)	$tests_html .= "</a>\n";
		// if patients page, provide links to insert testimonials
		if ($filename == "testimonials" && $admin_flg)
		{
			$tests_html .= '<p><a href="add_testimonial.php?t_loc='.$t_loc.'">Add New Testimonial Here</a></p>';
		}

	}
	return $tests_html;
}

function resize_img($pic, $img_w, $img_h, $scale_opt)
{
	// $pic - name of the picture to convert 
	// $img_w - width of new pic in pixels
	// $img_h - height of new pic in pixels
	// $scale_opt - 0 = use both img_w and img_h
	//				1 = use only img_w, keeping scale
	//				2 = use only img_h, keeping scale
	
	if (($orig = imagecreatefromjpeg($pic)) === false) return false;
	if (($new_pic = imagecreatetruecolor($img_w, $img_h)) === false) 
	{
		imagedestroy($orig);
		return false;
	}
	$pic_w = imagesx($orig);
	$pic_h = imagesy($orig);
	switch($scale_opt)
	{
		case(1):
			// adjust $img_h so that scale stays the same
			$img_h = round(($pic_h * $img_w) / $pic_w);
			break;
		case(2):
			// adjust $img_w so that scale stays the same
			$img_w = round(($pic_w * $img_h) / $pic_h);
	}
	if (!imagecopyresampled($new_pic, $orig, 0, 0, 0, 0, $img_w, $img_h, $pic_w, $pic_h)) 
	{
		imagedestroy($orig);
		imagedestroy($new_pic);
		return false;
	}
	imagedestroy($orig);
	return $new_pic;	
}
function check_img_size($pic, $img_w, $img_h)
{
	// checks that the image can be scaled the size img_w / img_h
	// ratio must be within 5% (just made that number up!)
	// $pic - name of the picture to test
	// $img_w - width of pic to test for
	// $img_h - height of pic to test for
	
	$ratio_pct = 0.05;
	$test_ratio = $img_w / $img_h;
	if (($orig = imagecreatefromjpeg($pic)) === false) return -1;
	$pic_w = imagesx($orig);
	$pic_h = imagesy($orig);
	$pic_ratio = $pic_w / $pic_h;
	if (abs($test_ratio - $pic_ratio) > $test_ratio * $ratio_pct)
		return 1;  // invalid image size ratio
	else
		return 0;	// valid size ratio
}

function get_next_bios_image()
{
	// retrieve next counter from bios_image_next.dat to create name
	// and increment file
	$bios_next_fname = ADMIN_PATH."files/bios_image_next.dat";
	$bios_next = 99;
	if (file_exists($bios_next_fname)) $bios_next = trim(file_get_contents($bios_next_fname));
	$bios_image_name = "bios_".$bios_next.".jpg";
	$bios_next += 1;
	file_put_contents($bios_next_fname, $bios_next);
	return $bios_image_name;
}
?>