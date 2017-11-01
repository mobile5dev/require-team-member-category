<?php
/*
Plugin Name: Require Team Member Category
Plugin URI: http://example.com
Description: Adds a pop up box requiring a category to be selected for Team Members.
Version: 1.0
Author: David Yip <david.yip@mobile-5.com>
Author URI: http://example.com
License: A "Slug" license name e.g. GPL2
*/
add_action('admin_footer', 'rtmc_wp_loaded');
function rtmc_wp_loaded(){
	$screen = get_current_screen();
	if($screen->post_type == "team"){
		?>
		<script type="text/javascript">
      jQuery(function($){
        $('#publish, #save-post').click(function(e){
          if(!$('#taxonomy-team_category input:checked').length){
            alert("Please select a level for this team member.");
            e.stopImmediatePropagation();
            return false;
          }

          return true;
        });
      });
		</script>
		<?php
	}
	return true;
}
