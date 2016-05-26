<?php

  /**
   * Class Sensor
   */
  class Sensor
  {

    // create class vars that will be inherited by children
    public $name;
    public $type;
    public $alarm;
    public $state;
    public $upperLimit;
    public $lowerLimit;
    public $currValue;

    // construct, setting some class vars to default values
    public function __construct($name, $type)
    {
      $this->name   = $name;
      $this->type   = $type;
      $this->alarm  = 'pass';
    }

  }