<?php
// edit_video_submit.php
// 12-27-11 rlb
// parse YouTube video link to create
// embed link.  Return error messages as needed.

extract($_POST);
$submit_flg = $submit_flg_form;
$new_link = $new_link_form;
// check for numerous possible errors
if (!isset($yt_link) || $yt_link == "")
{
	$err_msg = "Must enter video web address.";
}
else
{
	if (!($url_array = parse_url($yt_link)))
	{
		// invalid url
		$err_msg = "Invalid Web Address.";
	}
	else
	{
		if (!isset($url_array['host']) || strtolower($url_array['host']) != strtolower('www.youtube.com'))
		{
			$err_msg = "Must be YouTube video.";
		}
		else
		{
			$query_vid = "";
			$query_array = array_map("trim",explode("&",$url_array['query']));
			foreach ($query_array as $query_get)
			{
				if (strtolower(substr($query_get,0,2)) == strtolower("v="))
				{
					$query_vid = array_map("trim", explode("=",$query_get));
					$query_vid = $query_vid[1];
					break;
				}
			}
			if ($query_vid == "")
			{
				$err_msg = "Could not find Video Id in URL";
			}
		}
	}
}
// either have err_msg or have the youtube video id
if (!$err_msg)
{
	$new_link = "http://www.youtube.com/embed/".$query_vid."?rel=0&wmode=transparent";
	$submit_flg = true;
}

?>