<?php

  include_once('CreateSensorTypes.php');

  /**
   * Class CreateDemoData
   */
  class CreateDemoData
  {

    /**
     * @return array
     */
    public function createData()
    {
      $sensors = [];
      
      $sensorTypes = new CreateSensorTypes();

      $sensors[] = $sensorTypes->createDoor('Front Door', self::getRandDoorState());
      $sensors[] = $sensorTypes->createDoor('Garage Door', self::getRandDoorState());
      $sensors[] = $sensorTypes->createJustRight('Wine Cellar', self::getRandWine(), self::getRandLowerTemp(), self::getRandUpperTemp());
      $sensors[] = $sensorTypes->createSmoke('Upstairs Hall', self::getRandSmokeState());
      $sensors[] = $sensorTypes->createSmoke('Living Room', self::getRandSmokeState());
      $sensors[] = $sensorTypes->createSmoke('Shop', self::getRandSmokeState());
      $sensors[] = $sensorTypes->createTooHot('Kitchen', self::getRandUpperTemp());
      $sensors[] = $sensorTypes->createTooCold('Garage', self::getRandLowerTemp(), self::getRandLowerTemp());
      $sensors[] = $sensorTypes->createGlassBreak('Front Window', self::getRandHz());
      $sensors[] = $sensorTypes->createGlassBreak('Side Window', self::getRandHz());
      $sensors[] = $sensorTypes->createGlassBreak('Shop', self::getRandHz());

      return $sensors;
    }

    /**
     * @return string
     */
    public static function getRandDoorState()
    {
      $choose = rand(1,2);

      if ($choose ===1) {
        return 'Open';
      }

      return 'Closed';
    }

    /**
     * @return int
     */
    public static function getRandSmokeState()
    {

      return $choose = rand(1, 99);

    }

    /**
     * @return int
     */
    public static function getRandUpperTemp()
    {
      return $choose = rand(75,120);
    }

    /**
     * @return int
     */
    public static function getRandLowerTemp()
    {
      return $choose = rand(1, 50);
    }

    /**
     * @return int
     */
    public static function getRandHz()
    {
      return $choose = rand(200, 800);
    }

    /**
     * @return int
     */
    public static function getRandWine()
    {
      return $choose = rand(40, 70);
    }
  }