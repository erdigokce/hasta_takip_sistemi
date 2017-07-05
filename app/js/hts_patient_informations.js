$(document).ready(function() {

  var model = 'patients';
  var controller = 'dashboard';
  var method = 'patientInformations';
  var ajaxRequestHandler = controller+"/processCRUD/"+model+"/";

  /**
   * PATIENT INFORMATIONS
   */

  $("button[name*='btn']").click(function() {
    var name = $(this).attr("name");
    var id = $(this).parent().parent().attr("id");

    var pi_name = $("tr#" + id + " > .pi_name").data("piname");
    var pi_surname = $("tr#" + id + " > .pi_surname").data("pisurname");
    var pi_address = $("tr#" + id + " > .pi_address").data("piaddress");
    var pi_phone1 = $("tr#" + id + " > .pi_phone1").data("piphone1");
    var pi_phone2 = $("tr#" + id + " > .pi_phone2").data("piphone2");
    var pi_email = $("tr#" + id + " > .pi_email").data("piemail");
    var pi_username = $("tr#" + id + " > .pi_username").data("piusername");
    var pi_apikey = $("tr#" + id + " > .pi_apikey").data("piapikey");

    // AJAX Setup
    $.ajaxSetup({
      url : ajaxRequestHandler,
      method : "POST",
      cache : false,
      dataType : "json"
    });

    switch (name) {
      case "btnEditPatient":
        if (!$("tr#" + id + " > td > button[name='btnEditPatient']").hasClass("disabled")) {
          $("tr#" + id + " > .pi_name").html("<input class='form-control' type='text' name='pi_name' value='" + pi_name + "' required>");
          $("tr#" + id + " > .pi_surname").html("<input class='form-control' type='text' name='pi_surname' value='" + pi_surname + "' required>");
          $("tr#" + id + " > .pi_address").html("<input class='form-control' type='text' name='pi_address' value='" + pi_address + "' required>");
          $("tr#" + id + " > .pi_phone1").html("<input class='form-control' type='phone' name='pi_phone1' value='" + pi_phone1 + "' required>");
          $("tr#" + id + " > .pi_phone2").html("<input class='form-control' type='phone' name='pi_phone2' value='" + pi_phone2 + "'>");
          $("tr#" + id + " > .pi_email").html("<input class='form-control' type='email' name='pi_email' value='" + pi_email + "' required>");
          $("tr#" + id + " > .pi_username").html("<input class='form-control' type='text' name='pi_username' value='" + pi_username + "'>");
          $("tr#" + id + " > .pi_apikey").html("<input class='form-control' type='text' name='pi_apikey' value='" + pi_apikey + "' required>");
          btnEditClick(id);
        }
        break;
      case "btnDeletePatient":
        if (!$("tr#" + id + " > td > button[name='btnDeletePatient']").hasClass("disabled")) {
          if (confirm("Kayıdı gerçekten silmek istiyor musunuz? (Bu işlem geri alınamaz!)")) {
            var dataToSendToServer = {
              ID: id,
              action : 'delete'
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnOkPatient":
        if (!$("tr#" + id + " > td > button[name='btnOkPatient']").hasClass("disabled")) {
          if (confirm("Değişiklikleri onaylıyor musunuz?")) {
            var dataToSendToServer = {
              ID: id,
              PATIENT_NAME: $("input[name='pi_name']").val(),
              PATIENT_SURNAME: $("input[name='pi_surname']").val(),
              PATIENT_ADDRESS: $("input[name='pi_address']").val(),
              PATIENT_PHONE: $("input[name='pi_phone1']").val(),
              PATIENT_PHONE2: $("input[name='pi_phone2']").val(),
              PATIENT_EMAIL: $("input[name='pi_email']").val(),
              PATIENT_USERNAME: $("input[name='pi_username']").val(),
              PATIENT_APIKEY: $("input[name='pi_apikey']").val()
            };
            sendAjaxRequest(dataToSendToServer);
          }
        }
        break;
      case "btnCancelPatient":
        if (!$("tr#" + id + " > td > button[name='btnCancelPatient']").hasClass("disabled")) {
          $("tr#" + id + " > .pi_name").html(pi_name);
          $("tr#" + id + " > .pi_surname").html(pi_surname);
          $("tr#" + id + " > .pi_address").html(pi_address);
          $("tr#" + id + " > .pi_phone1").html("<a href=\"tel:"+pi_phone1+"\">"+pi_phone1+"</a>");
          $("tr#" + id + " > .pi_phone2").html("<a href=\"tel:"+pi_phone2+"\">"+pi_phone2+"</a>");
          $("tr#" + id + " > .pi_email").html("<a href=\"mailto:"+pi_email+"\">"+pi_email+"</a>");
          $("tr#" + id + " > .pi_username").html(pi_username);
          $("tr#" + id + " > .pi_apikey").html(pi_apikey);
          btnCancelClick(id);
        }
        break;
      case "btnAddPatient":
        if (!$("tr#" + id + " > td > button[name='btnAddPatient']").hasClass("disabled")) {
          $("tr#" + id + " > .pi_name").html("<input class='form-control' type='text' name='pi_name' value='' required>");
          $("tr#" + id + " > .pi_surname").html("<input class='form-control' type='text' name='pi_surname' value='' required>");
          $("tr#" + id + " > .pi_address").html("<input class='form-control' type='text' name='pi_address' value='' required>");
          $("tr#" + id + " > .pi_phone1").html("<input class='form-control' type='phone' name='pi_phone1' value='' required>");
          $("tr#" + id + " > .pi_phone2").html("<input class='form-control' type='phone' name='pi_phone2' value='' >");
          $("tr#" + id + " > .pi_email").html("<input class='form-control' type='email' name='pi_email' value='' required>");
          $("tr#" + id + " > .pi_username").html("<input class='form-control' type='text' name='pi_username' value=''>");
          $("tr#" + id + " > .pi_apikey").html("<input class='form-control' type='text' name='pi_apikey' value='' required>");
          btnAddClick(id);
        }
        break;
    }

  });

  // Pagination
  $("ul.pagination > li > a").click(function() {
    if(!$(this).parent().hasClass("disabled")) {
      paginate(controller, method, $(this).data("pg"));
    }
  });

  // Patient search
  $("#formPatientInquire").submit(function(e) {
    e.preventDefault();
    var inquirePatient = $("input[name='inquirePatient']").val();
    if(inquirePatient != '') {
      loadPage(controller + "/" + method + "/" + page_no + "/" + records_per_page + "/" + $.trim(inquirePatient.replace(' ', '~')));
    } else {
      loadPage(controller + "/" + method + "/" + page_no + "/" + records_per_page + "/");
    }
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
