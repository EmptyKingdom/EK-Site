<?php
/**
 * General Widget structure for different users list.
 *
 * @version		$Rev: 206156 $
 * @author		Jordi Canals
 * @copyright   Copyright (C) 2008, 2009, 2010 Jordi Canals
 * @license		GNU General Public License version 2
 * @link		http://alkivia.org
 * @package		Alkivia
 * @subpackage	Sideposts
 *

	Copyright 2008, 2009, 2010 Jordi Canals <devel@jcanals.cat>

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	version 2 as published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Widget class for users lists.
 * Always shows the same output format and control.
 * Must define the methods startUp() and widget()
 *
 * @author		Jordi Canals
 * @package		Alkivia
 * @subpackage	SidePosts
 * @since		0.8
 */
final class SidepostsWidget extends WP_Widget
{

    /**
     * Plugin ID and translation textDomain.
     * @var string
     */
    private $pid;

    /**
     * Plugin reference.
     * @var SidePosts
     */
    private $sideposts;

    /**
     * Value for private posts category
     */
    const private_posts = -99;

    /**
     * Class constructor.
     * @see WP_Widget::__construct()
     */
    public function __construct()
    {
        $this->sideposts = ak_get_object('sideposts');
        $this->pid = $this->sideposts->ID;     // Translation textdomain.

		$options = array('classname' => 'widget_sideposts', 'description' => __('A widget to move posts to the sidebar.', $this->pid) );
        parent::__construct($this->pid, 'SidePosts', $options );
    }

	/**
	 * Widget Output
	 * @see WP_Widget::widget()
	 */
    public function widget( $args, $instance )
    {
        $this->sideposts->savePost();
        extract( $args, EXTR_SKIP );

		$category = (int) $instance['category'];
		if ( 0 == $category ) {
			_e('Category not selected.', $this->pid);
			return;
		} elseif ( is_category($category) ) {
            return;    // Don't show the widget when browsing the category archives.
        }

		if ( -99 == (int) $category && ! current_user_can('read_private_posts') ) {
			return;								// Widget is for private posts and user cannot see them
		}

		$numposts = (int) $instance['numposts'];
		if ( 1 > $numposts ) {		// Defaults to 3 posts on sidebar
			$instance['numposts'] = 3;
		} elseif ( SIDEPOSTS_MAX < $numposts ) {	// No more than SIDEPOSTS_MAX posts.
			$instance['numposts'] = SIDEPOSTS_MAX;
		}

		$qargs = array( 'showposts' => (int) $instance['numposts'] );
		if ( -99 == (int) $category ) {
            $qargs['post_status'] = 'private';
            $qargs['caller_get_posts'] = 1;
		} else {
            $qargs['cat'] = $category;
		}
		if ( is_single() ) {
            $qargs['post__not_in'] = array($this->sideposts->savedID());
		}

		$query = new WP_Query($qargs);
        if ( $query->have_posts() ) {
	        echo $before_widget;
	        if ( ! empty($instance['title']) ) {
        	    echo $before_title . $instance['title'] . $after_title;
            }
	        echo '<ul>' . PHP_EOL;

	        require_once ( AK_CLASSES . '/template.php' );

		    $tpl = new akTemplate($this->templatesPath());
		    $tpl->textDomain($this->pid);

		    $tpl->assign('widget', $instance);
		    $tpl->assign('args', $args);
		    $tpl->assignByRef('query', $query);

		    $tpl->display($instance['show']);

            echo '</ul>' . PHP_EOL;
        	echo $after_widget;
        }

    	$this->sideposts->restorePost(); // Revert to the previous post status.
    }

