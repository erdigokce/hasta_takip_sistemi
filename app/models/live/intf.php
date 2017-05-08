<?php

interface IParametersModel {
  public function findParameterList($screenName, $fieldName);
  public function findParameterValue($screenName, $fieldName, $parameterKey);
}

interface IPatientsModel {

}

interface IDevicesModel {
  public function findAllWithFullPatientName();
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
