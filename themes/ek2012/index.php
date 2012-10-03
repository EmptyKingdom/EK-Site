<?php get_header(); ?>
<?php get_template_part('/partials/home', 'carousel') ?>
<div class="row">
	<div class="span8" id="main">
		<ul class="unstyled" id="view-controls">
			<li id="grid-view"><a href="javascript:void(0)">Grid View</a></li>
			<li id="list-view"><a href="javascript:void(0)">List View</a></li>
			<li id="cat-filter"><a href="javascript:void(0)">Filter By Category</a></li>
		</ul>
		<div id="cat-filters">
			<h3>Select specific categories you want to view.</h3>
			<div class="row">
				<div class="span2 illustration">
					<h4>Illustration &amp; Art</h4>
					<ul class="cat-filter illustration">
						<li>Collage</li>
						<li>Digital</li>
						<li>Drawings</li>
						<li>Fine Art</li>
						<li>Graphic</li>
						<li>Illustration</li>
						<li>Installation</li>
						<li>Mixed Media</li>
						<li>Obscure</li>
						<li>Painting</li>
						<li>Sculpture</li>
						<li>Street</li>
					</ul> <!-- /.cat-filter.illustration -->
				</div> <!-- .span2 -->
				<div class="span2 photography">
					<h4>Photography</h4>
					<ul class="cat-filter photography">
						<li>Abstract</li>
						<li>Ambient</li>
						<li>Black &amp; White</li>
						<li>Commercial / Editorial</li>
						<li>Fashion</li>
						<li>Journalism</li>
						<li>Landscape</li>
						<li>Nude</li>
						<li>Portrait</li>
					</ul> <!-- /.cat-filter.photography -->
				</div> <!-- .span2 -->
				<div class="span2 film">
					<h4>Film</h4>
					<ul class="cat-filter film">
						<li>Animation</li>
						<li>Commercial</li>
						<li>Feature Film</li>
						<li>Music Video</li>
						<li>Short Film</li>
					</ul> <!-- /.cat-filter.film -->
				</div> <!-- .span2 -->
				<div class="span2 new-media">
					<h4>New Media</h4>
					<ul class="cat-filter new-media">
						<li>Advertising</li>
						<li>Animation</li>
						<li>Graphic Design</li>
						<li>Motion Graphics</li>
						<li>Typography</li>
						<li>Visual Effects</li>
					</ul> <!-- /.cat-filter.new-media -->
				</div> <!-- .span2 -->
			</div> <!-- /.row -->
		</div> <!-- /#cat-filters -->
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		
	</div> <!-- /#sidebar -->
</div>
<?php get_footer(); ?>