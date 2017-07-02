<?php

interface IParametersModel {
  public function findParameterList($screenName, $fieldName);
  public function findParameterValue($screenName, $fieldName, $parameterKey);
}

interface IPatientsModel {
 public function findLastAddedPatients($limit = '5', $offset = '0', $orderBy = 'DATE_CREATE', $orderAs = 'DESC');
 public function findPatientByUsernameOrName($param = null, $limit = '5', $offset = '0', $orderBy = 'DATE_CREATE', $orderAs = 'DESC');
}

interface IDevicesModel {
  public function findByPrimaryKeyWithFullPatientName($primaryKey = null);
  public function findAllWithFullPatientName();
  public function findLastAddedDevices($limit = '5', $offset = '0', $orderBy = 'DATE_CREATE', $orderAs = 'DESC');
  public function findDeviceByName($param = null, $limit = '5', $offset = '0', $orderBy = 'DATE_CREATE', $orderAs = 'DESC');
}

interface IPatientLogsModel {
  public function findListByPatientId($patientId);
}

interface IPatientLogSchedulesModel {
  public function findAllWithFullDeviceSocket();
}

interface IStreamsModel {
  public function findAllWithFullPatientName();
  public function findListByPatientId($patientId);
}
