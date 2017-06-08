$(document).ready(function() {
  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "project";
  }
  $("li > a").parent().removeClass("active");
  $("li > a[data-nav='"+initPage+"']").parent().addClass("active");
  loadPublicPage("home/"+initPage+"/");

  /* Read the redirection cookie*/
  loadPublicPage(getRedirectionCookie());
});

function getRedirectionCookie() {
  var cookies = document.cookie.split(";");
  var cookiesKeyValue;
  for (var i = 0; i < cookies.length; i++) {
    cookiesKeyValue = cookies[i].split("=");
  }
  if(cookiesKeyValue[0] == "redirectTo") {
    return cookiesKeyValue[1]; // redirectTo
  } else {
    return "home";
  }
}
