// $('.sidebar').click(function(e) {//when sidebar is clicked
//    e.stopPropagation(); //sidebar isn't part of the original work method anymore
// });
//
// $('body').click(function(){
//     $('.sidebar').animate({width: 0}, 500);
// });
//

$('button.close').click(function(){ //when the close button is clicked
  $('.sidebar').animate({width: 0}, 500); //animate from the open width to 0
  $('button.open').css('opacity', 1); //show filter button again
});

$('button.open').click(function() { //when the open button is clicked
  $('.sidebar').show(); //show the sidebar again
  $('.sidebar').animate({width: '20em'}, 500); //animate from 0 to 20em width
  $(this).css('opacity', 0); //hide the filter button
});

// Show delete employee button.
$('.verwijder_medewerker a').click(function() {
  $(this).hide();
  $('.verwijder_medewerker').children().eq(1).show();
});
$('.edit_vacature').click(function() {
 $('div.edit').show();
 $('div.edit_job_info').show();
 $('.info').hide();
 $('.job-info span').hide();
 $('.item-titel').hide();
});
