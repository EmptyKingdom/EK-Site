<!-- begin second sidebar -->
		<div id="secondsidebar">
				<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Two") ) : ?>
					<div class="side-widget">
                           <?php _e('<h2>Links</h2>', "magazine-basic"); ?>
                            <ul>
							<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
                            </ul>
					</div>
                    <div class="side-widget">
                           <?php _e('<h2>Calendar</h2>', "magazine-basic"); ?>
                            <ul>
                                <?php get_calendar(); ?>
                            </ul>
                    </div>
                    <div class="side-widget">
                           <?php _e('<h2>Archives</h2>', "magazine-basic"); ?>
                            <ul>
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                    </div>
                    <div class="side-widget">
                           <?php _e('<h2>Tags</h2>', "magazine-basic"); ?>
                            <ul>
                                <?php wp_tag_cloud(); ?>
                            </ul>
                    </div>
      			<?php endif; ?>
  		</div>
<!-- end second sidebar -->