(function ($) {

  /**
   * The recommended way for producing HTML markup through JavaScript is to write
   * theming functions. These are similiar to the theming functions that you might
   * know from 'phptemplate' (the default PHP templating engine used by most
   * Drupal themes including Omega). JavaScript theme functions accept arguments
   * and can be overriden by sub-themes.
   *
   * In most cases, there is no good reason to NOT wrap your markup producing
   * JavaScript in a theme function.
   */
  Drupal.theme.prototype.chenalOmegaExampleButton = function (path, title) {
    // Create an anchor element with jQuery.
    return $('<a href="' + path + '" title="' + title + '">' + title + '</a>');
  };

  /**
   * Behaviors are Drupal's way of applying JavaScript to a page. The advantage
   * of behaviors over simIn short, the advantage of Behaviors over a simple
   * document.ready() lies in how it interacts with content loaded through Ajax.
   * Opposed to the 'document.ready()' event which is only fired once when the
   * page is initially loaded, behaviors get re-executed whenever something is
   * added to the page through Ajax.
   *
   * You can attach as many behaviors as you wish. In fact, instead of overloading
   * a single behavior with multiple, completely unrelated tasks you should create
   * a separate behavior for every separate task.
   *
   * In most cases, there is no good reason to NOT wrap your JavaScript code in a
   * behavior.
   *
   * @param context
   *   The context for which the behavior is being executed. This is either the
   *   full page or a piece of HTML that was just added through Ajax.
   * @param settings
   *   An array of settings (added through drupal_add_js()). Instead of accessing
   *   Drupal.settings directly you should use this because of potential
   *   modifications made by the Ajax callback that also produced 'context'.
   */
  Drupal.behaviors.chenalOmegaExampleBehavior = {
    attach: function (context, settings) {
      // By using the 'context' variable we make sure that our code only runs on
      // the relevant HTML. Furthermore, by using jQuery.once() we make sure that
      // we don't run the same piece of code for an HTML snippet that we already
      // processed previously. By using .once('foo') all processed elements will
      // get tagged with a 'foo-processed' class, causing all future invocations
      // of this behavior to ignore them.
      $('.some-selector', context).once('foo', function () {
        // Now, we are invoking the previously declared theme function using two
        // settings as arguments.
        var $anchor = Drupal.theme('chenalOmegaExampleButton', settings.myExampleLinkPath, settings.myExampleLinkTitle);

        // The anchor is then appended to the current element.
        $anchor.appendTo(this);
      });
    }
  };

  $(window).resize(function(){
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