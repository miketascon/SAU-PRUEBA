/*
 _____  __  __  ____                __                   
/\___ \/\ \/\ \/\  _`\             /\ \                  
\/__/\ \ \ \_\ \ \ \/\_\    ___    \_\ \     __    ____  
   _\ \ \ \  _  \ \ \/_/_  / __`\  /'_` \  /'__`\ /',__\ 
  /\ \_\ \ \ \ \ \ \ \L\ \/\ \L\ \/\ \L\ \/\  __//\__, `\
  \ \____/\ \_\ \_\ \____/\ \____/\ \___,_\ \____\/\____/
   \/___/  \/_/\/_/\/___/  \/___/  \/__,_ /\/____/\/___/ 
                                                         
http://www.jhcodes.com/
Jesus Herrera - jesuxherrera@jhcodes.com
*/


var opts = {
  lines: 17 // The number of lines to draw
, length: 18 // The length of each line
, width: 2 // The line thickness
, radius: 11 // The radius of the inner circle
, scale: 1 // Scales overall size of the spinner
, corners: 1 // Corner roundness (0..1)
, color: '#FFF' // #rgb or #rrggbb or array of colors
, opacity: 0 // Opacity of the lines
, rotate: 0 // The rotation offset
, direction: 1 // 1: clockwise, -1: counterclockwise
, speed: 1 // Rounds per second
, trail: 60 // Afterglow percentage
, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
, zIndex: 2e9 // The z-index (defaults to 2000000000)
, className: 'spinner' // The CSS class to assign to the spinner
, top: '50%' // Top position relative to parent
, left: '50%' // Left position relative to parent
, shadow: false // Whether to render a shadow
, hwaccel: false // Whether to use hardware acceleration
, position: 'absolute' // Element positioning
}
var target = document.getElementById('loading')
var spinner = new Spinner(opts).spin(target);



// Page Load
$(document).ready(function() {
  $(window).load(function() {

  	  // Remove Loading
      $("#loading").fadeOut(1000);

      $('.status-post').emotions();

      $('.delete-timeline').on('click', function(){

          var timeline = $(this).attr('data-timeline');
          var sender = 'idtimeline='+timeline;

          $.ajax({

          	type: 'POST',
          	url: 'includes/eliminar-publicacion.php',
          	data: sender,
            success: function(){
              $('#timeline-post-'+timeline).addClass('animated zoomOut').fadeOut(1000);
            },
            error: function(){

            }


          });


      });








    });
});


