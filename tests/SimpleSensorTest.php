<?php

  include_once('../Sensor.php');
  include_once('../SimpleSensor.php');

  class SimpleSensorTest extends \PHPUnit_Framework_TestCase
  {
    //
    public function testSensorClassExists()
    {
      $sensor = new SimpleSensor('Front Door', 'Door');

      $this->assertEquals('Front Door', $sensor->name);
      $this->assertNotTrue($sensor->alarm);
    }

    public function testSensorAlarmCanBeSetToTrue()
    {
      $sensor = new SimpleSensor('front door', 'door');

      $sensor->alarm = true;

      $this->assertTrue($sensor->alarm);
    }

    public function testSensorStateCanBeSetToValue()
    {
      $sensor = new SimpleSensor('front door', 'door');

      $sensor->state = 'open';

      $this->assertEquals('open',$sensor->state);
    }

  }
