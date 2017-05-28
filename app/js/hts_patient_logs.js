$(document).ready(function() {

	var controller = 'dashboard';
	var method = 'patientLogs';
	var url = controller + "/" + method + "/";

	/**
	 * PATIENT LOGS
	 */

	$("#plotly_nav > li").click(function() {
		$("#plotly_nav > li").removeClass("active");
		var target = $(this).data("target");
		$(this).addClass("active");
		$("#plotly_nav").siblings().css("display", "none");
		$(target).css("display", "block");
	});

	$("select[name='patient']").change(function() {
		var patientId = $(this).val();
		loadPage(url + patientId + "/");
	});

	$("select[name='stream']").change(function() {
		var streamId = $(this).val();
		var patientId = $("select[name='stream'] > option[value='" + streamId + "']").data("patient-id");
		var patientUsername = $("select[name='patient'] > option[value='" + patientId + "']").data("patient-username");
		var streamName = $("select[name='stream'] > option[value='" + streamId + "']").data("stream-name");
		var streamShareKey = $("select[name='stream'] > option[value='" + streamId + "']").data("stream-share-key");
		var streamNumber = $("select[name='stream'] > option[value='" + streamId + "']").data("stream-number");
		if (streamId != null && streamId != "invalid") {
      var displayStatus = "block";
			loadPage(url + patientId + "/" + patientUsername + "/" + streamId + "/" + streamName + "/" + streamShareKey + "/" + streamNumber + "/" + displayStatus + "/");
		} else {
      $("#plotly_application").css("display", "none");
		}
	});

	// Pagination
	$("ul.pagination > li > a").click(function() {
    if(!$(this).hasClass("disabled")) {
      paginate(controller, method, $(this).data("pg"));
    }
  });
	
});
