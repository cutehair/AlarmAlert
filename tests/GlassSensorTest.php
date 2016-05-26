<?php

  include_once('../GlassSensor.php');

  class GlassSensorTest extends \PHPUnit_Framework_TestCase
  {

    public function testSetUpperMhz()
    {
      $sensor = new GlassSensor('Front Window', false);
      $sensor->setUpperMhz(750.50);

      $this->assertEquals(750.50, $sensor->getUpperMhz());
    }

    public function testSetCurrMhz()
    {
      $sensor = new GlassSensor('Front Window', false);
      $sensor->setCurrMhz(275.37);

      $this->assertEquals(275.37, $sensor->getCurrMhz());
    }

    public function testNoBreak()
    {
      $sensor = new GlassSensor('Front Window', false);
      $sensor->setUpperMhz(750.50);
      $sensor->setCurrMhz(275.37);

      $sensor->testMhz();

      $this->assertEquals("No breakage", $sensor->state);
      $this->assertNotTrue($sensor->alarm);
    }

    public function testBreak()
    {
      $sensor = new GlassSensor('Front Window', false);
      $sensor->setUpperMhz(750.50);
      $sensor->setCurrMhz(797.30);

      $sensor->testMhz();

      $this->assertEquals("Glass break", $sensor->state);
      $this->assertTrue($sensor->alarm);
    }
  }