<?php

require_once 'drk_loggerMsg.php';

/**
 * Description of drk_logger
 *
 * @author sam
 */
class drk_logger {
  
  private $file;
  private $msgs;
  // ========================================

  // ========================================

  // ========================================

  private function __construct($file) {
    $this->file = $file;
  }

  // ========================================
  // ========================================
  
  public function warn($text) {
  
    $msg = new drk_loggerMsg($text, "warn");
    
    $this->msgs[] = $msg;
  }
  
  // ========================================
  }
