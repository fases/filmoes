<?php

function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
    return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

$url = file_get_contents_utf8('http://www.multicinecinemas.com.br/20/imprimir.html');

$url = str_replace('<img src="http://www.multicinecinemas.com.br/img/icon/cL.png" />', 'Livre', $url);
$url = str_replace('<img src="http://www.multicinecinemas.com.br/img/icon/c10.png" />', '10', $url);
$url = str_replace('<img src="http://www.multicinecinemas.com.br/img/icon/c12.png" />', '12', $url);
$url = str_replace('<img src="http://www.multicinecinemas.com.br/img/icon/c14.png" />', '14', $url);
$url = str_replace('<img src="http://www.multicinecinemas.com.br/img/icon/c16.png" />', '16', $url);
$url = str_replace('<img src="http://www.multicinecinemas.com.br/img/icon/c18.png" />', '18', $url);
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
        <?php echo ($url); ?>
    </body>
</html>