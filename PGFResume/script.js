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

  $('#form-contact').submit(function() {
    var inputEmail = $("#input-email");
    var inputName = $("#input-name");
    var inputMessage = $("#input-message");


    var hasError;

    var isNameEmpty = inputName.val().length == 0;
    if (isNameEmpty) {
      inputName.parent().addClass('has-error');
      hasError = true;
    } else {
      inputName.parent().removeClass('has-error');
    }

    if (!validateEmail(inputEmail.val())) {
      inputEmail.parent().addClass('has-error');
      hasError = true;
    } else {
      inputEmail.parent().removeClass('has-error');
    }

    var isMessageEmpty = inputMessage.val().length == 0;
    if (isMessageEmpty) {
      inputMessage.parent().addClass('has-error');
      hasError = true;
    } else {
      inputMessage.parent().removeClass('has-error');
    }

    return !hasError;

  });


  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
});