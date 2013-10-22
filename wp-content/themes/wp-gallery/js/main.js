function onPageLoad()
{
	$('.dropdown-toggle').dropdown();
	$('.gallery').magnificPopup( {
		delegate: 'a',
		type: 'image',
		gallery: {
			enabled: true,
			navigateByImgClick: false,
		},
		callbacks: {
			imageLoadComplete: setupSwipe
		}
	});
}

function setupSwipe(){
	$('.mfp-img').mousedown( function(event) {
		event.preventDefault();
	});
	$('.mfp-img').swipe({
		swipeLeft: function(event, direction, distance, duration, fingerCount) {
			$.magnificPopup.instance.next();
		},
		swipeRight: function(event, direction, distance, duration, fingerCount) {
			$.magnificPopup.instance.prev();
		},
		tap: function(event, direction, distance, duration, fingerCount) {
			$.magnificPopup.instance.next();
		},
		doubleTap: function(event, direction, distance, duration, fingerCount) {
			window.open($.magnificPopup.instance.currItem.src,'_blank');
		}
	});
}

$(onPageLoad);
