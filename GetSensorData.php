<?php

  include_once('SimpleSensor.php');
  include_once('LimitsSensor.php');

  /**
   * Class GetSensorData
   */
  class GetSensorData
  {

    /**
     * @param string  $name
     * @param string  $type
     * @param string $state
     *
     * @return SimpleSensor
     */
    public function checkSimpleSensor($name, $type, $state)
    {
      $simpleSensor = new SimpleSensor($name, $type);

      $simpleSensor->setState($state);

      $simpleSensor->testState();

      return $simpleSensor;
    }

    /**
     * @param string  $name
     * @param string  $type
     * @param int     $currValue
     * @param int     $upperLimit
     *
     * @return LimitsSensor
     */
    public function checkUpperLimit($name, $type, $currValue, $upperLimit)
    {
      $limitsSensor = new LimitsSensor($name, $type);

      $limitsSensor->setUpperLimit($upperLimit);
      $limitsSensor->setCurrValue($currValue);

      $limitsSensor->isValueBelowUpperLimit();

      return $limitsSensor;
    }

    /**
     * @param string  $name
     * @param string  $type
     * @param int     $currValue
     * @param int     $lowerLimit
     *
     * @return LimitsSensor
     */
    public function checkLowerLimit($name, $type, $currValue, $lowerLimit)
    {
      $limitsSensor = new LimitsSensor($name, $type);

      $limitsSensor->setLowerLimit($lowerLimit);
      $limitsSensor->setCurrValue($currValue);

      $limitsSensor->isValueAboveLowLimit();

      return $limitsSensor;
    }

    /**
     * @param string  $name
     * @param string  $type
     * @param int     $currValue
     * @param int     $lowerLimit
     * @param int     $upperLimit
     *
     * @return LimitsSensor
     */
    public function checkRange($name, $type, $currValue, $lowerLimit, $upperLimit)
    {
      $limitsSensor = new LimitsSensor($name, $type);

      $limitsSensor->setUpperLimit($upperLimit);
      $limitsSensor->setLowerLimit($lowerLimit);
      $limitsSensor->setCurrValue($currValue);

      $limitsSensor->isValueInRange();

      return $limitsSensor;
    }
  }