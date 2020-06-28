(function ($) {
 "use strict";
 ////// menu click //
		$(".dropdown-submenu >.toggle-list-button").on("click", function (e) {
            var current = $(this).next();
            var grandparent = $(this).parent().parent();
            grandparent.find(".dropdown-menu:visible").not(current).hide();
            current.toggle();
            e.stopPropagation();
            $(this).parent().toggleClass('opened');
        });

   jQuery('.mobile-menu').meanmenu();

	var s = $("#sticker");
	var pos = s.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		if (windowpos > pos.top) {
		s.addClass("stick");
		} else {
			s.removeClass("stick");	
		}
	});

	

	$.scrollUp({
		scrollText: '<i class="fa fa-angle-up"></i>',
		easingType: 'linear',
		scrollSpeed: 900,
		animation: 'fade'
	});

	  var endDate = "August 20, 2017 12:40:00";
	  $('.nrb-countdown .row').countdown({
		date: endDate,
		render: function(data) {
		  $(this.el).html('<div><div class="days"><span>' + this.leadingZeros(data.days, 2) + '</span><span>days</span></div><div class="hours"><span>' + this.leadingZeros(data.hours, 2) + '</span><span>hours</span></div></div><div class="nrb-countdown-ms"><div class="minutes"><span>' + this.leadingZeros(data.min, 2) + '</span><span>minutes</span></div><div class="seconds"><span>' + this.leadingZeros(data.sec, 2) + '</span><span>seconds</span></div></div>');
		}
	  });



})(jQuery);
$(document).ready(function(){
    /*sidebar menu*/
	$('#footer_top .left-cart-menu > ul > li > a').on('click', function(){
		
			$(this).parent().find('.cat-sb').slideToggle(300);
			$(this).parent().toggleClass('active');
		
	});
    $(".search_click").click(function(){
        $(".search-area").slideToggle("fast");
    });
});