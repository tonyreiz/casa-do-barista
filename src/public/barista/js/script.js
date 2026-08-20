
$('.banner').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});

$('.cardEvento').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2200,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.item').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.roleta').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

new WOW({
  boxClass: 'wow',
  animateClass: 'animate__animated',
  offset: 0,
  mobile: true,
  live: true
}).init();

// MENU MOBILE  

document.querySelector(".abrir-menu").onclick = function () {
  document.documentElement.classList.add("menu-mobile")

}

document.querySelector(".fechar-menu").onclick = function () {

  document.documentElement.classList.remove("menu-mobile")

}

// On Scroll
// WINDOW = TELA
var topoFixo = document.getElementById('topoFixo');

if (topoFixo) {
  topoFixo.addEventListener('animationend', function (event) {
    if (event.animationName === 'menuFixoOut') {
      topoFixo.classList.remove('menu-fixo');
      topoFixo.classList.remove('menu-fixo-sair');
    }
  });

  window.onscroll = function () {
    var top = window.scrollY;

    if (top >= 1100) { //{ SE TOP FOR >= 1100
      topoFixo.classList.remove('menu-fixo-sair');
      topoFixo.classList.add('menu-fixo');
    } else { //{ SE NAO FOR
      if (topoFixo.classList.contains('menu-fixo')) {
        topoFixo.classList.add('menu-fixo-sair');
      }
    }
  };
}
