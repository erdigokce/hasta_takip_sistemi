$(document).ready(function() {

  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "board";
  }
  $("#menu_left > a[data-nav='"+initPage+"']").addClass("active");
  loadPage("dashboard/"+initPage+"/");

  var leftMenuHeight = windowHeight - headerRealHeight - footerRealHeight;
  $("#menu_left").css("height", leftMenuHeight);
  $("#container_menu_left_chevron").css("height", leftMenuHeight);
  $("#container_menu_left_chevron > span").css({
    "top": leftMenuHeight/2 - $("#container_menu_left_chevron > span").height()/2
  });

});
