<?php

include_once('../Sensor.php');

class SensorTest extends \PHPUnit_Framework_TestCase
{
  //
  public function testSensorClassExists()
  {
    $sensor = new Sensor('Front Door', 'Door');

    $this->assertEquals('Front Door', $sensor->name);
    $this->assertNotTrue($sensor->alarm);
  }

  public function testSensorCanBeSetToTrue()
  {
    $sensor = new Sensor('front door', 'door');

    $sensor->alarm = true;

    $this->assertTrue($sensor->alarm);
  }

}