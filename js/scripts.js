/* zwijanie/rozwijanie opisów prelegentów */
function show_hide1 (obj) {
  $(".hide").addClass("show");
  $(".zwin").addClass("show_fa");
  $(".rozwin").addClass("hide");
};

function show_hide2 () {
  $(".hide").removeClass("show");
  $(".zwin").removeClass("show_fa");
  $(".rozwin").removeClass("hide");
};


/* pojawianie się opisów prelegentów na scroll */
$(document).ready(function () {
  var $contactElements = $('.prelegenci_opis_div');
  var $windowContact = $(window);
  $windowContact.on('scroll', check_if_in_view2);

  function check_if_in_view2() {
    var windowContactHeight = $windowContact.height();
    var windowContactTopPosition = $windowContact.scrollTop();
    var windowContactBottomPosition = (windowContactTopPosition + windowContactHeight);

    $.each($contactElements, function () {
      var $elementC = $(this);
      var elementCHeight = $elementC.outerHeight();
      var elementCTopPosition = $elementC.offset().top;
      var elementCBottomPosition = (elementCTopPosition + elementCHeight);

//check to see if this current container is within viewport*/
      if ((elementCBottomPosition >= windowContactTopPosition) &&
        (elementCTopPosition <= windowContactBottomPosition)) {
        $elementC.addClass('in-view2');
      } else {
        // $elementC.removeClass('in-view2');
      }
    });
  }
});

$(document).ready(function () {
  var $contactElements = $('.advantages_each');
  var $windowContact = $(window);
  $windowContact.on('scroll', check_if_in_view);

  function check_if_in_view() {
    var windowContactHeight = $windowContact.height();
    var windowContactTopPosition = $windowContact.scrollTop();
    var windowContactBottomPosition = (windowContactTopPosition + windowContactHeight);

    $.each($contactElements, function () {
      var $elementC = $(this);
      var elementCHeight = $elementC.outerHeight();
      var elementCTopPosition = $elementC.offset().top;
      var elementCBottomPosition = (elementCTopPosition + elementCHeight);

//check to see if this current container is within viewport*/
      if ((elementCBottomPosition >= windowContactTopPosition) &&
        (elementCTopPosition <= windowContactBottomPosition)) {
        $elementC.fadeIn(1000);
      } else {
        // $elementC.removeClass('in-view2');
      }
    });
  }
});


function showSpoiler(obj) {
    var inner = obj.parentNode.getElementsByClassName("inner")[0];
    var arrow = obj.parentNode.getElementsByClassName("arrow-prelegenci")[0];
    var arrow2 = obj.parentNode.getElementsByClassName("arrow-prelegenci2")[0];

    if (inner.style.display == "none") {
        inner.style.display = "";
        arrow.style.display = "none";
        arrow2.style.display = "";
    }
    // else
        // inner.style.display = "none";
        // arrow.style.display = "";
}

function showSpoiler2(obj) {
    var inner = obj.parentNode.getElementsByClassName("inner")[0];
    var arrow = obj.parentNode.getElementsByClassName("arrow-prelegenci")[0];
    var arrow2 = obj.parentNode.getElementsByClassName("arrow-prelegenci2")[0];

    if (inner.style.display == "") {
        inner.style.display = "none";
        arrow.style.display = "";
        arrow2.style.display = "none";
    }
    // else
    //     inner.style.display = "none";
    //     inner2.style.display = "none";
}

function dane_osoby () {
}