$(document).on("scroll", function(){
  if($(document).scrollTop() > 100){
    $(".bikes-nav").addClass("shrink");
    $(".bikes-nav").addClass("admin-shrink");

  }else{
    $(".bikes-nav").removeClass("shrink");
    $(".bikes-nav").removeClass("admin-shrink");
  }
})
const menuIcon = document.getElementById("menu-icon");
const slideoutMenu = document.getElementById("slideout-menu");
const body = document.getElementById("body-area");


menuIcon.addEventListener("click", function () {
    if (slideoutMenu.style.opacity == "1") {
        slideoutMenu.style.opacity = "0";
        slideoutMenu.style.pointerEvents = "none";
        body.style.overflow = "auto";

        $('.hamburger').toggleClass('is-active');
    } else {
        slideoutMenu.style.opacity = "1";
        slideoutMenu.style.pointerEvents = "auto";
        body.style.overflow = "hidden";
        $('.hamburger').toggleClass('is-active');
    }
});

(function () {
    $('.menu-lists').on('click', function () {
        $('.hamburger').toggleClass('is-active');
    })
})();

function closeNavSp() {
    if (slideoutMenu.style.opacity == "1") {
        slideoutMenu.style.opacity = "0";
        slideoutMenu.style.pointerEvents = "none";
        body.style.overflow = "auto";
        $('.hamburger').toggleClass('is-active');
    } else {
        slideoutMenu.style.opacity = "1";
        slideoutMenu.style.pointerEvents = "auto";
        $('.hamburger').toggleClass('is-active');
        body.style.overflow = "hidden";
    }
}

$('.index-carousel').slick({
  dots: true,
  infinite: true,
  draggable: false,
  accessibility: false,
  arrows: false,
  autoplay: true,
  speed: 300,
  centerMode: true,
  variableWidth: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
$('.bikes-carousel').slick({
  infinite: true,
  autoplay: true,
  arrows: false,
});
$('.products-sale-carousel').slick({
  infinite: true,
  autoplay: false,
  arrows: false,
  draggable: false,
  accessibility: false,
  dots: true,
  slidesToShow: 1,
  slidesToScroll: 1,
});
$('.right-img-carousel').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  draggable: false,
  accessibility: false,
  fade: true, 
});
$('a[data-slide]').click(function(e) {
  e.preventDefault();
  var slideno = $(this).data('slide');
  $('.right-img-carousel').slick('slickGoTo', slideno - 1);
});
$('.news-sale-carousel').slick({
  infinite: true,
  autoplay: false,
  arrows: false,
  dots: true,
});


$('.news-carousel').slick({
  infinite: true,
  arrows: false,
});
$('.accessories-carousel').slick({
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.supplier-carousel').slick({
  
  speed: 500,
  autoplay: true,
  draggable: false,
  accessibility: false,
  slidesToShow: 5,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.clicked-main-carousel').slick({
  arrows: false,
  fade: true,
});
$('a[data-slide]').click(function(e) {
  e.preventDefault();
  var slideno = $(this).data('slide');
  $('.clicked-main-carousel').slick('slickGoTo', slideno - 1);
});

$(document).ready(function() {
  $(window).scroll(function() {
  if ($(this).scrollTop() > 20) {
  $('#toTopBtn').fadeIn();
  } else {
  $('#toTopBtn').fadeOut();
  }
  });
  
  $('#toTopBtn').click(function() {
  $("html, body").animate({
  scrollTop: 0
  }, 1);
  return false;
  });
  });

  var myMap;
  var myLatlng = new google.maps.LatLng(14.061534, 121.118024);
  function initialize() {
      var mapOptions = {
          zoom: 13,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP  ,
          scrollwheel: false
      }
      myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
      var marker = new google.maps.Marker({
          position: myLatlng,
          map: myMap,
          title: 'Name Of Business',
          icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
      });
  }
  google.maps.event.addDomListener(window, 'load', initialize);



  function triggerClick(){
    document.querySelector('#file').click();
  }
  function displayImage(e) {
    if(e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }