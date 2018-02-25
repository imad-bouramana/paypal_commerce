$(document).ready(function(){
	'use strict';
	
  $('span').click(function(){
        $(this).toggleClass('active').parent().next().fadeToggle();
        if($(this).hasClass('active')) {
             $(this).removeClass('glyphicon-plus');
             $(this).addClass('glyphicon-minus');

             
        }else{
              $(this).removeClass('glyphicon-minus');
              $(this).addClass('glyphicon-plus');
        }
    });
    
});