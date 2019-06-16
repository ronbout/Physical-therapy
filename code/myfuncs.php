<?php
// myfuncs.php
// toolbox of useful functions

function getDateDiff($date1, $date2)
{
	// need to be able to calc the difference between 2 datetimes
	// in days, instead of seconds.  must adjust for GMT 
	// this difference can be calculated using mktime and gmmktime
	$nowDT = mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
	$gmDT = gmmktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
	$diffGMT = $nowDT - $gmDT;
	$conv1 = (int)(($date1 - $diffGMT) / (24 * 60 * 60));
	$conv2 = (int)(($date2 - $diffGMT) / (24 * 60 * 60));
	return ($conv1 - $conv2);
}

function mysqlConnect($db, &$errorCode)
{
	// connects to database $db 
	// must get user and password from passwords dir
	// returns either mysqli object or error code

	$errorCode = 0;
	$passInfo = file("c:\program files\apache software foundation\apache2.2\passwords\\".$db.".txt");
	if (!$passInfo) 
	{	
		$errorCode = -1;   // error -1 could not retrieve user/password info
		return false;
	}
	
	$user = trim($passInfo[0]);
	$password = trim($passInfo[1]);
	$mysqli = new mysqli('localhost', $user, $password, $db);
	if ($mysqli->connect_error) 
	{	
		$errorCode = $mysqli->connect_errno;
		return false;
	}
	return $mysqli;
	
}

function gmail($to, $subject, $body, $from="", $toName="")
{
	// function to send email using PHPMailer
	// through gmail apps account with smtp
	

	include("class.phpmailer.php");
	include("class.smtp.php");
	// get email name and password
	$passInfo = file("c:\program files\apache software foundation\apache2.2\passwords\gmail.txt");
	if (!is_array($passInfo)) return "Could not access gmail user/password info!";
	$mail             = new PHPMailer();

	$gmailUser = trim($passInfo[0]);
	$mail->IsSMTP();
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port

	$mail->Username   = $gmailUser;  			 // GMAIL username
	$mail->Password   = trim($passInfo[1]);            // GMAIL password

	$mail->From       = $gmailUser;
	$mail->FromName   = $from;
	$mail->Subject    = $subject;
	$mail->AltBody    = $body; //Text Body
	$mail->WordWrap   = 50; // set word wrap

	$mail->MsgHTML($body);

	$mail->AddReplyTo($gmailUser,$from);

	//$mail->AddAttachment("/path/to/file.zip");             // attachment
	//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment

	$mail->AddAddress($to,$toName);

	$mail->IsHTML(true); // send as HTML

	if(!$mail->Send())
	{
		return $mail->ErrorInfo;
	} 
	else 
	{
		return 0;
	}		
}

function testEmail($str)
{
	// user regulare expression to test valid email
	$pattern = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}(?!\S)/i";
	return preg_match($pattern, $str);
}
function sortAssoc($inArray, $sortKey, $sortOrder=1)
{
	// sort 2 dim assoc arrays that have a $sortKey in 2nd level
	// $sortOrder=1 Asc, $sortOrder=2 Desc
	$temp = array();
	$sorted = array();
	foreach($inArray as $key=>$row)
	{
		// check that $sortKey actually exists in every row
		if (!isset($row[$sortKey])) return false;
		$temp[$key] = $row[$sortKey];
	}
	if ($sortOrder == 1)
		asort($temp);
	else
		arsort($temp);
	foreach($temp as $key=>$row)
	{
		$sorted[] = $inArray[$key];
	}
	return $sorted;
}
function get_filelist($dir, $path_flag=true, $file_type="", $first_flag=false)
{
	// recursive function that returns the files in $dir directory and
	// all subdirectories.  Can narrow down by $file_type
	// w/o path_flag, returns only filenames
	// returns filelist or false if no directory or directory empty
	
	static $filelist;
	if ($first_flag) $filelist = array();
	if (!is_dir($dir)) return false;
	if (!$dp = opendir($dir)) return false;  // did not have permissions
	while(($file = readdir($dp)) !== false)
	{
		if ($file == '.' || $file == '..') continue;
		if (is_dir($dir.'/'.$file))
		{
			get_filelist($dir.'/'.$file, $path_flag, $file_type);
		}
		else
		{
			$ext = pathinfo($dir.'/'.$file, PATHINFO_EXTENSION);
			if (!$file_type || $file_type == $ext)
			{
				if ($path_flag)
					$filelist[] = $dir.'/'.$file;
				else
					$filelist[] = $file;
			}
		}
	}
	return $filelist;
}
?>
