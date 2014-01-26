function onPageLoad()
{
  $('.dropdown-toggle').dropdown();
  attachLoadingAlertOnUnload();
  initGalleryPopup();
  hideLoadingMessage();
}

function hideLoadingMessage(){
  $('#loading_message').slideUp(500);
}

function attachLoadingAlertOnUnload(){
  window.onbeforeunload = showLoadingAlertOnUnload;
}

function showLoadingAlertOnUnload(){
  $('#loading_message').slideDown(500);
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
    image: {
      titleSrc: getTitleForGalleryItem
    },
    callbacks: {
      imageLoadComplete: setupSwipe
    }
  });
}

function getTitleForGalleryItem(item){
  // WordPress stopped adding the title to the actual link (see
  // wp_get_attachment_link in wp-includes/post-template.php), so we need
  // to inspect the image tag's alt attribute to get our caption now.
  return item.el.children('img').first().attr('alt');
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
