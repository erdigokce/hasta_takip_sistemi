<?php

/**
 * Dashboard English Langauge File
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

$lang['dashboard_title'] = "Doctor Portal";
$lang['dashboard_unauthorized_user'] = " is logged in and his/her warrants are restricted. An example page is being shown.";

//LEFT MENU
$lang['menu_left_item_1'] = "Dashboard";
$lang['menu_left_item_2'] = "Device Informations";
$lang['menu_left_item_3'] = "Patient Informations";
$lang['menu_left_item_4'] = "Patient Streams";
$lang['menu_left_item_5'] = "Logging Schedules";
$lang['menu_left_item_6'] = "Stream Configurations";

//BOARD
////BOARD LAST ACTIVE USERS
$lang['board_last_users'] = "Last Active Users";
$lang['board_last_active_userfullname'] = "User";
$lang['board_user_last_login_date'] = "Last Login Date";
////BOARD LAST ADDED DEVICES
$lang['board_last_added_devices'] = "Last Added Devices";
$lang['board_last_added_devicename'] = "Last Added Device Name";
$lang['board_device_add_date'] = "Addition Date";
////BOARD LAST ADDED PATIENTS
$lang['board_last_added_patients'] = "Last Added Patients";
$lang['board_last_added_patientfullname'] = "Last Added Patient";
$lang['board_patient_add_date'] = "Addition Date";

$lang['board_last_reviewed_patients'] = "Last Reviewed Patients";
$lang['board_upcoming_streams'] = "Upcoming Streams";

//DEVICE INFORMATIONS
$lang['device_infos_inquire'] = "Device To Inquire";
$lang['device_infos_inquire_button'] = "Search";
$lang['device_infos_inquire_placeholder'] = "Device No / Device Name / MAC / Host / Port";
$lang['device_infos_patient'] = "Holder Patient";
$lang['device_infos_device_name'] = "Device Name";
$lang['device_infos_device_desc'] = "Device Desription";
$lang['device_infos_device_mac'] = "Device MAC";
$lang['device_infos_device_host'] = "Device Host";
$lang['device_infos_device_port'] = "Device Port";

//PATIENT INFORMATIONS
$lang['patient_infos_inquire'] = "Patient To Inquire";
$lang['patient_infos_inquire_button'] = "Search";
$lang['patient_infos_inquire_placeholder'] = "Patient No / Patient Name / Username";
$lang['patient_infos_name'] = "Name";
$lang['patient_infos_surname'] = "Surname";
$lang['patient_infos_address'] = "Address";
$lang['patient_infos_phone1'] = "Phone (Primary)";
$lang['patient_infos_phone2'] = "Phone (Secondary)";
$lang['patient_infos_email'] = "e-mail";
$lang['patient_infos_username'] = "Username";
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
$lang['patient_logs_select_patient'] = "Select a patient to display...";
$lang['patient_logs_select_stream'] = "Select a stream to trace...";
$lang['patient_logs_select_stream_to_display'] = "Select a stream of a sensor to display the content.";

//STREAMS
$lang['stream_patient'] = "Streamer Patient";
$lang['stream_name'] = "Stream Name";
$lang['stream_token'] = "Token";
$lang['stream_sharekey'] = "Share Key";
$lang['stream_filenumber'] = "File Number";
