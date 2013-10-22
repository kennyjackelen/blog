function onPageLoad()
{
  $('.dropdown-toggle').dropdown();
  initGalleryPopup();
}

function initGalleryPopup(){
  if($.fn.magnificPopup === undefined){
    return;
  }

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
  var _preventDefault = function(event){event.preventDefault();};

  $('[class^="mfp"]').bind('dragstart',_preventDefault).bind('selectstart',_preventDefault);
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
