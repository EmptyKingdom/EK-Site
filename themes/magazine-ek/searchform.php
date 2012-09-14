<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div>
<input type="text" style="width: 174px; background:#33ccff; border: solid 2px #33ccff; font-weight:bold; padding:4px 0px 8px 5px; -moz-box-shadow:inset 0 0 5px #2b7891;
-webkit-box-shadow:inset 0 0 5px #2b7891;
box-shadow:inset 0 0 5px #2b7891;" class="search_input" value="<?php _e('Search &amp; Hit Enter', "magazine-basic"); ?>" name="s" id="s" onfocus="if (this.value == '<?php _e('Search &amp; Hit Enter', "magazine-basic"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search &amp; Hit Enter', "magazine-basic"); ?>';}" />
<input type="hidden" id="searchsubmit" />
</div>
</form>
