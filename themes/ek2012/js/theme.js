$(document).ready(function($){

	// add "touch-device" class to body when viewed on touch devices
	if ('ontouchstart' in document.documentElement) {
		$('body').addClass('touch-device');
	}

	var features;
	(function(s, features) {
	    features.transitions = 'transition' in s || 'webkitTransition' in s || 'MozTransition' in s || 'msTransition' in s || 'OTransition' in s;
	    if ( ! features.transitions) {
	    	$('body').addClass('no-transitions');
	    }
	})(document.createElement('div').style, features || (features = {}));


	// inject share icons on all images in single post content
	$('body.single-post .post-content img').each(function(){

		var shareData = {},
			$this = $(this),
			$shareServices = $('#img-sharer ul').clone(); // this is a placeholder for the icons in the page src

		if ($this.closest('a').length) {
			shareData.shareURL = encodeURIComponent($this.closest('a').attr('href'));
		}
		else {
			shareData.shareURL = encodeURIComponent($this.attr('src'));
		}

		$this.wrap('<div class="img-sharer"></div>');

		shareData.shareTitle = encodeURIComponent(document.title);
		shareData.shareDescription = $this.attr('title') || $this.attr('alt') || '';
		shareData.shareDescription = encodeURIComponent(shareData.shareDescription);
		shareData.shareImg = $this.data('lazy-src') ? encodeURIComponent($this.data('lazy-src')) : encodeURIComponent($this.attr('src'));

		$shareServices.find('a').each(function(){
			for (var key in shareData) {
		        $(this).attr('href', $(this).attr('href').replace('~'+key+'~', shareData[key]));
			}
			// console.log($(this));
		});

		$this.parent().prepend($shareServices);

	});

	// search box expand / collapse
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
	
	// set active class on current carousel indicator
	updateCarouselIndicator = function(e){
		var $this = $(this);
		var index = $this.find('.item.active').index();
		var $indicators = $this.find('.carousel-indicator li');
		
		// update the blue square indicator
		$indicators.removeClass('active');
		$indicators.eq(index).addClass('active');
	}

	// set up carousel behavior (interval, switch descriptions, stop videos, update indicator)
	$('.carousel').carousel({
		interval: 7000, 
		pause: 'hover'
	}).on({
		slide: function(e){
			var $this = $(this);
			
			if ($this.parent().hasClass('has-side-captions')) {
				// e.relatedTarget is the slide coming in, but it's broken when the first slide is the one coming in
				var nextSlide = e.relatedTarget || $(this).find('.item:first').get(0);

				// activate the description element in the carousel sidebar
				var $descriptionEl = $($(nextSlide).data('description'));
				$descriptionEl.siblings().removeClass('active');
				$descriptionEl.addClass('active');
			}

			// stop all videos
			$this.find('a.video iframe').each(function(i, e){
				var f = $(e),
    			url = f.attr('src').split('?')[0];
			    f[0].contentWindow.postMessage(JSON.stringify({method: 'pause'}), url);
			})
		}, 
		slid: updateCarouselIndicator
	});

	$('.category-carousel').on({
		slid: function(e){
			var nextSlide = e.relatedTarget || $(this).find('.item:first').get(0);
			$('.caption p', nextSlide).each(function(i, e){
		        $clamp(e, {clamp: 2, useNativeClamp: false});
			})
		}
	})
	
	// jump to slide when carousel indicator clicked
	$('.carousel-indicator').on({
		click: function(e) {
			var $indicator = $(e.target);
			var index = $indicator.data('slide_to');
			$indicator.parents('.carousel').carousel(index);
		}
	}, 'a');
	
	// carousel section switcher
	$('ul#carousel-section-nav > li').on({
		click: function(e){

			var $this = $(this);
			var $newCarousel = $($this.data('carousel'));
			
			// stop all videos 
			$('.carousel a.video iframe').each(function(i, e){
				var f = $(e),
    			url = f.attr('src').split('?')[0];
			    f[0].contentWindow.postMessage(JSON.stringify({method: 'pause'}), url);
			})

			// switch the selected carousel section nav
			$('#carousel-section-nav > li').removeClass('active');
			$this.parent('li').addClass('active');
			
			// switch the selected carousel section content
			$('.carousel-section-content').removeClass('active');
			$($this.data('section')).addClass('active');
			
			// switch the selected carousel
			$('#feature .carousel').removeClass('active');
			$newCarousel.addClass('active');
			$newCarousel.trigger('switchedto')
		}
	}, 'a');

	// pause carousel when descriptions hovered 
	$('#carousel-sections').hover(
		function(){
			$('#feature .carousel').carousel('pause');
		},
		function(){
			$('#feature .carousel').carousel('cycle');
		}
	)
	
	// attach event handlers to view control buttons
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
	
	// category filters box slide up / down functionality
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

	// social share bar hide/show functionality
	if ($('.post-share').length)
	{
		$('.post-share li a.service').mouseenter(function(){
			$(this).parent().addClass('active');
			$(".fb-like-inactive").removeClass("fb-like-inactive").addClass("fb-like");FB.XFBML.parse();
		});
		$('.post-share li').mouseleave(function(){
			$(this).removeClass('active');
		})
	}

	// youtube video loader
	if ($('a.video.youtube').length) {
		// $.getScript('//www.youtube.com/iframe_api', function(){
			$(document).on({
				click: function(e){
					e.preventDefault();
					var $this = $(this);
					var $container = $this.find('div:first');

					$('<iframe></iframe>').attr({
						width: $container.outerWidth(),
						height: Math.max(200, $container.outerWidth()),
						src: 'http://www.youtube.com/embed/' + $this.data('video_ref') + '?autoplay=1&origin='+siteurl
					}).appendTo($container);
					
					// create api object & embed iframe player
					// var player = new YT.Player($container.get(0), {
					// 	width: $container.outerWidth(),
					// 	height: $container.outerHeight(),
					// 	videoId: $this.data('video_ref')
					// });
				}
			}, 'a.video.youtube')
		// });
	}

	// vimeo video loader
	$(document).on({
		click: function(e){
			e.preventDefault();
			var $this = $(this);
			var $container = $this.find('div:first');
			var i = $('a.video').index($this.get(0));
			var videoData = {
			    'id': 'vimeo-' + i,
			    'url': $this.data('video_ref'),
			    'width' : Math.floor($container.outerWidth()),
			    'height' : Math.floor($container.outerHeight())
			};
			var spinner = new Spinner($.extend({}, spinnerOpts, {
					width: 3, 
					radius: 38,
					left: 'auto',
					lines: 42, 
					speed: 1.4
			})).spin($container.addClass('load').get(0));
			
			$.getJSON('https://vimeo.com/api/oembed.json?url='+encodeURIComponent('https://player.vimeo.com/video/'+videoData.url)+
				'&player_id='+encodeURIComponent(videoData.id)+
				'&width='+encodeURIComponent(videoData.width)+
				'&height='+encodeURIComponent(videoData.height)+
				'&title=0&byline=0&portrait=0&api=1&autoplay=1&portrait=0&callback=?', 
				function(data) {
		        	$container.html(data.html);
		        	$('.carousel').carousel('pause');
				}
			);
		}
	}, 'a.video.vimeo');

	// popwin functionality for share links
	$(document).on({
		click: function(event) {
			event.preventDefault();
			var width  = 575,
			    height = 400,
			    left   = ($(window).width()  - width)  / 2,
			    top    = ($(window).height() - height) / 2,
			    url    = this.href,
			    opts   = 'status=1' +
			             ',width='  + width  +
		    	         ',height=' + height +
		        	     ',top='    + top    +
		            	 ',left='   + left
			window.open(url, 'sharer', opts);
		}
	}, '.social a');

	// attach event handler for filter button
	$('#main').on({
		click: filterPosts
	}, '#filter-btn');

	// check for lastFilter cookie and apply; also apply sfw setting
	if (lastFilter.category__in && lastFilter.category__in.length) {
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
	else if (lastFilter.sfw && window.location.href.indexOf('/sfw/') == -1) {
		$('#sfw-filter a').trigger('click')	
	}


	// more dope slider on single post page functionality
	$('#related-artists').on({
		click: function(e) {
			var $moreDopeSlider = $('#related-artists .post-list');
			var $clicked = $(e.target);
			var curPage = $moreDopeSlider.data('cur_page');
			var maxPage = $moreDopeSlider.data('max_page');
			$moreDopeSlider.find('.active').removeClass('active');
			if ($clicked.hasClass('prev')) {
				curPage--;
				$moreDopeSlider.data('cur_page', curPage)
				$moreDopeSlider.css({
					'left': parseInt($moreDopeSlider[0].style.left)+100+'%'
				});
				if (curPage == 1) {
					$clicked.css('visibility', 'hidden');
				}
				$moreDopeSlider.find('.slide-container').eq(curPage-1).addClass('active');
			} 
			else if ($clicked.hasClass('next')) {
				if (curPage == maxPage) {
					var spinner = new Spinner(spinnerOpts).spin($clicked.parent().get(0));
					$.post(ajaxurl, {
						action: 'ek_load_posts',
						nonce: $moreDopeSlider.data('nonce'),
						query: {
							posts_per_page: 3,
							paged: $moreDopeSlider.data('max_page')+1,
							category__in: [$moreDopeSlider.data('cats')]
						}
					}, function(result){
						spinner.stop();
						$(result).find('.span4')
							.wrapAll('<div class="row"></div>')
							.parent()
							.wrap('<div class="span8"></div>')
							.parent()
							.wrap('<div class="slide-container active row"></div>')
							.parent()
							.appendTo($moreDopeSlider);
						$moreDopeSlider.data('max_page', $moreDopeSlider.data('max_page')+1);
						$moreDopeSlider.data('cur_page', $moreDopeSlider.data('cur_page')+1);
						$moreDopeSlider.data('nonce', $(result).filter('#nonce').text());
						$moreDopeSlider.css({
							'width': $moreDopeSlider.data('max_page')*100+'%',
							'left': parseInt($moreDopeSlider[0].style.left)-100+'%'
						});
						$clicked.prev('.prev').css('visibility', 'visible');
					})
				} 
				else {
					$moreDopeSlider.data('cur_page', curPage+1)
					$moreDopeSlider.css({
						'left': parseInt($moreDopeSlider[0].style.left)-100+'%'
					});
					$moreDopeSlider.find('.slide-container').eq(curPage).addClass('active');
					$clicked.prev('.prev').css('visibility', 'visible');
				}
			}
		}
	}, 'a.prev, a.next')
	
	// dropdown functionality
	$('ul.sub-menu').each(function(i, e){
		var $dropdown = $(this);
		var $parent = $dropdown.closest('li');
		$parent.hover(function(){
			$parent.addClass('active');
		}, function(){
			$parent.removeClass('active');
		})
	})
	
	// collapseable widgets functionality
	$('.widget').not('.newsletter-signup').find('h4').on({
		mouseup: function() {

			var $widget = $(this).closest('.widget');
			var collapsedWidgets = $.cookie('collapsedWidgets') ? $.parseJSON($.cookie('collapsedWidgets')) : [];

			$widget.toggleClass('collapsed');

			if ($widget.hasClass('collapsed')) {
				if ($.inArray($widget.attr('id'), collapsedWidgets) == -1) {
					collapsedWidgets.push($widget.attr('id'))
				}
			}
			else {
				if ($.inArray($widget.attr('id'), collapsedWidgets) > -1) {
					collapsedWidgets.splice( $.inArray($widget.attr('id'), collapsedWidgets), 1 );
				}
			}

			$.cookie('collapsedWidgets', JSON.stringify(collapsedWidgets), {
				path: '/'
			});
		}
	})

	// apply collapsed class to widgets set in collapsedWidgets cookie
	$('.widget').each(function(i, e){
		if ($.cookie('collapsedWidgets')) {
			var $this = $(this);
			var collapsedWidgets = $.parseJSON($.cookie('collapsedWidgets'));
			if ($.inArray($this.attr('id'), collapsedWidgets) > -1) {
				$this.addClass('collapsed');
			}
		}
	})
	
	// only show list view on narrow screens
	mediaCheck({
		media: '(max-width: 767px)',
		entry: function() {
			if ( ! $('#list-view').hasClass('active')) {
				setTimeout(function(){
					$('#list-view > a').trigger('click')
				}, 100);
			}
		}
	});

	// limit text elements in grid view
	clampGrid();

	if ($('.slide-description').length) {

		$('.slide-description p.excerpt').each(function(i, e){
			var $this = $(this);
			$this.data('orig_text', $this.text());
		})

		setTimeout(function(){
			mediaCheck({
				media: '(max-width: 767px)',
				entry: function(){
					resetClamped($('.slide-description p.excerpt'));
				}
			})

			mediaCheck({
				media: '(min-width: 980px) and (max-width: 1200px)',
				entry: function() {
					clampCurrentSlide($('.carousel.active').get(0), 6)
					$('.carousel').on({
						slid: function(e){
							clampCurrentSlide(this, 6);
						},
						switchedto: function(e){
							clampCurrentSlide(this, 6);
						}
					})
				},
				exit: function() {
					resetClamped($('.slide-description p.excerpt'));
					$('.carousel').unbind('slid').unbind('switchedto').bind('slid', updateCarouselIndicator);
				}
			});
			mediaCheck({
				media: '(min-width: 768px) and (max-width: 979px)',
				entry: function() {
					clampCurrentSlide($('.carousel.active').get(0), 2)
					$('.carousel').on({
						slid: function(e){
							clampCurrentSlide(this, 2);
						},
						switchedto: function(e){
							clampCurrentSlide(this, 2);
						}
					})
				},
				exit: function() {
					resetClamped($('.slide-description p.excerpt'));
					$('.carousel').unbind('slid').unbind('switchedto').bind('slid', updateCarouselIndicator);
				}
			});
		}, 100);
	}
})

function clampCurrentSlide(carousel, clampLines) {
	var curSlide = $(carousel).find('.item.active').get(0);
	var $descriptionEl = $($(curSlide).data('description'))
	$clamp($descriptionEl.find('p.excerpt').get(0), {clamp: clampLines, useNativeClamp: false});
}

function resetClamped(els) {
	els.each(function(i, e) {
		var $e = $(e);
		var origText = $e.data('orig_text');
		if (origText) {
			$e.html(origText);
		}
	});
	return els;
}

function clampGrid() {
	// excerpts
	$('#post-list.grid .excerpt p').each(function(i, e){
		$clamp(e, {clamp: 3, useNativeClamp: false});
	})

	// titles
	$('#post-list.grid h3 a').each(function(i, e){
		$clamp(e, {clamp: 1, useNativeClamp: false});
	})
}

function afterGrid(target) {
	clampGrid();
	$('iframe', target).each(function(){
		var $this = $(this);
		$this.height($this.closest('.thumbnail').outerHeight());		
	});
}

function afterList(target) {
	$('iframe', target).each(function(){
		var $this = $(this);
		$this.height($this.closest('.thumbnail').outerHeight());		
	});
}

var viewControls = {
	gridView: function(target) {
		$(window).trigger('scroll');
		$('iframe', target).css('height', '');
		if ( ! $('body').hasClass('no-transitions')) {
			$('.span4', target).one('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(){
				afterGrid(target);
			});
		}
		else {
			setTimeout(function(){
				afterGrid(target)
			}, 600)
		}
		$('#grid-view').addClass('active');
		$('#list-view').removeClass('active');
		this.switchView('list', 'grid', target);
	},

	listView: function(target) {
		$('iframe', target).css('height', '');
		if ( ! $('body').hasClass('no-transitions')) {
			$('.span4', target).one('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(){
				afterList(target)
			});
		}
		else {
			setTimeout(function(){
				afterList(target)
			}, 600)
		}
		$('#list-view').addClass('active');
		$('#grid-view').removeClass('active');
		this.switchView('grid', 'list', target);
		resetClamped($('#post-list.list .excerpt')).wrapInner('<p></p>');
		resetClamped($('#post-list.list h3 a'));
	},

	switchView: function(from, to, target) {
		$(target).removeClass(from).addClass(to);
		// $('a.video').find('iframe').remove();
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

// function to query a set of posts from wp via ajax
function filterPosts() {
	var $ = jQuery;
	var $this = $(this);
	var cats = [];
	var nsfw_tagid = $('#sfw-filter').data('nsfw_tagid');
	
	$('#cat-filters').find('li.selected').each(function(i, el){
		cats.push($(el).data('cat_id'))
	})
	
	var newQuery = {category__in: cats};

	newQuery = $.extend({}, origQuery, newQuery);
	
	if ($('#sfw-filter').hasClass('checked')) {
		newQuery.tag__not_in = nsfw_tagid;
		newQuery.sfw = true;
	}
	else {
		delete(newQuery.sfw);
	}
	
	var spinner = new Spinner(spinnerOpts).spin($this.parent().get(0));
	$('#post-list').load(ajaxurl, {
		action: 'ek_load_posts',
		nonce: $('#view-controls').data('nonce'),
		query: newQuery
	}, function(result){
		
		$.cookie('lastFilter', JSON.stringify(newQuery), {
			path: '/'
		});

		clampGrid();
		
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
			$('.container a[href], #footer a[href]').each(function(i, e){
				var $this = $(this);
				$this.attr('href', $this.attr('href').replace('/sfw/', '/'));
			});
		} 
		else {
			$('.container a[href], #footer a[href]').each(function(i, e){
				var $this = $(this);
				if ($this.attr('href').indexOf('/sfw/') == -1)
				{
					$this.attr('href', $this.attr('href').replace(siteurl, siteurl+'sfw/'));
				}
			});
		} 

		if ($this.attr('id') == 'filter-btn')
		{
			// close the filters box
			$('#cat-filters').slideUp();

			// scroll to top of view controls if it was the category filters that was clicked
			var scrollTo = $('#view-controls').offset().top-10;
			if ($('#wpadminbar').length) {
				scrollTo -= $('#wpadminbar').outerHeight();
			}
			$('#view-controls').data('nonce', $(result).filter('#nonce').text());
			$('html, body').animate({
				scrollTop: scrollTo
			}, 200);
		}
	})
}

