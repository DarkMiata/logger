<?php

require_once 'config/config.php';

// ------------------------
// code créate
/*
 * CREATE TABLE `drklog_1` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`message` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`type` CHAR(4) NOT NULL COLLATE 'utf8_unicode_ci',
	`time` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;
*/
// ========================================

function testLog() {

  $log = new drk_logger("1");

  
  
  $log->DB_init(DB_URL, DB_NAME, DB_LOGIN, DB_PWD);
  //$log->DB_createTable();
  $log->std("test");
  $log->warn("essai de warning");
  $log->error("essai d'erreur");
  $log->fatal("essai de fatal error");
}
// ========================================

testLog();


