$(document).ready(function() {

  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "board";
  }
  $("#menu_left > a[data-nav='"+initPage+"']").addClass("active");
  loadPage("dashboard/"+initPage+"/");

});
