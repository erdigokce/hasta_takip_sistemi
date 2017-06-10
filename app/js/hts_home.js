$(document).ready(function() {
  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "project";
  }
  $("li > a").parent().removeClass("active");
  $("li > a[data-nav='"+initPage+"']").parent().addClass("active");
  loadPublicPage("home/"+initPage+"/");

  /* Read the redirection cookie */
  var redirection = getRedirectionCookie();
  if(typeof redirection !== 'undefined' && redirection != "") {
    loadPublicPage(redirection, resetRedirectionCookie());
  }
});

function getRedirectionCookie() {
  var cookiesKeyValue = getCookieValuesAsArray();
  if(!isNullOrEmptyArray(cookiesKeyValue)) {
    if(cookiesKeyValue[0][0] == "redirectTo") {
      return cookiesKeyValue[0][1]; // redirectTo
    } else {
      return "home";
    }
  }
}

function resetRedirectionCookie() {
  var cookiesKeyValue = getCookieValuesAsArray();
  var cookiesRaw = "";
  if(!isNullOrEmptyArray(cookiesKeyValue) && cookiesKeyValue[0][0] == "redirectTo") {
    cookiesKeyValue[0][1] = ""; // redirectTo
    for (var i = 0; i < cookiesKeyValue.length; i++) {
      for (var j = 0; j < cookiesKeyValue[i].length; j++) {
        cookiesRaw = cookiesRaw + (j == 0 ? "" : "=");
        cookiesRaw = cookiesRaw + cookiesKeyValue[i][j];
      }
      cookiesRaw = cookiesRaw + (i == cookiesKeyValue.length-1 ? "; path=/" : ";");
    }
  }
  document.cookie = cookiesRaw;
}
