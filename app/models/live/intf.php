<?php

interface IParametersModel {
  public function findParameterList($screenName, $fieldName);
  public function findParameterValue($screenName, $fieldName, $parameterKey);
}

interface IPatientsModel {
 public function findLastAddedPatients($limit = HTS_RECORD_LIMIT,
                                       $offset = HTS_RECORD_OFFSET,
                                       $orderBy = HTS_ORDER_BY,
                                       $orderAs = HTS_ORDER_AS);
 public function findPatientByUsernameOrName($param = NULL,
                                             $orderBy = HTS_ORDER_BY,
                                             $orderAs = HTS_ORDER_AS);
}

interface IDevicesModel {
  public function findByPrimaryKeyWithFullPatientName($primaryKey = NULL);
  public function findAllWithFullPatientName();
  public function findLastAddedDevices($limit = HTS_RECORD_LIMIT,
                                       $offset = HTS_RECORD_OFFSET,
                                       $orderBy = HTS_ORDER_BY,
                                       $orderAs = HTS_ORDER_AS);
  public function findDeviceByName($param = NULL,
                                   $orderBy = HTS_ORDER_BY,
                                   $orderAs = HTS_ORDER_AS);
}

interface IPatientLogsModel {
  public function findListByPatientId($patientId);
}

interface IPatientLogSchedulesModel {
  public function findAllWithFullDeviceSocket($orderBy = 'DEVICE_HOST',
                                              $orderAs = 'ASC');
  public function findByPrimaryKeyWithFullDeviceSocket(&$param = NULL);
  public function findSchedulesByTypeOrDescription(&$param = NULL,
                                                   $orderBy = HTS_ORDER_BY,
                                                   $orderAs = HTS_ORDER_AS);
}

interface IStreamsModel {
  public function findAllWithFullPatientName($orderBy = 'PATIENT_NAME',
                                             $orderAs = 'ASC');
  public function findListByPatientId($patientId);
  public function findStreamsByNameOrTokenOrShareKey(&$param = NULL,
                                                     $orderBy = HTS_ORDER_BY,
                                                     $orderAs = HTS_ORDER_AS);
}
