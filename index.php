<?php

require_once 'config/config.php';

// ========================================

function microTimestamp() {
  $time_array = explode(" ", microtime());

  $milli      = $time_array[0];
  $timestamp  = $time_array[1];

  var_dump($timeTxt);
}
// ========================================

function testLog() {

  $log = new drk_logger("log1");

  $log->DB_init(DB_URL, DB_NAME, DB_LOGIN, DB_PWD);


  //$log->DB_createTable();
  $log->std("test");
  $log->warn("essai de warning");
  $log->error("essai d'erreur");
  $log->fatal("essai de fatal error");
}

// ========================================


echo "time";

var_dump(microtime());
microTimestamp();
//var_dump (microtime());

