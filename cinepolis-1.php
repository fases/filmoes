<?php
include "simple_html_dom.php";

$html = file_get_html("http://www.cinepolis.com.br/programacao/imprimir.php?cc=33");

$content = $html->find('table', 1);

$content = preg_replace('/<tr style=\"border-bottom:1px dashed #000000;\"(.*)<\/tr>/s', '', $content);
$content = str_replace('<td>Liv.</td>', '<td>L</td>', $content);
$content = str_replace('<td>10a.</td>', '<td>10</td>', $content);
$content = str_replace('<td>12a.</td>', '<td>12</td>', $content);
$content = str_replace('<td>14a.</td>', '<td>14</td>', $content);
$content = str_replace('<td>16a.</td>', '<td>16</td>', $content);
$content = str_replace('<td>18a.</td>', '<td>18</td>', $content);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php echo ($content); ?>
    </body>
</html>