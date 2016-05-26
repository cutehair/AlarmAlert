<?php

  include_once('../Sensor.php');
  include_once('../LimitsSensor.php');

  class LimitsSensorTest extends \PHPUnit_Framework_TestCase
  {

    public function testCanSetAndGetLimits()
    {
      $sensor = new LimitsSensor('Wine Cellar', 'range');

      $sensor->setUpperLimit(95);
      $sensor->setLowerLimit(20);
      $sensor->setCurrValue(35);

      $this->assertEquals(95, $sensor->getUpperLimit());
      $this->assertEquals(20, $sensor->getLowerLimit());
      $this->assertEquals(35, $sensor->getCurrValue());
    }

    public function testInitialLimitsNull()
    {
      $sensor = new LimitsSensor('Wine Cellar', 'range');

      $this->assertNull($sensor->getUpperLimit());
      $this->assertNull($sensor->getLowerLimit());
    }

    public function testValueInRange()
    {
      $sensor = new LimitsSensor('Wine Cellar', 'range');

      $sensor->setUpperLimit(95);
      $sensor->setLowerLimit(20);
      $sensor->setCurrValue(35);

      $sensor->isValueInRange();

      $this->assertFalse($sensor->alarm);
    }

    public function testValueOutOfRange()
    {
      $sensor = new LimitsSensor('Wine Cellar', 'range');

      $sensor->setUpperLimit(95);
      $sensor->setLowerLimit(20);
      $sensor->setCurrValue(100);

      $sensor->isValueInRange();

      $this->assertTrue($sensor->alarm);
    }

    public function testValueAboveLowerLimit()
    {
      $sensor = new LimitsSensor('garage', 'lower limit');

      $sensor->setLowerLimit(20);
      $sensor->setCurrValue(35);

      $sensor->isValueAboveLowLimit();

      $this->assertFalse($sensor->alarm);
    }

    public function testValueBelowLowerLimit()
    {
      $sensor = new LimitsSensor('garage', 'lower limit');

      $sensor->setLowerLimit(20);
      $sensor->setCurrValue(12);

      $sensor->isValueAboveLowLimit();

      $this->assertTrue($sensor->alarm);
    }



    public function testValueBelowUpperLimit()
    {
      $sensor = new LimitsSensor('attic', 'upper limit');

      $sensor->setUpperLimit(120);
      $sensor->setCurrValue(75);

      $sensor->isValueBelowUpperLimit();

      $this->assertFalse($sensor->alarm);
    }

    public function testValueAboveUpperLimit()
    {
      $sensor = new LimitsSensor('kitchen', 'upper limit');

      $sensor->setUpperLimit(90);
      $sensor->setCurrValue(95);

      $sensor->isValueBelowUpperLimit();

      $this->assertTrue($sensor->alarm);
    }
  }