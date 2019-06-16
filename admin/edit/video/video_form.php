<?php
// video_form.php
// 12-26-11 rlb
// Display form for changing the video
// displayed on the About Us page

?>
<h1>Video Update Screen</h1>

<form name="video_form" action="edit_video.php" method="POST" >
	<fieldset>
	<legend>YouTube Video Link</legend>
	<?php if ($video_src != "") 
	{  ?>
		<p>Current Video:</p>
		<iframe <?php echo 'width="'.$video_x.'" height="'.$video_y.'" 
				src="'.$video_src.'" frameborder="0" ';?>
				allowfullscreen>
		</iframe>
	<?php 
	} ?>
		<p class="err_msg"><strong><?php echo $err_msg;?></strong></p>
		<p>New Video YouTube Web Address:</p>
		<input name="yt_link" type="text" size="60" />
		<input class="contact_button" name="link_submit" type="submit" value="Submit Link">
		</p>New Video:</p>
		<?php	if ($submit_flg)
				{
					echo '
					<iframe width="'.$video_x.'" height="'.$video_y.'" 
						src="'.$new_link.'" frameborder="0" 
						allowfullscreen>
					</iframe>';
				}
				else
				{
					echo '<img class="admin_img" src="'.$no_link.'" width="'.$video_x.'" height="'.$video_y.'" />';
				}
		?>

	</fieldset>
	<p><input class="contact_button" name="video_submit" type="submit" value="Use New Video"
			<?php if (!$submit_flg) echo 'disabled="disabled"';?> >
		<input class="contact_button" name="video_cancel" type="submit" value="Cancel">
		<input name="new_link_form" type="hidden" value="<?php echo $new_link;?>" >
		<input name="submit_flg_form" type="hidden" value="<?php echo $submit_flg;?>" >
	</p>
</form>