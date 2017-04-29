$(document).ready(function() {

  // Navigation bussiness
  $("#menu_left > a").click(function(e) {
    e.preventDefault();
    $("#menu_left > a").removeClass("active");
    $("#content").load('dashboard/'+$(this).data('nav'));
    $(this).addClass("active");
  });

});
