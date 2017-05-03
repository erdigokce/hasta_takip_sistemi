$(document).ready(function() {

  // Navigation bussiness
  $("#menu_left > li > a").click(function(e) {
    e.preventDefault();
    $("#menu_left > li").removeClass("active");
    $("#content").load('dashboard/'+$(this).data('nav'));
    $(this).parent().addClass("active");
  });

});
