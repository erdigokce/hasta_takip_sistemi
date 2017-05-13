$(document).ready(function() {
  var initPage = "board";
  $("li > a[data-nav='"+initPage+"']").parent().addClass("active");
  $("#content").load("dashboard/"+initPage+"/");
}
