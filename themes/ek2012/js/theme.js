yepnope(themedir + '/js/jquery.cookie.js');
$(document).ready(function(){

	updateCarouselIndicator = function(e){
		var $this = $(this);
		var index = $this.find('.item.active').index();
		var $indicators = $this.find('.carousel-indicator li');
		
		// update the blue square indicator
		$indicators.removeClass('active');
		$indicators.eq(index).addClass('active');
	}

	$('#basic-search').on({
		focus: function(){
			$(this).addClass('expanded');
			var val = this.value;
			var $this = $(this);
			$this.val("");
			setTimeout(function () {
			    $this.val(val);
			}, 1);
		},
		blur: function(){
			$(this).removeClass('expanded')
		}
	}, 'input')
	
	$('#feature .carousel').carousel({
		interval: 100000
	}).on({
		slide: function(e){
			// e.relatedTarget is the slide coming in, but it's broken when the first slide is the one coming in
			var nextSlide = e.relatedTarget || $(this).find('.item:first').get(0);
			
			// activate the description element in the carousel sidebar
			var $descriptionEl = $($(nextSlide).data('description'));
			$descriptionEl.siblings().removeClass('active');
			$descriptionEl.addClass('active');
		}, 
		slid: updateCarouselIndicator
	});
	
/* 	$('#category-carousel .carousel').carousel({interval: 5000}); */
	
	$('.carousel-indicator').on({
		click: function(e) {
			var $indicator = $(e.target);
			var index = $indicator.data('slide_to');
			$indicator.parents('.carousel').carousel(index);
		}
	}, 'a');
	
	$('#category-carousel').carousel({interval: 20000}).on({
		slid: updateCarouselIndicator
	});
	
	$('ul#carousel-section-nav > li').on({
		click: function(e){

			var $this = $(this);
			
			// switch the selected carousel section nav
			$('#carousel-section-nav > li').removeClass('active');
			$this.parent('li').addClass('active');
			
			// switch the selected carousel section content
			$('.carousel-section-content').removeClass('active');
			$($this.data('section')).addClass('active');
			$('.carousel-section-content').not('.active').hide();
			$('.carousel-section-content.active').show();
			
			// switch the selected carousel
			$('#feature .carousel').removeClass('active');
			$($this.data('carousel')).addClass('active');
		}
	}, 'a');
	
	$('#view-controls').on({
		click: function(e) {
			e.preventDefault();
			var $clicked = $(e.target);
			var action = $clicked.data('action');
			var target = $clicked.data('target') || '#post-list';
			if (typeof viewControls[action] == 'function') {
				viewControls[action](target, e);
			}
		}
	}, 'a');
	
	$('#cat-filters').on({
		click: function(e) {
			e.preventDefault();
			if ($(e.target).attr('id') == 'close-cat-filters') {
				$('#cat-filters').slideUp();
			} 
			else {
				$(this).parent('li').toggleClass('selected');
			}
		}
	}, 'a')

	var $slider = $('#related-artists .post-list');
	var relatedArtistPostWidth = $slider.find('.post:first').outerWidth();
	$('#related-artists .post').width(relatedArtistPostWidth);
	var slideDistance = $slider.find('.post:first').outerWidth(true)*3;
	
	// social share bar
	if ($('.post-share').length)
	{
		$('.post-share li').each(function(i, e){
			$(this).hover(function(){
				$(this).addClass('active');
			},
			function(){
				$(this).removeClass('active');
			});
		})
	}
	
	// cat filters
	yepnope({
		test: $('#cat-filters, #filter-sfw').length,
		yep: themedir + '/js/spin.min.js',
		callback: function(url, result, key){
			$('#main').on({
				click: filterPosts
			}, '#filter-btn');
			if (lastFilter.category__in) {
				$.each(lastFilter.category__in, function(i, e){
					$('#cat-filters').find('li[data-cat_id="'+e+'"]').addClass('selected');
				})
				if (lastFilter.tag__not_in == $('#sfw-filter').data('nsfw_tagid')) {
					$('#sfw-filter').addClass('checked');
				}
				setTimeout(function(){
					$('#filter-btn').trigger('click')	
				}, 100);
			}
		}
	});

	// related artists
	yepnope({
		test: $('#related-artists').length,
		yep: themedir + '/js/spin.min.js',
		callback: function(){
			$('#related-artists').on({
				click: function(e) {
					var $clicked = $(e.target);
					var curPage = $slider.data('cur_page');
					var maxPage = $slider.data('max_page');
					if ($clicked.hasClass('prev')) {
					$slider.css('left', '+='+slideDistance);
					$slider.data('cur_page', curPage-1)
					if (curPage-1 == 1) {
						$clicked.css('visibility', 'hidden');
					}
				} 
				else if ($clicked.hasClass('next')) {
						if (curPage == maxPage) {
							var spinner = new Spinner(spinnerOpts).spin($clicked.parent().get(0));
							$.post(ajaxurl, {
								action: 'ek_load_posts',
								nonce: $slider.data('nonce'),
								query: {
									posts_per_page: 3,
									paged: $slider.data('max_page')+1,
									category__in: [$slider.data('cats')]
								}
							}, function(result){
							spinner.stop();
							$slider.css({
								'width': '+='+slideDistance,
								'left': '-='+slideDistance
							});
							$slider.append($(result).find('.span4').width(relatedArtistPostWidth));
							$slider.data('max_page', $slider.data('max_page')+1);
							$slider.data('cur_page', $slider.data('cur_page')+1);
							$slider.data('nonce', $(result).filter('#nonce').text());
							$clicked.prev('.prev').css('visibility', 'visible');
						})
						} 
						else {
							$slider.css('left', '-='+slideDistance);
							$slider.data('cur_page', $slider.data('cur_page')+1)
							$clicked.prev('.prev').css('visibility', 'visible');
						}
					}
				}
			}, 'a.prev, a.next')
		}
	})
	
	filterPosts = function(){
		var $this = $(this);
		var cats = [];
		var nsfw_tagid = $('#sfw-filter').data('nsfw_tagid');
		
		$('#cat-filters').find('li.selected').each(function(i, el){
			cats.push($(el).data('cat_id'))
		})

		var newQuery = {category__in: cats};

		if ($('#sfw-filter').hasClass('checked')) {
			newQuery.tag__not_in = nsfw_tagid;
			newQuery.sfw = true;
		}
		else {
			delete(origQuery.sfw);
		}
		
		newQuery = $.extend({}, origQuery, newQuery);
		
		var spinner = new Spinner(spinnerOpts).spin($this.parent().get(0));
		$('#post-list').load(ajaxurl, {
			action: 'ek_load_posts',
			nonce: $('#cat-filters').data('nonce'),
			query: newQuery
		}, function(result){
			
			$.cookie('lastFilter', JSON.stringify(newQuery), {
				path: '/'
			});
		
			// after content loads:
			spinner.stop();
			
			// set the flag text on or off:
			if (newQuery.category__in.length) {
				$('#cat-filter').addClass('active').find('a').text('Filter By Category [on]');
			} 
			else {
				$('#cat-filter').removeClass('active').find('a').text('Filter By Category');
			}
			
			if ( ! newQuery.sfw) {
				$('#posts-pagination a').each(function(i, e){
					$(this).attr('href', $(this).attr('href').replace('/sfw/', '/'));
				});
			} 

			if ($this.attr('id') == 'filter-btn')
			{
				// close the filters box
				$('#close-cat-filters').trigger('click');

				// scroll to top of view controls if it was the category filters that was clicked
				var scrollTo = $('#view-controls').offset().top-10;
				if ($('#wpadminbar').length) {
					scrollTo -= $('#wpadminbar').outerHeight();
				}
				$('#cat-filters').data('nonce', $(result).filter('#nonce').text());
				$('html, body').animate({
					scrollTop: scrollTo
				}, 200);
			}
		})
	}


	$('ul.sub-menu').each(function(i, e){
		var $dropdown = $(this);
		var $parent = $dropdown.closest('li');
		$parent.hover(function(){
			$parent.addClass('active');
		}, function(){
			$parent.removeClass('active');
		})
	})

})

var viewControls = {
	gridView: function(target) {
		this.switchView('list', 'grid', target);
	},

	listView: function(target) {
		this.switchView('grid', 'list', target);
	},

	switchView: function(from, to, target) {
		$(target).removeClass(from).addClass(to);
	},
	
	showCatFilters: function(target) {
		$('#cat-filters').slideToggle();
	},
	
	filterSfw: function(target, e) {
		$('#sfw-filter').toggleClass('checked')
		filterPosts.call(e.target); // e.target is the sfw button
	}
}

spinnerOpts = {
	lines: 15, // The number of lines to draw
	length: 0, // The length of each line
	width: 3, // The line thickness
	radius: 10, // The radius of the inner circle
	corners: 1, // Corner roundness (0..1)
	rotate: 90, // The rotation offset
	color: '#00B8EC',
	speed: 1.4, // Rounds per second
	trail: 40, // Afterglow percentage
	shadow: false, // Whether to render a shadow
	hwaccel: false, // Whether to use hardware acceleration
	className: 'spinner', // The CSS class to assign to the spinner
	zIndex: 2e9, // The z-index (defaults to 2000000000)
	top: 'auto', // Top position relative to parent in px
	left: -10 // Left position relative to parent in px
}

