<?php
include "simple_html_dom.php";
$html = file_get_html("http://www.moviecom.com.br/programacao.php?id=NAT");

$content = $html->find('table', 2);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>

        </style>
    </head>
    <body>
        <?php echo ($content); ?>
    </body>
</html>