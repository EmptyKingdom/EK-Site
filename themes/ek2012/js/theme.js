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
		interval: 5000
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
		click: function(event){

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
	
})