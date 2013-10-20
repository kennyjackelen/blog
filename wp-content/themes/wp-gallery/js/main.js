function onPageLoad()
{
	$('.dropdown-toggle').dropdown();
	$('.gallery').magnificPopup( {
		delegate: 'a',
		type: 'image',
		gallery: { enabled: true }
	});
}

$(onPageLoad);
