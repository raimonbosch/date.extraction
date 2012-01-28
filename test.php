<?php
  
  require_once "DateExtraction.php";

  //TODO: Use an array with expected results to assert all the outputs for this test
  ini_set("memory_limit","128M");
  $de = new DateExtraction();
  //$de->set_debug(true);
  $de->test();

?>
