$(document).ready(function() {
  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "project";
  }
  $("li > a[data-nav='"+initPage+"']").parent().addClass("active");
  loadPublicPage("home/"+initPage+"/");
});
