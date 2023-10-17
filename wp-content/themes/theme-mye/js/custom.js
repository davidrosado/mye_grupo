var $ = jQuery.noConflict();

$('#slider-ponentes').slick({
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: true,
  fade: true,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        arrows: false,
      }
    },
  ]
});

$('.slider-colaboramos').slick({
  dots: false,
  slidesToShow: 5,
  slidesToScroll: 5,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 5000,
  arrows: true,
  dots: false,
  responsive: [
    {
      breakpoint: 1360,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

/*DESLIZAR AL HREF DEL BOTON*/
$('a.go-to').click(function () {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html,body').animate({
        scrollTop: target.offset().top
      }, 150);
      return false;
    }
  }
});

document.addEventListener('wpcf7submit', function (event) {
  var status = event.detail.status;
  console.log(status);
  var button = $('.wpcf7-submit[disabled]');
  var old_value = button.attr('data-value');
  button.prop('disabled', false);
  button.val(old_value);
}, false);

$('form.wpcf7-form').on('submit', function () {
  var form = $(this);
  var formid = form.attr('id');
  var button = form.find('input[type=submit]');
  var buttonid = button.attr('id');
  var current_val = button.val();
  $('input#' + buttonid).attr('data-value', current_val);
  $('input#' + buttonid).prop("disabled", true);
  $('input#' + buttonid).val("Enviando...");
});

/*wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100
  }
);
wow.init();*/


$('#open-menu').click(function () {
  $('#menu-site').toggleClass('showMenu')
});

/*$('#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item').click(function() {
  $(this).find('.mega-sub-menu').toggleClass('showMenu')
}); */

$(document).ready(function () {

  // Gets the video src from the data-src on each button

  var $videoSrc;
  $('.video-btn').click(function () {
    $videoSrc = $(this).data("src");
  });
  console.log($videoSrc);



  // when the modal is opened autoplay it  
  $('#modalVideo').on('shown.bs.modal', function (e) {

    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
  })



  // stop playing the youtube video when I close the modal
  $('#modalVideo').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src', $videoSrc);
  })
});