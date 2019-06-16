<?php
// pt_fb_right.php
// 11-27-11 rlb
// facebook link for right side for pt website
?>
<!-- next section required for facebook like button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- end of facebook javascript code.  Like button below -->
<!-- actual code to insert like button -->
			<div class="fb-like" data-href="http://www.facebook.com/pages/Choctaw-Physical-Therapy/138405352874381" 
			data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>

			<p><a href="http://www.facebook.com/pages/Choctaw-Physical-Therapy/138405352874381"
				target="_blank"><img src="images/fb.png" /></a></p>
