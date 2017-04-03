<?php
require_once 'config/config.php';

// ========================================

function DB_connexion() {
  $bdd_co = 'mysql:host=' . DB_URL
          . ';dbname='    . DB_NAME
          . ';charset=utf8';

  $bdd = new PDO($bdd_co, DB_LOGIN, DB_PWD);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);

  echo("connection BDD<br>");
  var_dump($bdd);

  return $bdd;
}
