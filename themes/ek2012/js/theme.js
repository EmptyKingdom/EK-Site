$(document).ready(function(){
	$('#basic-search').on({
		focus: function(){
			$(this).css({
				'border-color': '#333',
				'cursor': 'auto',
				'padding-left' : '24px'
			}).animate({
				'width' : 150
			})
		},
		blur: function(){
			$(this).css({
				'border-color': '#fff',
				'cursor': 'pointer',
				'padding-left': '16px'
			}).animate({
				'width' : 0
			})
		}
	}, 'input')
	
	$('#feature .carousel').carousel({
		interval: 20000
	}).on({
		slide: function(e){
			// e.relatedTarget slide coming in, but it's broken when the first slide is the one coming in
			var nextSlide = e.relatedTarget || $(this).find('.item:first').get(0);
			
			// activate the description element in the carousel sidebar
			var $descriptionEl = $($(nextSlide).data('description'));
			$descriptionEl.siblings().removeClass('active');
			$descriptionEl.addClass('active');
		}, 
		slid: function(e){
			var $this = $(this);
			var index = $this.find('.item.active').index();
			var $indicators = $this.find('.carousel-indicator li');
			
			// update the blue square indicator
			$indicators.removeClass('active');
			$indicators.eq(index).addClass('active');
		}
	});
	
	$('.carousel-indicator').on({
		click: function(e) {
			var $indicator = $(e.target);
			var index = $indicator.data('slide_to');
			$indicator.parents('.carousel').carousel(index);
		}
	}, 'a');
	
	$('ul#carousel-section-nav > li').on({
		click: function(e){

			var $this = $(this);
			
			// switch the selected carousel section nav
			$('#carousel-section-nav > li').removeClass('active');
			$this.parent('li').addClass('active');
			
			// switch the selected carousel section content
			$('.carousel-section-content').removeClass('active');
			$($this.data('section')).addClass('active');
			
			// switch the selected carousel
			$('#feature .carousel').removeClass('active').carousel('pause');
			$($this.data('carousel')).addClass('active').carousel('cycle');
		}
	}, 'a');
	
	$('#view-controls').on({
		click: function(e) {
			e.preventDefault();
			var $clicked = $(e.target);
			var action = $clicked.data('action');
			var target = $clicked.data('target') || null;
			if (typeof viewControls[action] == 'function') {
				viewControls[action](target);
			}
		}
	}, 'a');
	
	$('#cat-filters').on({
		click: function(e) {
			if ($(e.target).attr('id') == 'close-cat-filters') {
				$('#view-controls #cat-filter a').trigger('click');
			} else {
				$(this).parent('li').toggleClass('selected');
			}
		}
	}, 'a')
})

var viewControls = {
	gridView: function(target) {
		if (arguments.length == 0) {
			var target = '#post-list';
		}
		this.switchView('list', 'grid', target);
	},

	listView: function(target) {
		if (arguments.length == 0) {
			var target = '#post-list';
		}
		this.switchView('grid', 'list', target);
	},

	switchView: function(from, to, target) {
		$(target).removeClass(from).addClass(to);
	},
	
	showCatFilters: function() {
		$('#cat-filters').slideToggle();
	}
}