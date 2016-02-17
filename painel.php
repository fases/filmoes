<?php
session_start();
require_once "config.php";

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['permissao']) == true)) {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    </body>
</html>