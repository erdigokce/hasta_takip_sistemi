/*******************************************************************************
******************************* Global Variables *******************************
*******************************************************************************/

var headerHeightFix;
var headerRealHeight;
var footerHeightFix;
var footerRealHeight;

/*----------------------------------------------------------------------------*/
$(document).ready(function() {

  if(typeof initPage === "undefined" || initPage === "" || initPage === null) {
    var initPage = "board";
  }
  $("#menu_left > a[data-nav='"+initPage+"']").addClass("active");
  loadPage("dashboard/"+initPage+"/");

  // Window resize event
  $(window).bind('resize', function() {
    refreshPositionValues();
    arrangeLeftMenuToggler();
    decideChevron();
  });

  /* Initial efforts */
  refreshPositionValues();
  arrangeLeftMenuToggler();
  decideChevron();

});
/*----------------------------------------------------------------------------*/

/*******************************************************************************
************************** General Purpose Functions ***************************
*******************************************************************************/

function decideChevron() {
  var chevron = $(".menu_left_chevron");
  if($(window).width() < 1200) {
    if(chevron.hasClass("glyphicon-triangle-left")){
      chevron.removeClass("glyphicon-triangle-left");
      chevron.addClass("glyphicon-triangle-top");
    }
    else if(chevron.hasClass("glyphicon-triangle-right")){
      chevron.removeClass("glyphicon-triangle-right");
      chevron.addClass("glyphicon-triangle-bottom");
    }
  } else {
    if(chevron.hasClass("glyphicon-triangle-top")){
      chevron.removeClass("glyphicon-triangle-top");
      chevron.addClass("glyphicon-triangle-left");
    }
    else if(chevron.hasClass("glyphicon-triangle-bottom")){
      chevron.removeClass("glyphicon-triangle-bottom");
      chevron.addClass("glyphicon-triangle-right");
    }
  }
}

function arrangeLeftMenuToggler() {
  if($(window).width() >= 1200) {
    var leftMenuHeight = $(window).height() - headerRealHeight - footerRealHeight;
    $("#menu_left").css("height", leftMenuHeight);
    $("#container_menu_left_chevron").css({
      "width" : "20px",
      "height" : leftMenuHeight
    });
    $("#container_menu_left_chevron > span").css({
      "left" : "0",
      "top": leftMenuHeight/2 - $("#container_menu_left_chevron > span").height()/2
    });
  } else {
    $("#menu_left").css("height", "100%");
    $("#container_menu_left_chevron").css({
      "width" : "100%",
      "height" : "20px",
      "margin-bottom" : "20px"
    });
    $("#container_menu_left_chevron > span").css({
      "height" : "20px",
      "top" : "0",
      "left" : ($("#container_menu_left_chevron > span").parent().width() / 2) - ($("#container_menu_left_chevron > span").width() / 2)
    });
  }
}

function toggleChevron() {
  var chevron = $(".menu_left_chevron");
  if($(window).width() >= 1200) {
    if(chevron.hasClass("glyphicon-triangle-left")) {
      /* Hide Left Menu */
      $("#menu_left").parent().hide(500, function() {
        /* Wrap Content */
        $("#content").parent().removeClass("col-lg-9");
        $("#content").parent().addClass("col-lg-11");
        chevron.removeClass("glyphicon-triangle-left");
        chevron.addClass("glyphicon-triangle-right");
      });
    } else {
      /* Show Left Menu */
      $("#menu_left").parent().show(500, function() {
        chevron.removeClass("glyphicon-triangle-right");
        chevron.addClass("glyphicon-triangle-left");
      });
      /* Unwrap Content */
      $("#content").parent().removeClass("col-lg-11");
      $("#content").parent().addClass("col-lg-9");
    }
  } else {
    if(chevron.hasClass("glyphicon-triangle-top")) {
      /* Hide Left Menu */
      $("#menu_left").parent().hide(500, function() {
        /* Wrap Content */
        $("#content").parent().removeClass("col-lg-9");
        $("#content").parent().addClass("col-lg-11");
        chevron.removeClass("glyphicon-triangle-top");
        chevron.addClass("glyphicon-triangle-bottom");
      });
    } else {
      /* Show Left Menu */
      $("#menu_left").parent().show(500, function() {
        chevron.removeClass("glyphicon-triangle-bottom");
        chevron.addClass("glyphicon-triangle-top");
      });
      /* Unwrap Content */
      $("#content").parent().removeClass("col-lg-11");
      $("#content").parent().addClass("col-lg-9");
    }
  }
}

function refreshPositionValues() {
  headerHeightFix = $("nav").css("margin-bottom");
  headerHeightFix = headerHeightFix.substr(0, headerHeightFix.length - 2);
  headerHeightFix = parseInt(headerHeightFix);

  headerRealHeight = $("header").height() + headerHeightFix;

  footerHeightFix = $("footer").css("margin-bottom");
  footerHeightFix = footerHeightFix.substr(0, footerHeightFix.length - 2);
  footerHeightFix = parseInt(footerHeightFix);

  footerRealHeight = $("footer").height() - footerHeightFix;
}
