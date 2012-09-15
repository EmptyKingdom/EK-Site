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
})