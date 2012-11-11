// JavaScript Document\

$(document).ready(function(){

	//Calendar image rollover
	$("#calendar ul li.ro").mouseenter(function(){ 
		
		$(this).find('img.orig').fadeOut();	
		
	}).mouseleave(function(){
     	
		$(this).find('img.orig').fadeIn();		
		
    });
	
	$('#hero-home-slideshow').galleryView({
		panel_width: 720,     //改變圖片大小
		panel_height: 180,
		transition_speed: 1500,
		transition_interval: 8000, //改變圖片的速度
		nav_theme: 'img',
		border: 'none',
		easing: 'swing',
		show_captions: true,
		fade_panels: true,
		pause_on_hover: true
	});	
	
//	$('#hero-home-slideshow').mouseover(function(){
//    	
//		$(".panel-overlay").slideUp(500);
//		
//    }).mouseout(function(){
//      
//	  $(".panel-overlay").slideDown(500);
//	  
//    });
	


	
});