<?php

function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
    return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

$url = file_get_contents_utf8('http://www.moviecom.com.br/programacao.php?id=NAT');
$url = str_replace("<a title='Classificação: Livre'> <img src='images/mini0.png'   /></a>", "Livre", $url);
$url = str_replace("<a title='Classificação: 10 anos'> <img src='images/mini10.png'   /></a>", "10", $url);
$url = str_replace("<a title='Classificação: 12 anos'> <img src='images/mini12.png'   /></a>", "12", $url);
$url = str_replace("<a title='Classificação: 14 anos'> <img src='images/mini14.png'   /></a>", "14", $url);
$url = str_replace("<a title='Classificação: 16 anos'> <img src='images/mini16.png'   /></a>", "16", $url);
$url = str_replace("<a title='Classificação: 18 anos'> <img src='images/mini18.png'   /></a>", "18", $url);
$url = str_replace("<img src=\"3d.png\" align=\"right\" style=\"float:right;\">", "3D", $url);
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