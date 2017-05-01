$(document).ready(function() {
	$("#digrid").bs_grid({

		ajaxFetchDataURL: "dashboard/listDevicesInJson",
		pageNum: 1,
		rowsPerPage: 10,
		maxRowsPerPage: 100,
		row_primary_key: "ID",
		rowSelectionMode: "single", // "multiple", "single", false
		selected_ids: [],

		/**
		 * MANDATORY PROPERTIES: field
		 * UNIQUE PROPERTIES: field
		 * {field: "customer_id", header: "Code", visible: "no", is_function: "no", "headerClass": "th_code hidden-xs", "dataClass": "td_code hidden-xs"},
		 */
		columns: [
			{field: "ID", header: "Code", visible: "no"},
      {field: "PATIENT_ID", header: "Kullanan Hasta"},
      {field: "DEVICE_NAME", header: "Cihaz Adı"},
      {field: "DEVICE_DESCRIPTION", header: "Cihaz Açıklama", "sortable": "no"},
      {field: "DEVICE_HOST", header: "Cihaz Anamakine"},
      {field: "DEVICE_POST", header: "Cihaz Port"}
		],

		/**
		 * MANDATORY PROPERTIES: field, order
		 * UNIQUE PROPERTIES: field
		 * order is one of "ascending", "descending", "none"
		 * {sortingName: "Code", field: "customer_id", order: "none"},
		 */
		sorting: [
			{sortingName: "Code", field: "ID", order: "none"},
      {sortingName: "Kullanan Hasta", field: "DEVICE_NAME", order: "ascending"},
      {sortingName: "Cihaz Adı", field: "DEVICE_DESCRIPTION", order: "ascending"},
      {sortingName: "Cihaz Anamakine", field: "DEVICE_HOST", order: "none"},
      {sortingName: "Cihaz Port", field: "DEVICE_POST", order: "none"}
		],

		/**
		 * See bs_pagination plugin documentation
		 */
		paginationOptions: {
			containerClass: "well pagination-container",
			visiblePageLinks: 5,
			showGoToPage: true,
			showRowsPerPage: true,
			showRowsInfo: true,
			showRowsDefaultInfo: true,
			disableTextSelectionInNavPane: true
		}, // "currentPage", "rowsPerPage", "maxRowsPerPage", "totalPages", "totalRows", "bootstrap_version", "onChangePage" will be ignored

		/**
		 * See jui_filter_rules plugin documentation
		 */
		filterOptions: {
			filters: [],
			filter_rules: []
		}, // "bootstrap_version", "onSetRules", "onValidationError" will be ignored

		useFilters: true,
		showRowNumbers: false,
		showSortingIndicator: true,
		useSortableLists: true,
		customHTMLelementID1: "",
		customHTMLelementID2: "",

		/* STYLES ----------------------------------------------------*/
		bootstrap_version: "3",

		// bs 3
		containerClass: "grid_container",
		noResultsClass: "alert alert-warning no-records-found",

		toolsClass: "tools",

		columnsListLaunchButtonClass: "btn btn-default dropdown-toggle",
		columnsListLaunchButtonIconClass: "glyphicon glyphicon-th",
		columnsListClass: "dropdown-menu dropdown-menu-right",
		columnsListLabelClass: "columns-label",
		columnsListCheckClass: "col-checkbox",
		columnsListDividerClass: "divider",
		columnsListDefaultButtonClass: "btn btn-primary btn-xs btn-block",

		sortingListLaunchButtonIconClass: "glyphicon glyphicon-sort",
		sortingLabelCheckboxClass: "radio-inline",
		sortingNameClass: "sorting-name",

		selectButtonIconClass: "glyphicon  glyphicon-check",
		selectedRowsClass: "selected-rows",

		filterToggleButtonIconClass: "glyphicon glyphicon-filter",
		filterToggleActiveClass: "btn-info",

		sortingIndicatorAscClass: "glyphicon glyphicon-chevron-up text-muted",
		sortingIndicatorDescClass: "glyphicon glyphicon-chevron-down text-muted",

		dataTableContainerClass: "table-responsive",
		dataTableClass: "table table-bordered table-hover",
		commonThClass: "th-common",
		selectedTrClass: "warning",

		filterContainerClass: "well filters-container",
		filterToolsClass: "",
		filterApplyBtnClass: "btn btn-primary btn-sm filters-button",
		filterResetBtnClass: "btn btn-default btn-sm filters-button",

		// prefixes
		tools_id_prefix: "tools_",
		columns_list_id_prefix: "columns_list_",
		sorting_list_id_prefix: "sorting_list_",
		sorting_radio_name_prefix: "sort_radio_",
		selected_rows_id_prefix: "selected_rows_",
		selection_list_id_prefix: "selection_list_",
		filter_toggle_id_prefix: "filter_toggle_",

		table_container_id_prefix: "tbl_container_",
		table_id_prefix: "tbl_",

		no_results_id_prefix: "no_res_",

		custom_html1_id_prefix: "custom1_",
		custom_html2_id_prefix: "custom2_",

		pagination_id_prefix: "pag_",
		filter_container_id_prefix: "flt_container_",
		filter_rules_id_prefix: "flt_rules_",
		filter_tools_id_prefix: "flt_tools_",

		// misc
		debug_mode: "no",

		// events
		onCellClick: function(event, data) {
      console.log('Click on cell: col ' + data.col + ' row ' + data.row + '.');
    },
		onRowClick: function(event, data) {
      console.log('Row with ID ' + data.row_id + ' ' + data.row_status + '.');
    },
		onDatagridError: function(event, data) {
      alert(data["err_description"] + ' (' + data["err_code"] + ')');
    },
		onDebug: function(event, data) {
      //code
    },
		onDisplay: function(event, data) {
      //code
    }
	});
});
