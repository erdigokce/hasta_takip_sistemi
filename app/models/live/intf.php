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

}

interface IPatientLogSchedulesModel {
  public function findAllWithFullDeviceSocket();
}
