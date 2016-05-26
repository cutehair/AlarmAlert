<?php

  include_once('../GetSensorData.php');

  class GetSensorDataTest extends \PHPUnit_Framework_TestCase
  {

    public function testGetSimpleSensorClosed()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkSimpleSensor('Front Door', 'Door', 'Closed');

      $this->assertFalse(false,$sensorData->alarm);
    }

    public function testGetSimpleSensorOpen()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkSimpleSensor('Front Door', 'Door', 'Open');

      $this->assertFalse(false,$sensorData->alarm);
    }

    public function testCheckUpperLimitPass()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkUpperLimit('Kitchen', 'Upper Limit', 72, 95);

      $this->assertFalse(false,$sensorData->alarm);
    }

    public function testCheckUpperLimitFail()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkUpperLimit('Kitchen', 'Upper Limit', 105, 95);

      $this->assertTrue(true,$sensorData->alarm);
    }
    public function testCheckLowerLimitPass()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkLowerLimit('Kitchen', 'Lower Limit', 78, 72);

      $this->assertFalse(false,$sensorData->alarm);
    }

    public function testCheckLowerLimitFail()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkLowerLimit('Kitchen', 'Lower Limit', 78, 95);

      $this->assertTrue(true,$sensorData->alarm);
    }

    public function testCheckRangePass()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkRange('Kitchen', 'Range', 72, 45, 95);

      $this->assertFalse(false,$sensorData->alarm);
    }

    public function testCheckRangeFail()
    {
      $getSensorData = new GetSensorData();

      $sensorData = $getSensorData->checkUpperLimit('Kitchen', 'Range', 105, 45, 95);

      $this->assertTrue(true,$sensorData->alarm);
    }
  }