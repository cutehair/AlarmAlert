<?php
  require('./vendor/smarty/smarty/libs/Smarty.class.php');
  include_once('CreateDemoData.php');
/*
 * index.php
 *
 * retrieves data
 * sets smarty variables
 * sets template variables
 * displays template
 */

// create object
  $smarty = new Smarty;

// configure
  $smarty->setCompileDir('/Users/ellenrsullivan/Sites/AlarmAlert/smarty/templates_c');
// get data
  $getSensors = new CreateDemoData();

  $sensors = $getSensors->createData();

// assign values to template variables
  $smarty->assign('sensors', $sensors);

  $smarty->assign('dateTime', date('F Y h:i:s A',time()));
// display template
  $smarty->display('index.tpl');