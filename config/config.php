<?php

// ========================================
// Configuration de la connexion à la base de données

define ("DB_NAME", "vitrine");
define ("DB_URL", "localhost");

// !!! à redéfinir en version final !!
define ("DB_LOGIN"  , "root");
define ("DB_PWD"    , "");

// ========================================
// Routage des includes

define ("PATH_INC"     , "inc/");
define ("PATH_DB"      , "models/");
define ("PATH_MODELS"  , "models/");
define ("PATH_VIEW"    , "view/");
define ("PATH_CONTROL" , "controllers/");
define ("PATH_IMG"     , "img/");
define ("PATH_CLASS"   , "class/");
define ("PATH_LIB"     , "lib/");

// ========================================

require_once (PATH_MODELS . "DB.php");

// ========================================
/**
require_once (PATH_CLASS  . "PageSite.php");
require_once (PATH_CLASS  . "Article.php");
require_once (PATH_CLASS  . "WebSite.php");
**/

require_once (PATH_CLASS . "drk_logger.php");