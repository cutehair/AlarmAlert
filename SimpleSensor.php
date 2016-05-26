<?php

  include_once('Sensor.php');

  /**
   * Class SimpleSensor
   */
  class SimpleSensor extends Sensor
  {

    /**
     * @param $state
     */
    public function setState($state)
    {
      $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
      return $this->state;
    }

    /**
     * @return bool
     */
    public function testState()
    {
      if ($this->type == 'Door' and $this->state === 'Open') return $this->alarm = 'fail'; // this is hacky; the class is designed to be generic for simple binary state sensors

    }

  }