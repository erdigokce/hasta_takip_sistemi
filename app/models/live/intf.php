<?php

interface IParametersModel {
  public function findParameterList($screenName, $fieldName);
  public function findParameterValue($screenName, $fieldName, $parameterKey);
}

interface IPatientsModel {

}

interface IDevicesModel {
  public function listDevicesInJson();
}

interface IPatientlogsModel {

}
