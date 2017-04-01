<?php

/**
 * Description of drk_loggerMsg
 *
 * @author global
 */
class drk_loggerMsg {

  private $msg;
  private $timestamp;
  private $type;
  private $msgHtml;
  // ========================================

  // ========================================

  // ========================================

  function __construct($msg, $type) {
    $this->msg        = $msg;
    $this->timestamp  = time();
    $this->type       = $type;
  }
  // ========================================

  private function msgToHtml() {

  }
  // ------------------------

  private function writeLogFile() {

  }
  // ------------------------

  private function msgToDB() {

  }
  // ------------------------

  private function DBToMsg($pageIndex) {

  }
  // ------------------------



  // ========================================
}
