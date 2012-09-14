<!-- begin sidebar -->
		<div id="sidebar">
				<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar One") ) : ?>
	                <div class="side-widget">
						<?php include 'searchform.php'; ?>
    				</div>                
                    <div class="side-widget">
                           <?php _e('<h2>Links</h2>', "magazine-basic"); ?>
                            <ul>
							<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
                            </ul>
					</div>
                    <div class="side-widget">
                           <?php _e('<h2>Calendar</h2>', "magazine-basic"); ?>
                                <?php get_calendar(); ?>
                    </div>
                    <div class="side-widget">
                           <?php _e('<h2>Archives</h2>', "magazine-basic"); ?>
                            <ul>
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                    </div>
                    <div class="side-widget">
                           <?php _e('<h2>Tags</h2>', "magazine-basic"); ?>
                                <?php wp_tag_cloud(); ?>
                    </div>
      			<?php endif; ?>
		</div>
<!-- end sidebar -->