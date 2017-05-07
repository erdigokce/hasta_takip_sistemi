$(document).ready(function() {

  var model = 'streams';
  var controller = 'dashboard';
  var method = 'streams';
  var ajaxRequestHandler = controller+"/processCRUD/"+model+"/";

  var selectedPatientId;

  /**
   * DEVICE INFORMATIONS
   */

  $("button[name*='btn']").click(function() {
    var name = $(this).attr("name");
    var id = $(this).parent().parent().attr("id");

    var st_patient = $("tr#" + id + " > .st_patient").data("stpatient");
    var st_token = $("tr#" + id + " > .st_token").data("sttoken");

    // AJAX Setup
    $.ajaxSetup({
      url : ajaxRequestHandler,
      method : "POST",
      cache : false,
      dataType : "json"
    });

    switch (name) {
      case "btnEditStream":
        if (!$("tr#" + id + " > td > button[name='btnEditStream']").hasClass("disabled")) {
          $("tr#" + id + " > .st_patient > span.txtPatient").css("display", "none");
          $("tr#" + id + " > .st_patient > select[name='patient']").css("display", "block");
          $("tr#" + id + " > .st_token").html("<input class='form-control' type='text' name='st_token' value='" + st_token + "' required>");
          btnEditClick(id);
        }
        break;
      case "btnDeleteStream":
        if (!$("tr#" + id + " > td > button[name='btnDeleteStream']").hasClass("disabled")) {
          if (confirm("Kayıdı gerçekten silmek istiyor musunuz? (Bu işlem geri alınamaz!)")) {
            var dataToSendToServer = {
              ID: id,
              action : 'delete'
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnOkStream":
        if (!$("tr#" + id + " > td > button[name='btnOkStream']").hasClass("disabled")) {
          if (confirm("Değişiklikleri onaylıyor musunuz?")) {
            var dataToSendToServer = {
              ID: id,
              PATIENT_ID: selectedPatientId,
              TOKEN: $("input[name='st_token']").val()
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnCancelStream":
        if (!$("tr#" + id + " > td > button[name='btnCancelStream']").hasClass("disabled")) {
          $("tr#" + id + " > .st_patient > span.txtPatient").css("display", "block");
          $("tr#" + id + " > .st_patient > select[name='patient']").css("display", "none");
          $("tr#" + id + " > .st_token").html(st_token);
          btnCancelClick(id);
        }
        break;
      case "btnAddStream":
        if (!$("tr#" + id + " > td > button[name='btnAddPatient']").hasClass("disabled")) {
          $("tr#" + id + " > .st_patient > span.txtPatient").css("display", "none");
          $("tr#" + id + " > .st_patient > select[name='patient']").css("display", "block");
          $("tr#" + id + " > .st_token").html("<input class='form-control' type='text' name='st_token' value='' required>");
          btnAddClick(id);
        }
        break;
    }

  });

  $("select[name='patient']").click(function() {
    selectedPatientId = $(this).val();
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
      loadPage(controller + "/" + method + "/");
    });
  }
});
