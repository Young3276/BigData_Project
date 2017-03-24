
(function() {
  // custom scrollbar
    "use strict";

    $("html").niceScroll({styler:"fb",cursorcolor:"#212121", cursorwidth: '4', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#FF9554", cursorwidth: '4', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});

    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

  //slide bar
  $('.button-collapse').sideNav({
  menuWidth: 240, // Default is 240
  edge: 'right', // Choose the horizontal origin
  closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  });

  //slide bar - modal
  $('.selectprofile').leanModal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    in_duration: 300, // Transition in duration
    out_duration: 200, // Transition out duration
    starting_top: '4%', // Starting top style attribute
    ending_top: '10%', // Ending top style attribute
  });

})(jQuery);
