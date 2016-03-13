<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function file_get_contents_utf8($fn) {
            $content = file_get_contents($fn);
            return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
        }

        include "simple_html_dom.php";
        $html = file_get_html("http://www.cinemark.com.br/programacao/bolso/natal/midway-mall-natal/22/681/20160312");
        $cont = 0;

        foreach ($html->find('div.titulo') as $element1) {
            $cont += 1;
        }

        echo "<table>";
        for ($i = 0; $i < $cont; $i++) {
            $titulo = $html->find('div.titulo', $i);
            $hora = $html->find('div.hora', $i);

            echo "<tr>\n";
            echo "<td> $titulo </td>\n";
            echo "<td> $hora </td>\n";
            echo "</tr>\n";
        }
        echo "</table>";
        ?>

    </body>
</html>