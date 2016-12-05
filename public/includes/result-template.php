<?php

/**
*	The view for the item search from the given api
*
*	@since 0.1
*/
if ( !function_exists( 'wpms_result_templates' ) ):

	add_action('wp_footer', 'wpms_result_templates');
	function wpms_result_templates(){
		?>
			<!-- Multisite Live Search -->
			<script type="text/html" id="wpms--tmpl">
				<li id="wpms--item-<%= post.id %>" class="wpms--item">
					<a href="<%= post.link %>" target="_blank"class="wpms--link">
						<div class="wpms--item-title-wrap">
							<span class="wpms--item-title"><%= post.title.rendered %></span>
						</div>
					</a>
				</li>
			</script>
		<?php
	}

endif;