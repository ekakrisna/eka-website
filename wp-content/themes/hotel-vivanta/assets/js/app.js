(function($) {



  $(window).load(function(){

  $(".explore-section .slider-item:first-child").addClass("active");

});

if (jQuery(window).width() < 991) {
$(".search-wrap").insertAfter(".site-branding");
}

$('.room-section .custom-slideshow').slick({
    infinite: true,
    autoplay: true,
    arrows: false,
    slidesToShow: 1,
    pauseOnHover:false,
    centerMode: true,
    centerPadding: '350px',
    responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
               centerPadding: '200px',
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
             centerPadding: '150px',
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
          }
        }
    ]
  });

// makes the parallax elements
function parallaxIt() {
  // create variables
  var $fwindow = $(window);
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  var $contents = [];
  var $backgrounds = [];

  // for each of content parallax element
  $('[data-type="content"]').each(function(index, e) {
    var $contentObj = $(this);

    $contentObj.__speed = ($contentObj.data('speed') || 1);
    $contentObj.__fgOffset = $contentObj.offset().top;
    $contents.push($contentObj);
  });

  // for each of background parallax element
  $('[data-type="background"]').each(function() {
    var $backgroundObj = $(this);

    $backgroundObj.__speed = ($backgroundObj.data('speed') || 1);
    $backgroundObj.__fgOffset = $backgroundObj.offset().top;
    $backgrounds.push($backgroundObj);
  });

  // update positions
  $fwindow.on('scroll resize', function() {
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    $contents.forEach(function($contentObj) {
      var yPos = $contentObj.__fgOffset - scrollTop / $contentObj.__speed;

      $contentObj.css('top', yPos);
    })

    $backgrounds.forEach(function($backgroundObj) {
      var yPos = -((scrollTop - $backgroundObj.__fgOffset) / $backgroundObj.__speed);

      $backgroundObj.css({
        backgroundPosition: '50% ' + yPos + 'px'
      });
    });
  });

  // triggers winodw scroll for refresh
  $fwindow.trigger('scroll');
};

parallaxIt();


    // $('.nav-wrapper').stickMe({
    //     transitionDuration: 500,
    //     shadow: true,
    //     shadowOpacity: 0.6,
    // });



    // $('.theme-footer').footerReveal({shadow: false});

    function responsiveIframe() {
        var videoSelectors = [
            'iframe[src*="player.vimeo.com"]',
            'iframe[src*="youtube.com"]',
            'iframe[src*="youtube-nocookie.com"]',
            'iframe[src*="kickstarter.com"][src*="video.html"]',
            'iframe[src*="screenr.com"]',
            'iframe[src*="blip.tv"]',
            'iframe[src*="dailymotion.com"]',
            'iframe[src*="viddler.com"]',
            'iframe[src*="qik.com"]',
            'iframe[src*="revision3.com"]',
            'iframe[src*="hulu.com"]',
            'iframe[src*="funnyordie.com"]',
            'iframe[src*="flickr.com"]',
            'embed[src*="v.wordpress.com"]',
            'iframe[src*="videopress.com"]',
            'embed[src*="videopress.com"]'
            // add more selectors here
        ];
        var allVideos = videoSelectors.join(',');
        jQuery(allVideos).wrap('<span class="media-holder" />');
    }

    // Responsive Iframes
    responsiveIframe();



})(jQuery);

