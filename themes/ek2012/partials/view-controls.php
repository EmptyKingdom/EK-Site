		<ul class="unstyled" id="view-controls">
			<li id="grid-view"><a href="javascript:void(0)" data-action="gridView">Grid View</a></li>
			<li id="list-view"><a href="javascript:void(0)" data-action="listView">List View</a></li>
			<?php if ( ! is_home()) : ?>
		</ul>
			<?php else : ?>
			<li id="cat-filter"><a href="javascript:void(0)" data-action="showCatFilters">Filter By Category</a></li>
		</ul> <!-- /#view-controls -->
		<div id="cat-filters" class="well clearfix" data-nonce="<?php echo wp_create_nonce('ek_load_posts') ?>">
			<a id="close-cat-filters" href="javascript:void(0)"></a>
			<h3>Select specific categories you want to view.</h3>
			<div class="row">
				<div class="span2 illustration-art">
					<h5>Illustration &amp; Art</h5>
					<ul class="cat-filter illustration-art unstyled">
						<?php $cats = get_categories(array('child_of' => 4)); ?>
						<?php foreach ($cats as $cat) : ?>
						<li data-cat_id="<?php echo $cat->term_id ?>"><a href="javascript:void(0)"><span class="check"></span><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul> <!-- /.cat-filter.illustration -->
				</div> <!-- .span2 -->
				<div class="span2 photography">
					<h5>Photography</h5>
					<ul class="cat-filter photography unstyled">
						<?php $cats = get_categories(array('child_of' => 6)); ?>
						<?php foreach ($cats as $cat) : ?>
						<li data-cat_id="<?php echo $cat->term_id ?>"><a href="javascript:void(0)"><span class="check"></span><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul> <!-- /.cat-filter.photography -->
				</div> <!-- .span2 -->
				<div class="span2 film">
					<h5>Film</h5>
					<ul class="cat-filter film unstyled">
						<?php $cats = get_categories(array('child_of' => 3)); ?>
						<?php foreach ($cats as $cat) : ?>
						<li data-cat_id="<?php echo $cat->term_id ?>"><a href="javascript:void(0)"><span class="check"></span><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul> <!-- /.cat-filter.film -->
				</div> <!-- .span2 -->
				<div class="span2 new-media">
					<h5>New Media</h5>
					<ul class="cat-filter new-media unstyled">
						<?php $cats = get_categories(array('child_of' => 5)); ?>
						<?php foreach ($cats as $cat) : ?>
						<li data-cat_id="<?php echo $cat->term_id ?>"><a href="javascript:void(0)"><span class="check"></span><?php echo $cat->name ?></a></li>
						<?php endforeach; ?>
					</ul> <!-- /.cat-filter.new-media -->
				</div> <!-- .span2 -->
			</div> <!-- /.row -->
			<div class="pull-right">
				<a class="btn btn-inverse" id="filter-btn" href="javascript:void(0)">Filter</a>
			</div>
		</div> <!-- /#cat-filters -->
		<?php endif; ?>