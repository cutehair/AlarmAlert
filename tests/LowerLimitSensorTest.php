<?php

  //include_once('../Sensor.php');
  include_once('../LimitsSensor.php');
  include_once('../LowerLimitSensor.php');

  class LowerLimitSensorTest extends \PHPUnit_Framework_TestCase
  {

    public function testThisWorks()
    {

    }


    private function mockSensor()
    {
      $sensor = new LowerLimitSensor('Basement', 'limit');

      $sensor->lowerLimit = 32;
      $sensor->currValue  = 45;
    }
  }