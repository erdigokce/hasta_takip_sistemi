$(document).ready(function() {

  var controller = 'dashboard';
  var method = 'patientLogs';
  var ajaxRequestHandler = controller+"/"+method+"/";

  /**
   * PATIENT LOGS
   */

   // AJAX Setup
   $.ajaxSetup({
     url : ajaxRequestHandler,
     method : "POST",
     cache : false,
     dataType : "json"
   });

   $("#plotly_nav > li").click(function() {
     $("#plotly_nav > li").removeClass("active");
     var target = $(this).data("target");
     $(this).addClass("active");
     $("#plotly_nav").siblings().css("display", "none");
     $(target).css("display", "block");
   });

  $("select[name='patient']").change(function() {
    var selectedPatientId = $(this).val();
    loadPage(controller + "/" + method + "/" + selectedPatientId + "/");
  });

  // Pagination
  $("ul.pagination > li > a").click(function() {
    paginate(controller, method, $(this).data("pg"));
  });

  function sendAjaxRequest(dataToSend) {
    var request = $.ajax({
      data : dataToSend
    });
    request.always(function(data) {
      $('#'+data[0]).html(data[1]);
      $('#'+data[0]).parent().css("display", "block");
    });
  }

});
