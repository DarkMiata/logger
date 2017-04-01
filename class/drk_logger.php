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
  private $DB_init_state;

  // ========================================

  private function get_DB_url() {
    return $this->DB_url;
  }
  private function get_DB_name() {
    return $this->DB_name;
  }
  private function get_DB_login() {
    return $this->DB_login;
  }
  private function get_DN_pwd() {
    return $this->DB_pwd;
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
  function set_DB_init_state($DB_init_state) {
    $this->DB_init_state = $DB_init_state;
  }

        // ========================================

  function __construct($name) {
    $this->name = $name;
    $this->set_DB_init_state(FALSE);
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

    if ($this->DB_init_state == false) {
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

  private function DB_connexion() {
    $bdd_co = 'mysql:host='  . $this->DB_url()
            . ';dbname='     . $this->DB_name()
            . ';charset=utf8';

    $bdd = new PDO($bdd_co, $this->DB_login(), $this->DB_pwd());

    $this->set_DB($bdd);
  }
  // ------------------------

  public function DB_init($DB_url, $DB_name, $DB_login, $DB_pwd) {
    $this->set_DB_url($DB_url);
    $this->set_DB_name($DB_name);
    $this->set_DB_login($DB_login);
    $this->set_DB_pwd($DB_pwd);
    $this->set_DB_init_state(TRUE);
  }

  // ========================================
  }
