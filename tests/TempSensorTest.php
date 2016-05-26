<?php

include_once('../TempSensor.php');

class TempSensorTest extends \PHPUnit_Framework_TestCase
{

  public function testTempNotNull()
  {
    $sensor = new TempSensor('Wine Cellar', false);
    $sensor->setUpperTemp(100);
    $sensor->setLowerTemp(32);

    $this->assertNotNull($sensor->upperTemp);
    $this->assertNotNull($sensor->lowerTemp);
  }

  public function testSetGetCurTemp()
  {
    $sensor = new TempSensor('Wine Cellar', false);
    $sensor->setCurrTemp(75);

    $this->assertEquals(75, $sensor->getCurrTemp());
  }

  public function testTempTooHigh(){
    $sensor = new TempSensor('Kitchen', false);
    $sensor->setUpperTemp(90);
    $sensor->setCurrTemp(95);

    $sensor->testTemp();

    $this->assertEquals('out of limit(s)', $sensor->state, $sensor->state);
    $this->assertTrue($sensor->alarm);
  }

  public function testTempTooLow()
  {
    $sensor = new TempSensor('Kitchen', false);
    $sensor->setLowerTemp(32);
    $sensor->setCurrTemp(12);

    $sensor->testTemp();

    $this->assertEquals('out of limit(s)', $sensor->state, $sensor->state);
    $this->assertTrue($sensor->alarm);
  }

  public function testJustRightRange()
  {
    $sensor = new TempSensor('Wine Celler', false);
    $sensor->setLowerTemp(35);
    $sensor->setUpperTemp(50);
    $sensor->setCurrTemp(47);

    $sensor->testTemp();

    $this->assertEquals('Within Range', $sensor->state);
    $this->assertNotTrue($sensor->alarm);
  }

  public function testJustRightHigh()
  {
    $sensor = new TempSensor('Wine Celler', false);
    $sensor->setUpperTemp(100);
    $sensor->setCurrTemp(95);

    $sensor->testTemp();

    $this->assertEquals('Below upper limit', $sensor->state);
    $this->assertNotTrue($sensor->alarm);
  }

  public function testJustRightLow()
  {
    $sensor = new TempSensor('Wine Celler', false);
    $sensor->setLowerTemp(35);
    $sensor->setCurrTemp(47);

    $sensor->testTemp();

    $this->assertEquals('Above lower limit', $sensor->state);
    $this->assertNotTrue($sensor->alarm);
  }

}