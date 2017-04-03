<!DOCTYPE html>

<?php
require_once 'config/config.php';
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>page de loging</title>
  </head>
  <body>
    <?php
    echo ("<h1>logging</h1><br>");

        $log = new drk_logger("1");
    $log->DB_init(DB_URL, DB_NAME, DB_LOGIN, DB_PWD);
    $result = $log->DB_read(0, 5);

    var_dump($result);

    ?>
  </body>
</html>
