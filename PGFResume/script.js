$(function() {
  // Connect owl carousel to the project. https://owlcarousel2.github.io/OwlCarousel2/
  $('.owl-carousel').owlCarousel({
    singleItem: true,
    items: 4,
    margin: 0,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 3,
        nav: false
      },
      1000: {
        items: 4,
        nav: true,
        loop: false
      }
    }
  });
});