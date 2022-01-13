$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 100){ 	
	sticky.addClass('fixedheader');
	$('.navbar-brand-centered').css("width", "10%");
	$('.nav1.nav.nav-wil').css("padding", "6px");
	
	}else{ 
	sticky.removeClass('fixedheader');
	$('.navbar-brand-centered').css("width", "");
	$('.nav1.nav.nav-wil').css("padding", "");
  }
  if (scroll >= 200){
	  $('#fp-nav').removeClass('hidden');
  }else{
	  $('#fp-nav').addClass('hidden');
	  
  }
});
/*$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<1;i++) {
    next=next.next();
    if (!next.length) {
     next = $(this).siblings(':first');
   }
    
    next.children(':first-child').clone().appendTo($(this));
  }
});*/



function scrooling(val){
 $("html, body").animate({
        scrollTop: $("#"+val).offset().top
    }, 1000);
}