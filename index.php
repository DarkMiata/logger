<?php

require_once 'config/config.php';

$log = new drk_logger("log1");

$log->DB_init("55", "55", "897", "787");

$log->warn("test");
$log->warn("test2");

var_dump($log);

