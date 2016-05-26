<?php

  include_once('Sensor.php');

  class LimitsSensor extends Sensor
  {
    
    /*public $upperLimit;
    public $lowerLimit;
    public $currValue;*/

    public function __construct($name, $type)
    {
      parent::__construct($name, $type);
      $this->currValue  = '';
      $this->upperLimit = null;
      $this->lowerLimit = null;
    }
    
    public function setUpperLimit($upperLimit)
    {
      $this->upperLimit = $upperLimit;
    }
    
    public function getUpperLimit()
    {
      return $this->upperLimit;
    }

    public function setLowerLimit($lowerLimit)
    {
      $this->lowerLimit = $lowerLimit;
    }

    public function getLowerLimit()
    {
      return $this->lowerLimit;
    }

    public function setCurrValue($currValue)
    {
      $this->currValue = $currValue;
    }

    public function getCurrValue()
    {
      return $this->currValue;
    }

    public function isValueInRange()
    {
      if (($this->currValue < $this->upperLimit) && ($this->currValue > $this->lowerLimit))
        return;

      $this->alarm = 'fail';
    }

    public function isValueAboveLowLimit()
    {
      if ($this->currValue > $this->lowerLimit)
        return;

      $this->alarm = 'fail';
    }

    public function isValueBelowUpperLimit()
    {
      if ($this->currValue < $this->upperLimit)
        return;

      $this->alarm = 'fail';
    }
  }