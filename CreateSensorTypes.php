<?php

  include_once('SimpleSensor.php');
  include_once('LimitsSensor.php');

  /**
   * Class CreateSensorTypes
   */
  class CreateSensorTypes
  {

    /**
     * @param string $name
     * @param string $state
     *
     * @return SimpleSensor
     */
    public function createDoor($name, $state = 'Open')
    {
      $sensor = new SimpleSensor($name, 'Door');
      $sensor->setState($state);
      $sensor->testState();

      if ($sensor->alarm) $sensor->class = 'fail';

      return $sensor;
    }

    /**
     * @param string $name
     * @param int    $currValue
     * @param int    $upperLimit
     *
     * @return LimitsSensor
     */
    public function createGlassBreak($name, $currValue, $upperLimit = 750)
    {
      $sensor = new LimitsSensor($name, 'Glass Break');
      $sensor->setUpperLimit($upperLimit);
      $sensor->setCurrValue($currValue);

      $sensor->isValueBelowUpperLimit();

      if ($sensor->alarm === 'fail') {
        $sensor->state = 'Breakage';
        $sensor->class = 'fail';
      }


      $sensor->upperLimit = $upperLimit . 'hz';
      $sensor->currValue = $currValue . 'hz';

      return $sensor;
    }


    /**
     * @param string  $name
     * @param int     $currValue
     * @param int     $lowerLimit
     *
     * @return LimitsSensor
     */
    public function createSmoke($name, $currValue, $lowerLimit = 80)
    {
      $sensor = new LimitsSensor($name, 'Smoke Alarm');
      $sensor->setLowerLimit($lowerLimit);
      $sensor->setCurrValue($currValue);

      $sensor->isValueAboveLowLimit();

      if ($sensor->alarm === 'fail') {
        $sensor->state = 'Smoke';
      }

      $sensor->lowerLimit = $lowerLimit . '% Visibility';
      $sensor->currValue = $currValue . '% Visibility';

      return $sensor;
    }

    /**
     * @param string  $name
     * @param int     $currValue
     * @param int     $lowerLimit
     *
     * @return LimitsSensor
     */
    public function createTooCold($name, $currValue, $lowerLimit = 30)
    {
      $sensor = new LimitsSensor($name, 'Low Temp');
      $sensor->setLowerLimit($lowerLimit);
      $sensor->setCurrValue($currValue);

      $sensor->isValueAboveLowLimit();

      if ($sensor->alarm === 'fail') {
        $sensor->state = 'Below limit';
      }

      $sensor->lowerLimit = $lowerLimit . ' Degrees';
      $sensor->currValue = $currValue . ' Degrees';

      return $sensor;
    }

    /**
     * @param string  $name
     * @param int     $currValue
     * @param int     $upperLimit
     *
     * @return LimitsSensor
     */
    public function createTooHot($name, $currValue, $upperLimit = 85)
    {
      $sensor = new LimitsSensor($name, 'High Temp');
      $sensor->setUpperLimit($upperLimit);
      $sensor->setCurrValue($currValue);

      $sensor->isValueBelowUpperLimit();

      if ($sensor->alarm === 'fail') {
        $sensor->state = 'Above limit';
      }

      $sensor->upperLimit = $upperLimit . ' Degrees';
      $sensor->currValue = $currValue . ' Degrees';

      return $sensor;
    }

    /**
     * @param string  $name
     * @param int     $currValue
     * @param int     $lowerLimit
     * @param int     $upperLimit
     *
     * @return LimitsSensor
     */
    public function createJustRight($name, $currValue, $lowerLimit = 35, $upperLimit = 75)
    {
      $sensor = new LimitsSensor($name, 'Temp Range');
      $sensor->setLowerLimit($lowerLimit);
      $sensor->setUpperLimit($upperLimit);
      $sensor->setCurrValue($currValue);

      $sensor->isValueInRange();

      if ($sensor->alarm === 'fail') {
        $sensor->state = 'Out of Range';
      }

      $sensor->lowerLimit = $lowerLimit . ' Degrees';
      $sensor->upperLimit = $upperLimit . ' Degrees';
      $sensor->currValue = $currValue . ' Degrees';

      return $sensor;
    }
  }