    /**
     * Widget Control form.
     * @see WP_Widget::form()
     */
    public function form( $instance )
    {
        $defaults = array (
			    'title'      => '',
				'category'   => 0,
				'numposts'   => 3,
				'show'       => 'posts',
				'thumbnail'  => 100,
                'rightalign' => 0,
                'feeds'		 => 0
        );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = attribute_escape($instance['title']);
	?>
		<p><?php _e('Title:', $this->pid); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>
		<p><?php _e('Category:', $this->pid); ?>
			<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category') ?>" class="widefat">
				<option value="-99"<?php  selected(-99, (int) $instance['category']); ?>><?php _e('-- PRIVATE POSTS --', $this->pid) ?></option>
				<?php
				$categories	= get_terms('category');
				foreach ( $categories as $cat ) {
					echo '<option value="' . $cat->term_id .'"';
					selected((int) $cat->term_id, (int) $instance['category']);
					echo '>' . $cat->name . '</option>';
				}
				?>
			</select>
		</p>
		<p>
			<?php _e('Number of posts:', $this->pid); ?> <input style="width: 30px;" id="<?php echo $this->get_field_id('numposts'); ?>" name="<?php echo $this->get_field_name('numposts'); ?>" type="text" value="<?php echo $instance['numposts']; ?>" />
			<br />
			<small><?php printf(__('(At most %d)', $this->pid), SIDEPOSTS_MAX); ?></small>
		</p>
		<p>
			<?php _e('Show:', $this->pid); ?><select name="<?php echo $this->get_field_name('show'); ?>" id="<?php echo $this->get_field_id('show'); ?>" class="widefat">
			<?php
			    $templates = ak_get_templates($this->templatesPath());
                foreach ( $templates as $tpl ) :
                    $tpl = strtolower($tpl);
                    switch ( $tpl ) {    // For compatibility with older versions settings
                        case 'posts' :
                            $tpl_title = __('Full Post', $this->pid);
                            break;
                        case 'excerpt' :
                            $tpl_title = __('Post Excerpt', $this->pid);
                            break;
                        case 'ex-thumb' :
                            $tpl_title = __('Excerpts with thumbnails', $this->pid);
                            break;
                        case 'photoblog' :
                            $tpl_title = __('Photo Blog', $this->pid);
                            break;
                        case 'title' :
                            $tpl_title = __('Only Post Title', $this->pid);
                            break;
                        default :
                            $tpl_title = ucfirst($tpl);
                    }
            ?>
				<option value="<?php echo $tpl; ?>" <?php selected($tpl, $instance['show']); ?>><?php echo $tpl_title; // _e('Full Post', $this->pid); ?></option>
            <?php endforeach; ?>
			</select>
		</p><p>
			<input type="checkbox" id="<?php echo $this->get_field_id('feeds'); ?>" name="<?php echo $this->get_field_name('feeds'); ?>" value="1"<?php checked(1, $instance['feeds']); ?>" />
			<?php _e('Show category on all feeds', $this->pid); ?>
		</p><p>
			<?php _e('Image width:', $this->pid); ?>
			<input style="width: 50px;" id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="text" value="<?php echo $instance['thumbnail']; ?>" />
			<?php _e('pixels', $this->pid)?>
		</p><p>
			<input type="checkbox" id="<?php echo $this->get_field_id('rightalign'); ?>" name="<?php echo $this->get_field_name('rightalign'); ?>" value="1"<?php checked(1, $instance['rightalign']); ?>" />
			<?php _e('Align thumbnail to right', $this->pid); ?>
		</p>
	<?php
    }

    /**
     * Widget data validation.
     * @see WP_Widget::update()
     */
    public function update ( $newInstance, $oldInstance )
    {
        $instance = $oldInstance;

		$instance['title'] = strip_tags(stripslashes($newInstance['title']));
		$instance['category'] = (int) $newInstance['category'];
		$instance['numposts'] = intval($newInstance['numposts']);
		$instance['show'] = strip_tags(stripslashes($newInstance['show']));
		$instance['thumbnail'] = intval($newInstance['thumbnail']);
		$instance['rightalign'] = intval($newInstance['rightalign']);
		$instance['feeds'] = intval($newInstance['feeds']);

		return $instance;
    }

    /**
     * Returns an array with all templates directories.
     *
     * @return array Locations for template files.
     */
    private function templatesPath()
    {
        $folders = array(SPOSTS_PATH . '/templates');
        if ( $path = $this->sideposts->getOption('templates-path') ) {
            $folders[] = $path;
        }

        return $folders;
    }
}
