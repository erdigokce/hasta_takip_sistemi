$(document).ready(function() {

  // Navigation bussiness
  $("#menu_left > a").click(function(e) {
    e.preventDefault();
    $("#content").load('dashboard/'+$(this).data('nav'));
  });

});
