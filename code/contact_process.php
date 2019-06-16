<?php
// contact_process.php
// 11-24-11 rlb
// processing for contact form

// Deployed mail command will be different than development
// mail_mode: 1 -development  2 -email off  0 -ready for hosted site
$mail_mode = 2;
$msg = "<br>";

// see if form has been submitted
if (isset($_POST['submit']))
{
	$subject = trim($_POST['subject']);
	$body = $_POST['body'];
	$body = str_replace("\n","<br>",$body);
	$sendFromName = "Website Contact";
	$sendToName = "Choctaw Physical Therapy";
	if ($body)
	{
		switch($mail_mode)
		{
			case 1:
				$sendTo = "ronbout@yahoo.com";
				$result = gmail($sendTo, $subject, $body, $sendFromName, $sendToName);
				break;
			case 2:
				$result = false;
				break;
			case 0:
				$sendTo = $pt_email;
				$header = 'From: Website Contact <website@ChoctawPhysicalTherapy.com>';
				$result = mail($sendTo, $subject, $body, $header);
				// gmail and mail return result differently, so must 
				// flip true/false
				if ($result)
					$result = false;
				else
					$result = true;
		}
		if ($result)
		{
			$msg = "Error sending email.  Error Code: ". $result;
		}
		else
		{
			$msg = "Message sent.";
		}	
		
	}
	else
	{
		$msg = "Please enter message to send.";
	}
}
?>