$(document).ready(function() {

  var model = 'devices';
  var controller = 'dashboard';
  var method = 'deviceInformations';
  var ajaxRequestHandler = controller+"/processCRUD/"+model+"/";

  var selectedPatientId;

  /**
   * DEVICE INFORMATIONS
   */

  $("button[name*='btn']").click(function() {
    var name = $(this).attr("name");
    var id = $(this).parent().parent().attr("id");

    var di_patient = $("tr#" + id + " > .di_patient").data("dipatient");
    var di_name = $("tr#" + id + " > .di_name").data("diname");
    var di_desc = $("tr#" + id + " > .di_desc").data("didesc");
    var di_mac = $("tr#" + id + " > .di_mac").data("dimac");
    var di_host = $("tr#" + id + " > .di_host").data("dihost");
    var di_port = $("tr#" + id + " > .di_port").data("diport");

    // AJAX Setup
    $.ajaxSetup({
      url : ajaxRequestHandler,
      method : "POST",
      cache : false,
      dataType : "json"
    });

    switch (name) {
      case "btnEditDevice":
        if (!$("tr#" + id + " > td > button[name='btnEditDevice']").hasClass("disabled")) {
          $("tr#" + id + " > .di_patient > span.txtPatient").css("display", "none");
          $("tr#" + id + " > .di_patient > select[name='patient']").css("display", "block");
          $("tr#" + id + " > .di_name").html("<input class='form-control' type='text' name='di_name' value='" + di_name + "' required>");
          $("tr#" + id + " > .di_desc").html("<input class='form-control' type='text' name='di_desc' value='" + di_desc + "'>");
          $("tr#" + id + " > .di_mac").html("<input class='form-control' type='text' name='di_mac' value='" + di_mac + "'>");
          $("tr#" + id + " > .di_host").html("<input class='form-control' type='text' name='di_host' value='" + di_host + "'>");
          $("tr#" + id + " > .di_port").html("<input class='form-control' type='number' name='di_port' value='" + di_port + "'>");
          btnEditClick(id);
        }
        break;
      case "btnDeleteDevice":
        if (!$("tr#" + id + " > td > button[name='btnDeleteDevice']").hasClass("disabled")) {
          if (confirm("Kayıdı gerçekten silmek istiyor musunuz? (Bu işlem geri alınamaz!)")) {
            var dataToSendToServer = {
              ID: id,
              action : 'delete'
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnOkDevice":
        if (!$("tr#" + id + " > td > button[name='btnOkDevice']").hasClass("disabled")) {
          if (confirm("Değişiklikleri onaylıyor musunuz?")) {
            var dataToSendToServer = {
              ID: id,
              PATIENT_ID: selectedPatientId,
              DEVICE_NAME: $("input[name='di_name']").val(),
              DEVICE_DESCRIPTION: $("input[name='di_desc']").val(),
              DEVICE_MAC: $("input[name='di_mac']").val(),
              DEVICE_HOST: $("input[name='di_host']").val(),
              DEVICE_PORT: $("input[name='di_port']").val()
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnCancelDevice":
        if (!$("tr#" + id + " > td > button[name='btnCancelDevice']").hasClass("disabled")) {
          $("tr#" + id + " > .di_patient > span.txtPatient").css("display", "block");
          $("tr#" + id + " > .di_patient > select[name='patient']").css("display", "none");
          $("tr#" + id + " > .di_name").html(di_name);
          $("tr#" + id + " > .di_desc").html(di_desc);
          $("tr#" + id + " > .di_mac").html(di_mac);
          $("tr#" + id + " > .di_host").html(di_host);
          $("tr#" + id + " > .di_port").html(di_port);
          btnCancelClick(id);
        }
        break;
      case "btnAddDevice":
        if (!$("tr#" + id + " > td > button[name='btnAddDevice']").hasClass("disabled")) {
          $("tr#" + id + " > .di_patient > span.txtPatient").css("display", "none");
          $("tr#" + id + " > .di_patient > select[name='patient']").css("display", "block");
          $("tr#" + id + " > .di_name").html("<input class='form-control' type='text' name='di_name' value='' required>");
          $("tr#" + id + " > .di_desc").html("<input class='form-control' type='text' name='di_desc' value='' required>");
          $("tr#" + id + " > .di_mac").html("<input class='form-control' type='text' name='di_mac' value='' required>");
          $("tr#" + id + " > .di_host").html("<input class='form-control' type='text' name='di_host' value='' required>");
          $("tr#" + id + " > .di_port").html("<input class='form-control' type='number' name='di_port' value='' required>");
          btnAddClick(id);
        }
        break;
    }

    $("select[name='patient']").click(function() {
      selectedPatientId = $(this).val();
    });

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
