$(document).ready(function() {

  var model = 'patientlogschedules';
  var controller = 'dashboard';
  var method = 'patientLogSchedules';
  var ajaxRequestHandler = controller+"/processCRUD/"+model+"/";

  var selectedDeviceId;

  /**
   * DEVICE INFORMATIONS
   */

  $("button[name*='btn']").click(function() {
    var name = $(this).attr("name");
    var id = $(this).parent().parent().attr("id");

    var sch_device_socket = $("tr#" + id + " > .sch_device_socket").data("schdevicesocket");
    var sch_pattern = $("tr#" + id + " > .sch_pattern").data("schpattern");
    var sch_type = $("tr#" + id + " > .sch_type").data("schtype");
    var sch_duration = $("tr#" + id + " > .sch_duration").data("schduration");
    var sch_description = $("tr#" + id + " > .sch_description").data("schdescription");

    // AJAX Setup
    $.ajaxSetup({
      url : ajaxRequestHandler,
      method : "POST",
      cache : false,
      dataType : "json"
    });

    switch (name) {
      case "btnEditSchedule":
        if (!$("tr#" + id + " > td > button[name='btnEditSchedule']").hasClass("disabled")) {
          $("tr#" + id + " > .sch_device_socket > span.txtDevice").css("display", "none");
          $("tr#" + id + " > .sch_device_socket > select[name='device']").css("display", "block");
          $("tr#" + id + " > .sch_pattern").html("<input class='form-control' type='text' name='sch_pattern' value='" + sch_pattern + "' required>");
          $("tr#" + id + " > .sch_type").html("<input class='form-control' type='text' name='sch_type' value='" + sch_type + "'>");
          $("tr#" + id + " > .sch_duration").html("<input class='form-control' type='phone' name='sch_duration' value='" + sch_duration + "' required>");
          $("tr#" + id + " > .sch_description").html("<input class='form-control' type='text' name='sch_description' value='" + sch_description + "'>");
          btnEditClick(id);
        }
        break;
      case "btnDeleteSchedule":
        if (!$("tr#" + id + " > td > button[name='btnDeleteSchedule']").hasClass("disabled")) {
          if (confirm("Kayıdı gerçekten silmek istiyor musunuz? (Bu işlem geri alınamaz!)")) {
            var dataToSendToServer = {
              ID: id,
              action : 'delete'
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnOkSchedule":
        if (!$("tr#" + id + " > td > button[name='btnOkSchedule']").hasClass("disabled")) {
          if (confirm("Değişiklikleri onaylıyor musunuz?")) {
            var dataToSendToServer = {
              ID: id,
              DEVICE_ID: selectedDeviceId,
              SCHEDULE_PATTERN: $("input[name='sch_pattern']").val(),
              SCHEDULE_TYPE: $("input[name='sch_type']").val(),
              DURATION: $("input[name='sch_duration']").val(),
              DESCRIPTION: $("input[name='sch_description']").val()
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnCancelSchedule":
        if (!$("tr#" + id + " > td > button[name='btnCancelSchedule']").hasClass("disabled")) {
          $("tr#" + id + " > .sch_device_socket > span.txtDevice").css("display", "block");
          $("tr#" + id + " > .sch_device_socket > select[name='device']").css("display", "none");
          $("tr#" + id + " > .sch_pattern").html(sch_pattern);
          $("tr#" + id + " > .sch_type").html(sch_type);
          $("tr#" + id + " > .sch_duration").html(sch_duration);
          $("tr#" + id + " > .sch_description").html(sch_description);
          btnCancelClick(id);
        }
        break;
      case "btnAddSchedule":
        if (!$("tr#" + id + " > td > button[name='btnAddSchedule']").hasClass("disabled")) {
          $("tr#" + id + " > .sch_device_socket > span.txtDevice").css("display", "none");
          $("tr#" + id + " > .sch_device_socket > select[name='device']").css("display", "block");
          $("tr#" + id + " > .sch_pattern").html("<input class='form-control' type='text' name='sch_pattern' value='' required>");
          $("tr#" + id + " > .sch_type").html("<input class='form-control' type='text' name='sch_type' value='' required>");
          $("tr#" + id + " > .sch_duration").html("<input class='form-control' type='phone' name='sch_duration' value='' required>");
          $("tr#" + id + " > .sch_description").html("<input class='form-control' type='phone' name='sch_description' value='' >");
          $("tr#" + id + " > .pi_email").html("<input class='form-control' type='email' name='pi_email' value='' required>");
          btnAddClick(id);
        }
        break;
    }

    $("select[name='device']").click(function() {
      selectedDeviceId = $(this).val();
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
