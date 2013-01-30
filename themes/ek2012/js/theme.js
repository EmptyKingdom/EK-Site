yepnope(themedir + '/js/jquery.cookie.js');
$(document).ready(function($){

	if ('ontouchstart' in document.documentElement) {
		$('body').addClass('touch-device');
	}

	updateCarouselIndicator = function(e){
		var $this = $(this);
		var index = $this.find('.item.active').index();
		var $indicators = $this.find('.carousel-indicator li');
		
		// update the blue square indicator
		$indicators.removeClass('active');
		$indicators.eq(index).addClass('active');
	}

	$('#search-toggle').on({
		click: function(){
			$('#basic-search').toggleClass('expanded');
		},
	})

	$('#basic-search').on({
		focus: function(){
			var $this = $(this);
			$this.data('placeholder', $this.attr('placeholder')).removeAttr('placeholder')
		},
		blur: function(){
			var $this = $(this)
			$this.attr('placeholder', $this.data('placeholder'));
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
			$(this).find('a.video iframe').each(function(i, e){
				var f = $(e),
    			url = f.attr('src').split('?')[0];
			    f[0].contentWindow.postMessage(JSON.stringify({method: 'pause'}), url);
			})
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

	// social share bar
	if ($('.post-share').length)
	{
		$('.post-share li a.service').mouseenter(function(){
			$(this).parent().addClass('active');
		});
		$('.post-share li').mouseleave(function(){
			$(this).removeClass('active');
		})
	}

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
					player = $container.find('iframe')[0];
					$(player).attr('id', videoData.id).css({'width' : '100%', 'height' : '100%'});
				}
			);
		}
	}, 'a.video.vimeo');

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
	}, '.post .social a');

	// cat filters
	yepnope({
		test: $('#cat-filters, #sfw-filter').length,
		yep: themedir + '/js/spin.min.js',
		callback: function(url, result, key){
			$('#main').on({
				click: filterPosts
			}, '#filter-btn');
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
		}
	});

	// related artists
	yepnope({
		test: $('#related-artists').length,
		yep: themedir + '/js/spin.min.js',
		callback: function(){
			var $slider = $('#related-artists .post-list');
			$('#related-artists').on({
				click: function(e) {
					var $clicked = $(e.target);
					var curPage = $slider.data('cur_page');
					var maxPage = $slider.data('max_page');
					$slider.find('.active').removeClass('active');
					if ($clicked.hasClass('prev')) {
						curPage--;
						$slider.data('cur_page', curPage)
						$slider.css({
							'left': parseInt($slider[0].style.left)+100+'%'
						});
						if (curPage == 1) {
							$clicked.css('visibility', 'hidden');
						}
						$slider.find('.slide-container').eq(curPage-1).addClass('active');
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
								$(result).find('.span4')
									.wrapAll('<div class="row"></div>')
									.parent()
									.wrap('<div class="span8"></div>')
									.parent()
									.wrap('<div class="slide-container active row"></div>')
									.parent()
									.appendTo($slider);
								$slider.data('max_page', $slider.data('max_page')+1);
								$slider.data('cur_page', $slider.data('cur_page')+1);
								$slider.data('nonce', $(result).filter('#nonce').text());
								$slider.css({
									'width': $slider.data('max_page')*100+'%',
									'left': parseInt($slider[0].style.left)-100+'%'
								});
								$clicked.prev('.prev').css('visibility', 'visible');
							})
						} 
						else {
							$slider.data('cur_page', curPage+1)
							$slider.css({
								'left': parseInt($slider[0].style.left)-100+'%'
							});
							$slider.find('.slide-container').eq(curPage).addClass('active');
							$clicked.prev('.prev').css('visibility', 'visible');
						}
					}
				}
			}, 'a.prev, a.next')
		}
	})
	
	filterPosts = function(){
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


	$('ul.sub-menu').each(function(i, e){
		var $dropdown = $(this);
		var $parent = $dropdown.closest('li');
		$parent.hover(function(){
			$parent.addClass('active');
		}, function(){
			$parent.removeClass('active');
		})
	})
	
	$('.widget h4').on({
		mouseup: function() {
			$(this).closest('.widget').toggleClass('collapsed');
		}
	})
	
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

	if ($('.slide-description').length) {

		$('.slide-description p').not('.postmeta').each(function(i, e){
			var $this = $(this);
			$this.data('orig_text', $this.text());
		})

		function resetClamped(els) {
			els.each(function(i, e) {
				var $e = $(e);
				var origText = $e.data('orig_text');
				if (origText) {
					console.log(origText);
					$e.text(origText);
				}
			});
		}

		setTimeout(function(){
			mediaCheck({
				media: '(max-width: 767px)',
				entry: function(){
					resetClamped($('.slide-description p').not('.postmeta'));
				}
			})

			mediaCheck({
				media: '(min-width: 980px) and (max-width: 1200px)',
				entry: function() {
					console.log('enter (min-width: 980px) and (max-width: 1200px)');
					$('.slide-description p').not('.postmeta').each(function(i, e){
				        $clamp(e, {clamp: 6, useNativeClamp: false});
					})
				},
				exit: function() {
					console.log('exit (min-width: 980px) and (max-width: 1200px)');
					resetClamped($('.slide-description p').not('.postmeta'));
				}
			});
			mediaCheck({
				media: '(min-width: 768px) and (max-width: 979px)',
				entry: function() {
					console.log('enter (min-width: 768px) and (max-width: 979px)');
					$('.slide-description p').not('.postmeta').each(function(i, e){
				        $clamp(e, {clamp: 2, useNativeClamp: false});
					})
				},
				exit: function() {
					console.log('exit (min-width: 768px) and (max-width: 979px)');
					resetClamped($('.slide-description p').not('.postmeta'));
				}
			});
		}, 100);
	}

})

var viewControls = {
	gridView: function(target) {
		$('#grid-view').addClass('active');
		$('#list-view').removeClass('active');
		this.switchView('list', 'grid', target);
	},

	listView: function(target) {
		$('#list-view').addClass('active');
		$('#grid-view').removeClass('active');
		this.switchView('grid', 'list', target);
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

