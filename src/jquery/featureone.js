$(document).ready(function() {
	$('#column-narrow')
	.on('click', function() {
		$('.main-body').addClass('narrow');
		$('.main-body').removeClass('large');
		$('.switcher button').removeClass('defaultWidth');
		$(this).addClass('selectedWidth');
	});
	$('#column-default')
	.on('click', function() {
		$('.main-body').removeClass('narrow');
		$('.main-body').addClass('large');
		$('.switcher button').removeClass('selectedWidth');
		$(this).addClass('defaultWidth');
	});
});

$(document).ready(function() {
	$('#color-blue')
	.on('click', function() {
		$('.main-body').addClass('blue');
		$('.main-body').removeClass('black');
		$('.switcher button').removeClass('defaultColor');
		$(this).addClass('colorBlue');
	});
	$('#color-default')
	.on('click', function() {
		$('.main-body').removeClass('blue');
		$('.main-body').addClass('black');
		$('.switcher button').removeClass('colorBlue');
		$(this).addClass('defaultColor');
	});
});






















