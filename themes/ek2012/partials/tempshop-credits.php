<?php 
if (function_exists('ot_get_option')) :
	$btn_text = ot_get_option('offsite_products_button_text');
	$credits_text = ot_get_option('offsite_products_credits_text');
else :
	$btn_text = 'Shop All Posters';
	$credits_text = 'The exclusive EK gallery provided by our partners at Thumbtack Press.';
endif;
?>
	<div class="tempshop-credits span4">
		<a class="btn btn-large tempshop"><?php echo $btn_text ?></a>
		<p><em><?php echo $credits_text ?></em></p>
	</div>
