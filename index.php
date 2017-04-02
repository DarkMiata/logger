<?php

require_once 'config/config.php';

$log = new drk_logger("log1");

$log->DB_init(DB_URL, DB_NAME, DB_LOGIN, DB_PWD);

$log->warn("test");
$log->warn("test2");

var_dump($log);

//$log->DB_connexion();

$log->DB_createTable("1");