<?php

function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
    return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

$url = file_get_contents_utf8('http://www.cinepolis.com.br/programacao/cinema.php?cc=31');
preg_match_all('/<div id=\"abapr1\"(.*)<div id=\"abapr2\"/s', $url, $conteudo);
$hue = $conteudo[0][0];
$hue = str_replace(' <div id="abapr2"', '', $hue);
$hue = str_replace(' id="abapr1" style="padding:0px; margin-top:-40px;"', '', $hue);
$hue = str_replace('<!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->', '', $hue);
$hue = str_replace('<!-- Posicione esta tag depois da última tag do botão +1. -->', '', $hue);
$exibir = preg_replace('/<tfoot>(.*)<\/tfoot>/s', '', $hue);

$retirar = array(' class="borda prog" style="margin: 35px 0 40px 0; border-top-left-radius:0px;"', ' width="100%" border="0" cellpadding="0" class="tabelahorarios" id="myTable"', ' align="left" class="black"', ' bgcolor="#990000"', '<td >&nbsp;</td>', '<th width="18">&nbsp;</th>');
$exibir = str_replace($retirar, '', $exibir);
$exibir = str_replace('<img src="../imagens/icos/14.jpg" width="26" height="26"  alt="14 anos" title="14 anos" />', '14 anos', $exibir);
$exibir = str_replace('<img src="../imagens/icos/10.jpg" width="26" height="26"  alt="10 anos" title="10 anos" />', '10 anos', $exibir);
$exibir = str_replace('<img src="../imagens/icos/l.jpg" width="26" height="26"  alt="Livre" title="Livre" />', 'Livre', $exibir);
$exibir = str_replace('<img src="../imagens/icos/12.jpg" width="26" height="26"  alt="12 anos" title="12 anos" />', '12 anos', $exibir);
$exibir = str_replace('<img src="../imagens/icos/16.jpg" width="26" height="26"  alt="16 anos" title="16 anos" />', '16 anos', $exibir);
$exibir = str_replace('<img src="../imagens/icos/18.jpg" width="26" height="26"  alt="18 anos" title="18 anos" />', '18 anos', $exibir);
$exibir = str_replace('<img src="http://www.cinepolis.com.br/imagens/trailer.png">', 'Trailer', $exibir);
$exibir = str_replace('<img src="http://www.cinepolis.com.br/imagens/comprar-ingresso.png">', 'Ingresso', $exibir);
$exibir = str_replace('<th width="79" align="center" valign="middle">sala</th>', '<td width="79" align="center" valign="middle">sala</td>', $exibir);
$exibir = str_replace('<th width="330" >filme</th>', '<td width="330" >filme</td>', $exibir);
$exibir = str_replace('<th width="56">class.</th>', '<td width="56">class.</td>', $exibir);
$exibir = str_replace('<th width="329">hor&aacute;rios</th>', '<td width="329">hor&aacute;rios</td>', $exibir);
$exibir = str_replace('<th width="60">&nbsp;</th>', '<td width="60">&nbsp;</td>', $exibir);
$exibir = str_replace('<a class="icomacroxe"></a>', 'MacroXE ', $exibir);
$exibir = str_replace('<a class="ico3d"></a>', '3D ', $exibir);
$exibir = str_replace('<a class="icovip"></a>', 'VIP ', $exibir);
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
        <?php echo ($exibir); ?>
    </body>
</html>