$(document).ready(function() {

  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "board";
  }
  $("li > a[data-nav='"+initPage+"']").parent().addClass("active");
  loadPage("dashboard/"+initPage+"/");

});
