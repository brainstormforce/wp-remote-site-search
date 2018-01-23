<?php

/**
*	The view for the item search from the given api
*
*	@since 0.1
*/
if ( !function_exists( 'rs_result_templates' ) ):

	add_action('wp_footer', 'rs_result_templates');
	function rs_result_templates(){
		?>
			<!-- Remote Site Search results-->
			<script type="text/html" id="rs-tmpl">
				<?php // @codingStandardsIgnoreStart ?>
				<li id="rs-item-<%= post.id %>" class="rs-item">
					<a href="<%= post.link %>" target="_blank"class="rs-link"> 
						<div class="rs-item-title-wrap">
							<span class="rs-item-title"><%= post.title.rendered %></span>
							<?php // @codingStandardsIgnoreEnd ?>
						</div>
					</a>
				</li>
			</script>
		<?php
	}

endif;