(function() {
//  alert("Background color = " + $(".grid-item").css("display"));
      $("#themeBtn").click(function(){
        var checkedValue =$("input[type=radio][name=theme]:checked").val();
        checkedValue = "."+checkedValue;
        alert(checkedValue);
        $grid.isotope({ filter: checkedValue });
      });
      $("#areaBtn").click(function(){
        var checkedValue =$("input[type=radio][name=area]:checked").val();
        checkedValue = "."+checkedValue;
        $grid.isotope({ filter: checkedValue });
      });

      //theme-filter - modal
      $('.theme-modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        starting_top: '4%', // Starting top style attribute
        ending_top: '10%', // Ending top style attribute
      });
      //area-filter - modal
      $('.area-modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        starting_top: '4%', // Starting top style attribute
        ending_top: '10%', // Ending top style attribute
      });

      $('.grid-item').click(function(){
        var c_num = $(this).children('img').attr('alt');
        var href = "/clubdetail?c_num=" + c_num;
        document.location.href= href;
      });
      //**masonry js**//
      var $grid = $('.grid').isotope({
        //options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
      });

})(jQuery);
// external js: masonry.pkgd.js
