<?php 
if (function_exists('ot_get_option')) :
	$btn_text = ot_get_option('offsite_products_button_text');
	$credits_text = ot_get_option('offsite_products_credits_text');
	$btn_link = ot_get_option('offsite_products_button_link');
else :
	$btn_text = 'Shop All Posters';
	$credits_text = 'The exclusive EK gallery provided by our partners at Thumbtack Press.';
	$btn_link = 'http://thumbtackpress.com/';
endif;
?>
	<div class="tempshop-credits span4">
		<a class="btn btn-large tempshop" href="<?php echo $btn_link ?>" target="_blank"><?php echo $btn_text ?></a>
		<p><em><?php echo $credits_text ?></em></p>
	</div>
