<?php
// pt_menu_bar.php
// 11-18-11 rlb
// drop down menu bar for pt website

// must build therapists link from bios.dat file
$ths_file = file_get_contents("files/bios.dat");
$ths_html = "";
$ths_list = explode("*",$ths_file);
foreach($ths_list as $th)
{
	// now explode based on \n
	$th_info = explode("\n",trim($th));
	$th_name = $th_info[0];
	$th_a_name = str_replace(" ","",$th_name);
	$th_a_name = str_replace(",","",$th_a_name);
	$th_a_name = trim(str_replace(".","",$th_a_name));

	$ths_html .= '<li><a class="ul_therapists"'."\n";
	$ths_html .= 'href="therapists.php#'.$th_a_name.'">';
	$ths_html .= $th_name.'</a></li>'."\n";
}
?>	
		<ul>
			<li><a href="index.php">Home</a>	
			</li>
			<li><a href="about.php">About Us</a>
			</li>
			<li><a href="therapists.php">Therapists</a>
				<ul>
					<?php echo $ths_html;?>
				</ul>
			</li>
			<li><a href="services.php">Services</a></li>
			<li><a href="patients.php">Patients</a>
				<ul>
					<li><a class="ul_patients" href="patients.php#forms">Forms</a></li>
					<li><a class="ul_patients" href="patients.php#testimonials">Testimonials</a></li>
				</ul>
			</li>
			<li><a href="contact.php">Contact Us</a>
			</li>
		</ul>