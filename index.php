<?php

require_once 'class/drk_logger.php';

$log = new drk_logger("c:/text.txt");

$log->warn("test");
$log->warn("test2");

var_dump($log);
