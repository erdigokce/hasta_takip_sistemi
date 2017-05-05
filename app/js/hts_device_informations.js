$(document).ready(function() {

  var model = 'devices';
  var ajaxRequestHandler = "dashboard/processCRUD/"+model+"/";
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

    switch (name) {
      case "btnEditDevice":
        if (!$("tr#" + id + " > td > button[name='btnEditDevice']").hasClass("disabled")) {
          $("tr#" + id + " > .di_patient").html("<input class='form-control' type='text' name='di_patient' value='" + di_patient + "' required>");
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
            $.post(ajaxRequestHandler, {
              delete_id: id
            }, function(data, status) {

            });
          }
        }
        break;
      case "btnOkDevice":
        if (!$("tr#" + id + " > td > button[name='btnOkDevice']").hasClass("disabled")) {
          if (confirm("Değişiklikleri onaylıyor musunuz?")) {
            $.post(ajaxRequestHandler, {
              ok_id: id,
              ok_patient: $("input[name='di_patient']").val(),
              ok_name: $("input[name='di_name']").val(),
              ok_desc: $("input[name='di_desc']").val(),
              ok_mac: $("input[name='di_mac']").val(),
              ok_host: $("input[name='di_host']").val(),
              ok_port: $("input[name='di_port']").val()
            }, function(data, status) {
              btnCancelClick(id);
            });
          }
        }
        break;
      case "btnCancelDevice":
        if (!$("tr#" + id + " > td > button[name='btnCancelDevice']").hasClass("disabled")) {
          $("tr#" + id + " > .di_patient").html(di_patient);
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
          $("tr#" + id + " > .di_patient").html("<input class='form-control' type='text' name='di_patient' value=''>");
          $("tr#" + id + " > .di_name").html("<input class='form-control' type='text' name='di_name' value='' required>");
          $("tr#" + id + " > .di_desc").html("<input class='form-control' type='text' name='di_desc' value='' required>");
          $("tr#" + id + " > .di_mac").html("<input class='form-control' type='text' name='di_mac' value='' required>");
          $("tr#" + id + " > .di_host").html("<input class='form-control' type='text' name='di_host' value='' required>");
          $("tr#" + id + " > .di_port").html("<input class='form-control' type='number' name='di_port' value='' required>");
          btnAddClick(id);
        }
        break;
      default:
    }

  });

  // Pagination
  $("ul.pagination > li > a").click(function() {
    loadPage('dashboard/deviceInformations/' + $(this).data("pg") + "/");
  });
});
