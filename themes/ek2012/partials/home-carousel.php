<div id="feature" class="row">
<?php 
if (function_exists('ot_get_option')) :
	$carousels = array_slice(ot_get_option('home_carousels', array()), 0, 3);
	foreach ($carousels as &$carousel) :
		$carousel = (object) $carousel;
	endforeach;
	ek_display_carousels($carousels, 'featured', true, true);?>
<?php
endif; // function_exists('ot_get_option') ?>
</div> <!-- /#feature.row -->
