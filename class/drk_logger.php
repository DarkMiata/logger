<?php

require_once 'drk_loggerMsg.php';

/**
 * Description of drk_logger
 *
 * @author sam
 */
class drk_logger {

  private $name;

  private $DB;
  private $DB_url;
  private $DB_name;
  private $DB_login;
  private $DB_pwd;
  private $DB_state_init; // défini si les params de co DB sont fait
  private $DB_state_co;   // connexion à la DB réussi

  // ========================================

  private function get_DB_url() {
    if ($this->DB_state_init == FALSE) {
      trigger_error("get_DB_url ne peut être appelé:"
              . " db non intialisé", E_USER_WARNING);
    }
    else {
    return $this->DB_url;
    }
  }
  private function get_DB_name() {
    if ($this->DB_state_init == FALSE) {
      trigger_error("get_DB_name ne peut être appelé:"
              . " db non intialisé", E_USER_WARNING);
    }
    else {
    return $this->DB_name;
    }
  }
  private function get_DB_login() {
    if ($this->DB_state_init == FALSE) {
      trigger_error("get_DB_login ne peut être appelé:"
              . " db non intialisé", E_USER_WARNING);
    }
    else {
    return $this->DB_login;
    }
  }
  private function get_DB_pwd() {
    if ($this->DB_state_init == FALSE) {
      trigger_error("get_DB_pwd ne peut être appelé:"
              . " db non intialisé", E_USER_WARNING);
    }
    else {
    return $this->DB_pwd;
    }
  }

    // ========================================

  private function set_DB($DB) {
    $this->DB = $DB;
  }
  private function set_DB_url($DB_url) {
    $this->DB_url = $DB_url;
  }
  private function set_DB_name($DB_name) {
    $this->DB_name = $DB_name;
  }
  private function set_DB_login($DB_login) {
    $this->DB_login = $DB_login;
  }
  private function set_DB_pwd($DB_pwd) {
    $this->DB_pwd = $DB_pwd;
  }
  private function set_DB_state_init($DB_state_init) {
    $this->DB_state_init = $DB_state_init;
  }
  private function set_DB_state_co($DB_state_co) {
    $this->DB_state_co = $DB_state_co;
    return $this;
  }
  
        // ========================================

  function __construct($name) {
    $this->name = $name;
    $this->set_DB_state_init(FALSE);
    $this->set_DB_state_co(FALSE);
  }

  // ========================================
  // ========================================
  /**
   *   std - warn - error - fatal
  */
  // ------------------------

   public function std($text) {

    $msg = new drk_loggerMsg($text, "std");
  }
  // ------------------------
  public function warn($text) {

    if ($this->DB_state_init == false) {
      trigger_error("db non intialisé", E_USER_WARNING);
    }

    $msg = new drk_loggerMsg($text, "warn");
    echo ("warn - $text");
  }
  // ------------------------
  public function fatal($text) {

    $msg = new drk_loggerMsg($text, "fatal");
  }
  // ------------------------
  public function error($text) {

    $msg = new drk_loggerMsg($text, "error");
  }
  // ------------------------

  // ========================================
  // DB

  function DB_connexion() {
    $bdd_co = 'mysql:host='  . $this->get_DB_url()
            . ';dbname='     . $this->get_DB_name()
            . ';charset=utf8';

    try {
      $bdd = new PDO($bdd_co, $this->get_DB_login(), $this->get_DB_pwd());
      $this->set_DB($bdd);
      $this->DB_state_co = TRUE;
      
      return $bdd;
    }
    catch(Exception $e) {
      $erTxt = "** Erreur de connexion à la DB **<br>"
              . $e->getMessage() . "<br>"
              . "login: '"  . $this->get_DB_login() . "'<br>"
              . "mdp: '"    . $this->get_DB_pwd()   . "'<br>"
              ;
      
      echo($erTxt);
      $this->DB_state_co = FALSE;
    }

  }
  // ------------------------
/**
 * 
 * @param type $DB_url
 * @param type $DB_name
 * @param type $DB_login
 * @param type $DB_pwd
 */
  public function DB_init($DB_url, $DB_name, $DB_login, $DB_pwd) {
    $this->set_DB_url($DB_url);
    $this->set_DB_name($DB_name);
    $this->set_DB_login($DB_login);
    $this->set_DB_pwd($DB_pwd);
    $this->set_DB_state_init(TRUE);
  }
  // ------------------------

  public function DB_createTable($tableName) {
    $bdd = $this->DB_connexion();
    
    $reqSqlTxt =
            "CREATE TABLE drklog_" . $tableName
            . "("
            . " 'id' INT PRIMARY KEY NOT NULL,"
            . " 'message' TEXT NOT NULL,"
            . " 'type' CHAR(4) NOT NULL,"
            . " 'time' TIMESTAMP NOT NULL"
            . ");"
          ;

    try {    
      $reqSql = $bdd->query($reqSqlTxt);
      echo "req:";
      echo($bdd->errorInfo()[2]);
    }
    catch(Exception $e) {
      echo ("erreur sql: " . $e->getMessage() . "<br>");
    }

  }

  // ========================================
 
  }
