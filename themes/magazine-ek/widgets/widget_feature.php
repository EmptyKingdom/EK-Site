<?php
function widget_sideFeature() {
	$options = get_option("widget_sideFeature");
 	$numberOf = $options['number'];
	$category = $options['category'];
	$category = "&cat=" . $category;
	$showposts = "showposts=" . $numberOf . $category ;
	?>
    <?php
    $featuredPosts = new WP_Query();
    $featuredPosts->query($showposts);
	?>
	<?php $i = 1; ?>
    <?php while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); ?>
    <h1 class="side"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        <div class="meta">
            <?php _e("By", "magazine-basic"); echo " "; the_author_posts_link(); ?>
        </div>
        <div class="storycontent <?php if($numberOf == $i) { echo "noline"; } $i++; ?>">
            <?php theme_excerpt('25'); ?>
        </div>
	    <?php
		endwhile; 
}

function widget_myFeature($args) {
	extract($args); 
	
	$options = get_option("widget_sideFeature");
	
	echo $before_widget;
    echo $before_title;
    echo $options['title'];
    echo $after_title;
	widget_sideFeature();
	echo $after_widget; 
}

function myFeature_control()
{
  $options = get_option("widget_sideFeature");

  if (!is_array( $options ))
	{
		$options = array(
		'title' => 'Feature',
		'number' => '1',
		'category' => '0'
	    );
  }      

  if ($_POST['sideFeature-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['sideFeature-WidgetTitle']);
    $options['number'] = htmlspecialchars($_POST['sideFeature-PostNumber']);
	if ( $options['number'] > 5) {  $options['number'] = 5; } 
    $options['category'] = htmlspecialchars($_POST['sideFeature-Category']);

    update_option("widget_sideFeature", $options);
  }

?>
  <p>
    <label for="sideFeature-WidgetTitle"><?php _e('Title: ', "magazine-basic"); ?></label><br />
    <input class="widefat" type="text" id="sideFeature-WidgetTitle" name="sideFeature-WidgetTitle" value="<?php echo $options['title'];?>" />
    <br /><br />
    <label for="sideFeature-PostNumber"><?php _e('Number of posts to show: ', "magazine-basic"); ?></label>
    <input type="text" id="sideFeature-PostNumber" name="sideFeature-PostNumber" style="width: 25px; text-align: center;" maxlength="1" value="<?php echo $options['number'];?>" /><br />
	<small><em><?php _e('(max 5)', "magazine-basic"); ?></em></small>
    <br /><br />
    <label for="sideFeature-Category"><?php _e('From which category: ', "magazine-basic"); ?></label>
    <?php
	$options = get_option("widget_sideFeature");
	$category = $options['category'];
    ?>
	<?php wp_dropdown_categories('name=sideFeature-Category&selected='.$category); ?>
    <input type="hidden" id="sideFeature-Submit" name="sideFeature-Submit" value="1" />
	<p><small><em><?php _e('(Note: The selected will be excluded from the main content on the index page)', "magazine-basic"); ?></em></small></p>
  </p>
<?php
}
register_sidebar_widget( 'Featured Post', 'widget_myFeature');
register_widget_control( 'Featured Post', 'myFeature_control');
?>