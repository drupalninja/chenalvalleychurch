(function ($) {

  Drupal.behaviors.searchPlaceholder = {
    attach: function (context, settings) {
      $('.form-item-search-block-form .form-text').attr('placeholder', 'Search');
    }
  };

  Drupal.behaviors.chenalOmegaEqualHeights = {
    attach: function (context, settings) {
      equalheight('.l-footer .block');
    }
  };

  /* Thanks to CSS Tricks for pointing out this bit of jQuery
  http://css-tricks.com/equal-height-blocks-in-rows/
  It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

  equalheight = function(container){

    var width = $(window).width();

    if (width < 690) {
      $(container).removeAttr('style');
      return;
    }

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;

    $(container).each(function() {

      $el = $(this);
      $($el).height('auto')
      topPostion = $el.position().top;

      if (currentRowStart != topPostion) {
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
          rowDivs[currentDiv].height(currentTallest);
        }
        rowDivs.length = 0; // empty the array
        currentRowStart = topPostion;
        currentTallest = $el.height();
        rowDivs.push($el);
      } else {
        rowDivs.push($el);
        currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
      }
      for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
        rowDivs[currentDiv].height(currentTallest);
      }
    });
  }

  $(window).resize(function(){
    equalheight('.l-footer .block');

    $('.views_slideshow_cycle_main').each(function(){
      var cycleMain = $(this);
      var img_width = 0,
          img_height = 0;
      var clearCSS = {width: "auto", height: "auto"};
      var cycle = cycleMain.children('.views-slideshow-cycle-main-frame');
      cycleElements = cycle.data("cycle.opts");
      cycle.css(clearCSS);
      cycleMain.find('.views-slideshow-cycle-main-frame-row').each(function(i){
        $(this).css(clearCSS);
        var tmp_img_width = $(this).width();
        var tmp_img_height = $(this).height();
        if(tmp_img_width > img_width)
          img_width = tmp_img_width;
        if(tmp_img_height > img_height)
          img_height = tmp_img_height;
        cycleElements.elements[i].cycleW = tmp_img_width;
        cycleElements.elements[i].cycleH = tmp_img_height;
        $(this).css({width: tmp_img_width, height: tmp_img_height});
      });
      cycleMain.height(img_height);
      cycle.css({width: img_width, height: img_height});
      cycle.data("cycle.opts.elements", cycleElements);
    });
  });

})(jQuery);