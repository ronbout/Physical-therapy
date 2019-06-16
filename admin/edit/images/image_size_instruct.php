<?php
// image_size_instruct.php
// 12-30-11 rlb
// instructions for the image size requirements

switch($pg)
{
	case("index"):
	case("therapists"):
	case("bios"):
	case("add"):
	case("edit"):
		// these are the bio pics and the home page pic, they will
		// both be adjust to fit into the width
		$instruct_text = '<p>This pictue will be sized to a 
			width of '.$pic_x.'.  The image will be scaled to 
			that size, adjusting the height as necessary.</p>';
		break;
	case("services");
		// this is the only picture that must have the right scale
		$instruct_text = '<p>This pictue will be sized to a 
			width of '.$pic_x.' and height of '.$pic_y.' to fit in the page.
			The image must be close to that ratio (within 5%).  The upload 
			process will scale the picture if it can.  If it cannot, the 
			image will need to be cropped in a separate program to fit.</p>';
		break;
	default:
		$instruct_text = "No sizing info available.";
}
$instruct_text .= '<p>Click on the image to see how the picture will look on
					the website.</p>';

echo '<p><strong>Image Size Instructions:</strong></p>';
echo $instruct_text;
