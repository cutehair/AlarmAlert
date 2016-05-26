<?php

  include_once('../CreateDemoData.php');

  class CreateDemoDataTest extends \PHPUnit_Framework_TestCase
  {

    public function testCreateDoor()
    {
      $demoData = new CreateDemoData();

      $sensor = $demoData->createDoor('Front Door', 'Closed');

      $this->assertFalse($sensor->alarm);
    }

    public function testCreateGlassBreak()
    {
      $demoData = new CreateDemoData();

      $sensor = $demoData->createGlassBreak('Front Door', 750, 450);

      $this->assertFalse($sensor->alarm);
      $this->assertEquals('750mhz', $sensor->upperLimit);
    }
  }