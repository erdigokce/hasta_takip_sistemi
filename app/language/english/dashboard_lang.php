<?php

/**
 * Dashboard English Langauge File
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

$lang['dashboard_title'] = "Doctor Portal";
$lang['dashboard_unauthorized_user'] = " is logged in and its warrants are restricted. An example page is being shown.";

//LEFT MENU
$lang['menu_left_item_1'] = "Dashboard";
$lang['menu_left_item_2'] = "Device Informations";
$lang['menu_left_item_3'] = "Patient Informations";
$lang['menu_left_item_4'] = "Patient Streams";
$lang['menu_left_item_5'] = "Logging Schedules";
$lang['menu_left_item_6'] = "Stream Configurations";

//DEVICE INFORMATIONS
$lang['device_infos_patient'] = "Holder Patient";
$lang['device_infos_device_name'] = "Device Name";
$lang['device_infos_device_desc'] = "Device Desription";
$lang['device_infos_device_mac'] = "Device MAC";
$lang['device_infos_device_host'] = "Device Host";
$lang['device_infos_device_port'] = "Device Port";

//PATIENT INFORMATIONS
$lang['patient_infos_name'] = "Name";
$lang['patient_infos_surname'] = "Surname";
$lang['patient_infos_address'] = "Address";
$lang['patient_infos_phone1'] = "Phone (Primary)";
$lang['patient_infos_phone2'] = "Phone (Secondary)";
$lang['patient_infos_email'] = "e-mail";
$lang['patient_infos_apikey'] = "API Key";

//LOG SCHEDULES
$lang['schedule_device_socket'] = "Device Socket";
$lang['schedule_pattern'] = "Pattern";
$lang['schedule_type'] = "Type";
$lang['schedule_duration'] = "Duration (Min.)";
$lang['schedule_description'] = "Description";

//PATIENT LOGS
$lang['patient_logs_last_activity'] = "Last Activity";
$lang['patient_logs_live'] = "Live";
$lang['patient_logs_history'] = "History";
$lang['patient_logs_select_patient'] = "Please select a patient to display...";
$lang['patient_logs_select_stream'] = "Please select a stream to trace...";

//STREAMS
$lang['stream_patient'] = "Streamer Patient";
$lang['stream_token'] = "Token";
