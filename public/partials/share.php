<?php

class Share_Post_Pages_Preview_Publicly_Public_Share {

	function preview_init(){

		if(current_user_can('administrator')) {
		
			if(isset($_GET['preview_id']) && isset($_GET['preview']) && $_GET['preview']==true) {
				add_action('wp_footer', array( $this, 'preview_footer'), PHP_INT_MAX);	
			} 
			
			else if(isset($_GET['action']) && $_GET['action']=='share_post_pages_preview') {
				
				if(check_admin_referer('share_post_pages_previewform')){
					$pid = mt_rand(1111111111,9999999999);
					set_transient('share_post_pages_preview_'.$pid, stripslashes($_POST['preview_html']), 5*24*3600);
					
					echo '<h1>Your sharable link is ready!!</h1>
					<input type="text" id="copy-input" value="'. site_url().'/?previewid='.$pid.'" style="padding: 5px;font-size: 14px;min-width: 388px;" />
					<input type="button" id="copy-button" value="Copy link" style="padding: 6px;">

					<script>
					document.querySelector("#copy-button").onclick = function() {
					  // Select the content
					  document.querySelector("#copy-input").select();
					  // Copy to the clipboard
					  document.execCommand("copy");
					};
					</script>
					
					';
					exit;
				}
			} 
			
		}
	
		if(isset($_GET['previewid'])) {
			echo "<html>".get_transient('share_post_pages_preview_'.esc_html($_GET['previewid']))."</html>";exit;
		}
		
	}


	function preview_footer () {
		echo "	
		<form style='display:none' id='share_post_pages_previewform' action='".site_url()."/?action=share_post_pages_preview' method='POST'>
			".wp_nonce_field( 'share_post_pages_previewform')."
			<input type='hidden' name='preview_html' id='preview_html' />
		</form>	
		<script class='share_post_pages_previewscript'>
			var div = document.createElement('div');
			div.innerHTML = document.documentElement.innerHTML;
			var scripts = div.getElementsByClassName('share_post_pages_previewscript');
			var i = scripts.length;
			while (i--) {scripts[i].parentNode.removeChild(scripts[i]);}
			var wpadminbars = div.getElementsByClassName('nojq');
			var i = wpadminbars.length;
			while (i--) {wpadminbars[i].parentNode.removeChild(wpadminbars[i]);}
			var previewfloat = div.getElementsByClassName('previewfloat');
			var i = previewfloat.length;
			while (i--) {previewfloat[i].parentNode.removeChild(previewfloat[i]);}
			jQuery('#preview_html').val(div.innerHTML);
			</script>	
			
			<a href='#' class='share_post_pages_previewfloat' onclick='document.getElementById(\"share_post_pages_previewform\").submit()'><img src='".plugin_dir_url( dirname(__FILE__) )."images/share.png'></a>
		";
	}

	
}
