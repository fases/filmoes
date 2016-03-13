<?php
session_start();
include "config.php";
include "simple_html_dom.php";

$url = "http://localhost/filmoes/cinepolis-1.php";
$html = file_get_html($url);

$content = $html->find('table', 0);
$contTR = 0;
$contTD = 0;

$url1 = "http://localhost/filmoes/cinepolis-2.php";
$html1 = file_get_html($url1);

$content1 = $html1->find('table', 0);
$contTR1 = 0;
$contTD1 = 0;

$url2 = "http://localhost/filmoes/multicine.php";
$html2 = file_get_html($url2);

$content2 = $html2->find('table', 0);
$contTR2 = 0;
$contTD2 = 0;

$url3 = "http://localhost/filmoes/cinemark.php";
$html3 = file_get_html($url3);

$content3 = $html3->find('table', 0);
$contTR3 = 0;
$contTD3 = 0;

$selecProp1 = mysql_fetch_array(mysql_query("SELECT img1, link FROM propaganda WHERE ativo = '0' and loc='1'"));
$img1Prop1 = $selecProp1['img1'];
$linkProp1 = $selecProp1['link'];

$selecProp2 = mysql_fetch_array(mysql_query("SELECT img1, link FROM propaganda WHERE ativo = '0' and loc='2'"));
$img1Prop2 = $selecProp2['img1'];
$linkProp2 = $selecProp2['link'];

$selecProp3 = mysql_fetch_array(mysql_query("SELECT img1, link FROM propaganda WHERE ativo = '0' and loc='3'"));
$img1Prop3 = $selecProp3['img1'];
$linkProp3 = $selecProp3['link'];

$selecProp4 = mysql_fetch_array(mysql_query("SELECT img1, link FROM propaganda WHERE ativo = '0' and loc='4'"));
$img1Prop4 = $selecProp4['img1'];
$linkProp4 = $selecProp4['link'];

$selecProp5 = mysql_fetch_array(mysql_query("SELECT img1, img2, link FROM propaganda WHERE ativo = '0' and loc='5'"));
$img1Prop5 = $selecProp5['img1'];
$img2Prop5 = $selecProp5['img2'];
$linkProp5 = $selecProp5['link'];

if(empty($img1Prop1)){
    $img1Prop1 = 'off11.gif';
}
if(empty($img1Prop2)){
    $img1Prop2 = 'off12.gif';
}
if(empty($img1Prop3)){
    $img1Prop3 = 'off11.gif';
}
if(empty($img1Prop4)){
    $img1Prop4 = 'off12.gif';
}
if(empty($img1Prop5)){
    $img1Prop5 = 'off11.gif';
    $img2Prop5 = 'off21.gif';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link REL="SHORTCUT ICON" href="imagens/icon.ico" type="image/x-icon">

        <title>Filmões - Rio Grande do Norte</title>
        <link rel="stylesheet" href="css/freestyle.css" type="text/css">
        <script type='text/javascript' src='js/jquery-1.9.1.js'></script>
        <script type='text/javascript' src='js/jquery.cycle2.js'></script>
        <script type='text/javascript' src='js/jquery.stellar.js'></script>
        <script type='text/javascript' src='js/padrao.js'></script>
        <style>
            #prop1{
                background-image: <?php echo "url(\"imagens/propaganda/$img1Prop1\")" ?>;
            }
            #prop2{
                background-image: <?php echo "url(\"imagens/propaganda/$img1Prop2\")" ?>;
            }
            #prop3{
                background-image: <?php echo "url(\"imagens/propaganda/$img1Prop3\")" ?>;
            }
            #prop4{
                background-image: <?php echo "url(\"imagens/propaganda/$img1Prop4\")" ?>;
            }
            @media (max-width: 991px){
                #prop5{
                    background-image: <?php echo "url(\"imagens/propaganda/$img1Prop5\")" ?>;
                }
            }
            @media (min-width: 992px){
                #prop5{
                    background-image: <?php echo "url(\"imagens/propaganda/$img2Prop5\")" ?>;
                }
            }
        </style>
    </head>
    <body>
        <div class="modal">
            <div id="loginPainel">
                <div class="fechar">X</div>
                <h2>Login - Área Restrita</h2>
                <div id="login">
                    <form method="post" action="?go=login">
                        <table id="tableP">
                            <tr>
                                <td> <p>Usuário:</p> </td>
                                <td> <input type="text" name="usuario" id="usuario" class="txt" maxlength="50" required/> </td>
                            </tr>
                            <tr>
                                <td> <p>&nbsp;&nbsp;Senha:</p> </td>
                                <td> <input type="password" name="senha" id="senha" class="txt" maxlength="50" required/> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; </td>
                                <td> <input type="submit" value="ENTRAR" class="btn" id="btnEntrar"> </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div id="cadastro">
                <div class="fechar">X</div>
                <h2>Cadastro</h2>
                <div id="cadCli">
                    <form method="post" action="?go=cadastro" onsubmit="return validacao();">
                        <div id="divTipoCad">
                            <input type="radio" name="tipoCad" id="tipoCad1" value="1" checked="checked" onclick="emails();" /> Receber e-mails com novidades
                            <input style="margin-left: 10px;" type="radio" name="tipoCad" id="tipoCad2" value="2" onclick="propaganda();" /> Fazer propaganda no site <br />
                        </div>
                        <div id="divCad">
                            <input type="radio" name="pfj" id="pfjCNPJ" value="1" checked="checked" onclick="CNPJ();" /> Pessoa Jurídica
                            <input style="margin-left: 10px;" type="radio" name="pfj" id="pfjCPF" value="2" onclick="CPF();" /> Pessoa Física <br />
                        </div>
                        <table id="tableP">
                            <tr>
                                <td> <p>Nome:</p> </td>
                                <td> <input type="text" name="nomeCad" id="nomeCad" class="txt2" maxlength="100" required/> </td>
                            </tr>
                            <tr id="trRazao" style="display: none;">
                                <td> <p>Razão Social:</p> </td>
                                <td> <input type="text" name="razaoCad" id="razaoCad" class="txt2" maxlength="100"/> </td>
                            </tr>
                            <tr id="trCad" style="display: none;">
                                <td> <p id="nomeTipoCad">CNPJ:</p> </td>
                                <td> <input type="text" name="cadCad" id="cadCad" class="txt2" maxlength="14"/> </td>
                            </tr>
                            <tr>
                                <td> <p>E-mail:</p> </td>
                                <td> <input type="email" name="emailCad" id="emailCad" class="txt2" maxlength="150" required/> </td>
                            </tr>
                            <tr>
                                <td> <p>Usuário:</p> </td>
                                <td> <input type="text" name="usuarioCad" id="usuarioCad" class="txt2" maxlength="50" required/> </td>
                            </tr>
                            <tr>
                                <td> <p>Senha:</p> </td>
                                <td> <input type="password" name="senhaCad1" id="senhaCad1" class="txt2" maxlength="50" required/> </td>
                            </tr>
                            <tr>
                                <td> <p>Confirmar senha:</p> </td>
                                <td> <input type="password" name="senhaCad2" id="senhaCad2" class="txt2" maxlength="50" required/> </td>
                            </tr>
                            <tr>
                                <td> &nbsp; </td>
                                <td> <input type="submit" value="CADASTRAR" class="btn" id="btnCadastrar"> </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div id="topBg" data-stellar-background-ratio="0.2">
            <div id="faixa">
                <div><span><a href="#" class="scroll">Alterar Estado</a> • <a href="#" id="acessarPainel">Login</a></span></div>
            </div>
            <div id="top">
                <div id="topL">
                    <a href="#" class="scroll">
                        <img src="imagens/logo2.png" width="300px"  alt="Filmões"/>
                    </a>
                </div>

                <div id="topR">
                    <p>Rio Grande do Norte</p>
                    <ul>
                        <li><a href="#mid" class="scroll">PROGRAMAÇÃO</a></li>
                        <li><a href="contato.php">CONTATO</a></li>
                        <li><a style="cursor: default;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        <li><a href="#" id="btnCadastro" style="color: #ff6200;">CADASTRE-SE</a></li>
                    </ul>
                </div>

                <div id="boxBg">
                    <div id="box">
                        <div id="slide" class="cycle-slideshow auto"
                             data-cycle-tile-vertical=false
                             data-cycle-tile-count=10
                             data-cycle-speed=1000
                             data-cycle-timeout=3000
                             data-cycle-loader=true
                             data-cycle-prev=".prev"
                             data-cycle-next=".next"
                             >
                            <div class="prev"></div>
                            <div class="next"></div>
                            <img src="imagens/slide/1.jpg">
                            <img src="imagens/slide/2.jpg">
                            <img src="imagens/slide/3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="midBg" data-stellar-background-ratio="0.05">
            <div id="mid">

                <h1 class="titleProg">Programação</h1>
                <ul>
                    <li><a href="#cinemark" class="scroll"><div>Cinemark<br/>Midway Mall</div></a></li>
                    <li><a href="#moviecom" class="scroll"><div style="margin-left: 2px;">Moviecom<br/>Praia Shopping</div></a></li>
                    <li><a href="#natalshopping" class="scroll"><div style="margin-left: 2px;">Cinépolis<br/>Natal Shopping</div></a></li>
                    <li><a href="#norteshopping" class="scroll"><div style="margin-left: 2px;">Cinépolis<br/>Norte Shopping</div></a></li>
                    <li><a href="#multicine" class="scroll"><div style="margin-left: 2px;">Multicine<br/>Partage Mossoró</div></a></li>
                </ul>

                <div class="cinema" id="cinemark">
                    <div class="prog">
                        <h2 style="padding: 0px 0px 5px 30px;">//Cinemark - Midway Mall</h2>
                        <?php
                        foreach ($content3->find('tr') as $elemento) {
                            $filme = '';
                            $icos = '';
                            $idade = '';
                            $sala = '';
                            $hora = '';
                            $contTR3 += 1;
                            foreach ($elemento->find('td') as $a) {
                                $contTD3 += 1;
                                $hue = $a->plaintext;

                                if ($contTD3 == '1') {
                                    $filme = $hue;
                                }
                                if ($contTD3 == '2') {
                                    $hora = $hue;

                                    if (strpos("[" . $filme . "]", " - Livre")) {
                                        $icos .= "<font class=\"livre\">L</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " - 10 Anos")) {
                                        $icos .= "<font class=\"anos10\">10</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " - 12 Anos")) {
                                        $icos .= "<font class=\"anos12\">12</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " - 14 Anos")) {
                                        $icos .= "<font class=\"anos14\">14</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " - 16 Anos")) {
                                        $icos .= "<font class=\"anos16\">16</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " - 18 Anos")) {
                                        $icos .= "<font class=\"anos18\">18</font>";
                                    }

                                    if (strpos("[" . $filme . "]", "(dublado)")) {
                                        $icos .= "<font class=\"dublado\">DUB</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " (3D)")) {
                                        $icos .= "<font class=\"tresd\">3D</font>";
                                    }

                                    if (strpos("[" . $filme . "]", " 3D&nbsp;3D")) {
                                        $icos .= "<font class=\"tresd\">3D</font>";
                                    }

                                    $retirar = array('&nbsp;DIGITAL', ' 3D&nbsp;3D', '(dublado)', ' (nacional)', ' - Livre', ' - 10 Anos', ' - 12 Anos', ' - 14 Anos', ' - 16 Anos', ' - 18 Anos');
                                    $filme = str_replace($retirar, '', $filme);
                                    $hora = str_replace(' - ', ', ', $hora);

                                    echo "<div class=\"film\">\n";
                                    echo "<p class=\"nomeFilm\">$filme</p>\n";
                                    echo "<p class=\"icosFilm\">$icos</p>\n";
                                    echo "<div style=\"clear: both;\"></div>";
                                    echo "<p class=\"salaFilm\"> -- </p>\n";
                                    echo "<p class=\"horaFilm\">$hora</p>\n";
                                    echo "</div>\n";
                                    $contTD3 = 0;
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="infos">
                        <div class="preco">
                            <div class="topPreco"><h3>Preço</h3><p></p></div>
                            <div id="midPreCinemark" class="midPreco">
                                <?php
                                $selecPreco = mysql_fetch_array(mysql_query("SELECT preco FROM cinemas WHERE id = '1'"));
                                echo "$selecPreco[0]\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preCinemark" class="barraLoc"><font id="rpCinemark">>></font><font id="lpCinemark" style="display: none;"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midCinemark" class="midLoc">
                                <?php
                                $selecLoc = mysql_fetch_array(mysql_query("SELECT * FROM localizacao WHERE idCinema = '1'"));
                                $mapa = $selecLoc['mapa'];
                                $l1 = $selecLoc['l1'];
                                $l2 = $selecLoc['l2'];
                                $l3 = $selecLoc['l3'];
                                echo "$mapa\n<p>\n$l1 <br/>\n$l2 <br/>\n$l3\n</p>\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locCinemark" class="barraLoc"><font id="rCinemark">>></font><font id="lCinemark" style="display: none;"><<</font></div>
                        </div>
                        <div style="height: 20px;"></div>
                        <div class="propaganda1" id='prop1' onclick="window.open('<?php echo $linkProp1; ?>', '_blank');"></div>
                    </div>
                </div>

                <div class="cinema" id="natalshopping">
                    <div class="prog">
                        <h2 style="padding: 0px 0px 5px 30px;">//Cinépolis - Natal Shopping</h2>
                        <?php
                        foreach ($content1->find('tr') as $elemento) {
                            $filme = '';
                            $icos = '';
                            $idade = '';
                            $sala = '';
                            $hora = '';
                            $contTR1 += 1;
                            if ($contTR1 == '1') {
                                
                            } else {
                                foreach ($elemento->find('td') as $a) {
                                    $contTD1 += 1;
                                    $hue = $a->plaintext;

                                    if ($contTD1 == '1') {
                                        $sala = $hue;
                                    }
                                    if ($contTD1 == '2') {
                                        $filme = $hue;
                                    }
                                    if ($contTD1 == '3') {
                                        $idade = $hue;
                                    }
                                    if ($contTD1 == '4') {
                                        $hora = $hue;

                                        if (strpos("[" . $filme . "]", " (Estreia)")) {
                                            $filme .= " <font class=\"estreia\">ESTREIA</font>";
                                        }

                                        if ($idade == 'L') {
                                            $icos .= "<font class=\"livre\">L</font>";
                                        } else {
                                            $icos .= "<font class=\"anos $idade\">$idade</font>";
                                        }

                                        if (strpos("[" . $hora . "]", "Dub. - ")) {
                                            $icos .= "<font class=\"dublado\">DUB</font>";
                                        } else if (strpos("[" . $hora . "]", "Leg. - ")) {
                                            $icos .= "<font class=\"legendado\">LEG</font>";
                                        } else {
                                            $icos .= "<font class=\"nacional\">NAC</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "(Macro XE) - ")) {
                                            $icos .= "<font class=\"macroxe\">Macro XE</font>";
                                        }

                                        if (strpos("[" . $filme . "]", " (3D)")) {
                                            $icos .= "<font class=\"tresd\">3D</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "VIP - ")) {
                                            $icos .= "<font class=\"vip\">VIP</font>";
                                        }

                                        $retirar = array('Dub. - ', 'Leg. - ', '(Macro XE) - ', ' (3D)', ' (Estreia)', 'VIP - ');
                                        $filme = str_replace($retirar, '', $filme);
                                        $hora = str_replace($retirar, '', $hora);

                                        echo "<div class=\"film\">\n";
                                        echo "<p class=\"nomeFilm\">$filme</p>\n";
                                        echo "<p class=\"icosFilm\">$icos</p>\n";
                                        echo "<div style=\"clear: both;\"></div>";
                                        echo "<p class=\"salaFilm\">Sala $sala</p>\n";
                                        echo "<p class=\"horaFilm\">$hora</p>\n";
                                        echo "</div>\n";
                                        $contTD1 = 0;
                                    }
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="infos">
                        <div class="preco">
                            <div class="topPreco"><h3>Preço</h3><p></p></div>
                            <div id="midPreNatalShopping" class="midPreco">
                                <?php
                                $selecPreco = mysql_fetch_array(mysql_query("SELECT preco FROM cinemas WHERE id = '3'"));
                                echo "$selecPreco[0]\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preNatalShopping" class="barraLoc"><font id="rpNatalShopping">>></font><font id="lpNatalShopping" style="display: none;"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midNatalShopping" class="midLoc">
                                <?php
                                $selecLoc = mysql_fetch_array(mysql_query("SELECT * FROM localizacao WHERE idCinema = '3'"));
                                $mapa = $selecLoc['mapa'];
                                $l1 = $selecLoc['l1'];
                                $l2 = $selecLoc['l2'];
                                $l3 = $selecLoc['l3'];
                                echo "$mapa\n<p>\n$l1 <br/>\n$l2 <br/>\n$l3\n</p>\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locNatalShopping" class="barraLoc"><font id="rNatalShopping">>></font><font id="lNatalShopping" style="display: none;"><<</font></div>
                        </div>
                        <div style="height: 20px;"></div>
                        <div class="propaganda1" id='prop2' onclick="window.open('<?php echo $linkProp2; ?>', '_blank');"></div>
                    </div>
                </div>

                <div class="cinema" id="norteshopping">
                    <div class="prog">
                        <h2 style="padding: 0px 0px 5px  30px;">//Cinépolis - Partage Norte Shopping</h2>
                        <?php
                        foreach ($content->find('tr') as $elemento) {
                            $filme = '';
                            $icos = '';
                            $idade = '';
                            $sala = '';
                            $hora = '';
                            $contTR += 1;
                            if ($contTR == '1') {
                                
                            } else {
                                foreach ($elemento->find('td') as $a) {
                                    $contTD += 1;
                                    $hue = $a->plaintext;

                                    if ($contTD == '1') {
                                        $sala = $hue;
                                    }
                                    if ($contTD == '2') {
                                        $filme = $hue;
                                    }
                                    if ($contTD == '3') {
                                        $idade = $hue;
                                    }
                                    if ($contTD == '4') {
                                        $hora = $hue;

                                        if (strpos("[" . $filme . "]", " (Estreia)")) {
                                            $filme .= " <font class=\"estreia\">ESTREIA</font>";
                                        }

                                        if ($idade == 'L') {
                                            $icos .= "<font class=\"livre\">L</font>";
                                        } else {
                                            $icos .= "<font class=\"anos $idade\">$idade</font>";
                                        }

                                        if (strpos("[" . $hora . "]", "Dub. - ")) {
                                            $icos .= "<font class=\"dublado\">DUB</font>";
                                        } else if (strpos("[" . $hora . "]", "Leg. - ")) {
                                            $icos .= "<font class=\"legendado\">LEG</font>";
                                        } else {
                                            $icos .= "<font class=\"nacional\">NAC</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "(Macro XE) - ")) {
                                            $icos .= "<font class=\"macroxe\">Macro XE</font>";
                                        }

                                        if (strpos("[" . $filme . "]", " (3D)")) {
                                            $icos .= "<font class=\"tresd\">3D</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "VIP - ")) {
                                            $icos .= "<font class=\"vip\">VIP</font>";
                                        }

                                        $retirar = array('Dub. - ', 'Leg. - ', '(Macro XE) - ', ' (3D)', ' (Estreia)', 'VIP - ');
                                        $filme = str_replace($retirar, '', $filme);
                                        $hora = str_replace($retirar, '', $hora);

                                        echo "<div class=\"film\">\n";
                                        echo "<p class=\"nomeFilm\">$filme</p>\n";
                                        echo "<p class=\"icosFilm\">$icos</p>\n";
                                        echo "<div style=\"clear: both;\"></div>";
                                        echo "<p class=\"salaFilm\">Sala $sala</p>\n";
                                        echo "<p class=\"horaFilm\">$hora</p>\n";
                                        echo "</div>\n";
                                        $contTD = 0;
                                    }
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="infos">
                        <div class="preco">
                            <div class="topPreco"><h3>Preço</h3><p></p></div>
                            <div id="midPreNorteShopping" class="midPreco">
                                <?php
                                $selecPreco = mysql_fetch_array(mysql_query("SELECT preco FROM cinemas WHERE id = '4'"));
                                echo "$selecPreco[0]\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preNorteShopping" class="barraLoc"><font id="rpNorteShopping">>></font><font id="lpNorteShopping" style="display: none;"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midNorteShopping" class="midLoc">
                                <?php
                                $selecLoc = mysql_fetch_array(mysql_query("SELECT * FROM localizacao WHERE idCinema = '4'"));
                                $mapa = $selecLoc['mapa'];
                                $l1 = $selecLoc['l1'];
                                $l2 = $selecLoc['l2'];
                                $l3 = $selecLoc['l3'];
                                echo "$mapa\n<p>\n$l1 <br/>\n$l2 <br/>\n$l3\n</p>\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locNorteShopping" class="barraLoc"><font id="rNorteShopping">>></font><font id="lNorteShopping" style="display: none;"><<</font></div>
                        </div>
                        <div style="height: 20px;"></div>
                        <div class="propaganda1" id='prop3' onclick="window.open('<?php echo $linkProp3; ?>', '_blank');"></div>
                    </div>
                </div>

                <div class="cinema" id="multicine">
                    <div class="prog">
                        <h2 style="padding: 0px 0px 5px 30p x;">//Multicine - Partage Shopping Mossoró</h2>
                        <?php
                        foreach ($content2->find('tr') as $elemento) {
                            $filme = '';
                            $icos = '';
                            $idade = '';
                            $sala = '';
                            $hora = '';
                            $contTR2 += 1;
                            if ($contTR2 == '1') {
                                
                            } else {
                                foreach ($elemento->find('td') as $a) {
                                    $contTD2 += 1;
                                    $hue = $a->plaintext;

                                    if ($contTD2 == '1') {
                                        $filme = $hue;
                                    }
                                    if ($contTD2 == '2') {
                                        $idade = $hue;
                                    }
                                    if ($contTD2 == '3') {
                                        $hora = $hue;

                                        if (strpos("[" . $idade . "]", "Livre")) {
                                            $icos .= "<font class=\"livre\">L</font>";
                                        } else if (strpos("[" . $idade . "]", "10")) {
                                            $icos .= "<font class=\"anos10\">10</font>";
                                        } else if (strpos("[" . $idade . "]", "12")) {
                                            $icos .= "<font class=\"anos12\">12</font>";
                                        } else if (strpos("[" . $idade . "]", "14")) {
                                            $icos .= "<font class=\"anos14\">14</font>";
                                        } else if (strpos("[" . $idade . "]", "16")) {
                                            $icos .= "<font class=\"anos16\">16</font>";
                                        } else if (strpos("[" . $idade . "]", "18")) {
                                            $icos .= "<font class=\"anos18\">18</font>";
                                        }

                                        if (strpos("[" . $hora . "]", "Dub. - ")) {
                                            $icos .= "<font class=\"dublado\">DUB</font>";
                                        } else if (strpos("[" . $hora . "]", "Leg. - ")) {
                                            $icos .= "<font class=\"legendado\">LEG</font>";
                                        } else {
                                            $icos .= "<font class=\"nacional\">NAC</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "(3D)")) {
                                            $icos .= "<font class=\"tresd\">3D</font>";
                                        }

                                        $retirar = array('Dub. - ', 'Leg. - ', 'Nac. -  ', ' (3D)');
                                        $filme = str_replace($retirar, '', $filme);
                                        $hora = str_replace($retirar, '', $hora);

                                        echo "<div class=\"film\">\n";
                                        echo "<p class=\"nomeFilm\">$filme</p>\n";
                                        echo "<p class=\"icosFilm\">$icos</p>\n";
                                        echo "<div style=\"clear: both;\"></div>";
                                        echo "<p class=\"salaFilm\">-</p>\n";
                                        echo "<p class=\"horaFilm\">$hora</p>\n";
                                        echo "</div>\n";
                                        $contTD2 = 0;
                                    }
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="infos">
                        <div class="preco">
                            <div class="topPreco"><h3>Preço</h3><p></p></div>
                            <div id="midPreMulticine" class="midPreco">
                                <?php
                                $selecPreco = mysql_fetch_array(mysql_query("SELECT preco FROM cinemas WHERE id = '5'"));
                                echo "$selecPreco[0]\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preMulticine" class="barraLoc"><font id="rpMulticine">>></font><font id="lpMulticine" style="display: none;"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midMulticine" class="midLoc">
                                <?php
                                $selecLoc = mysql_fetch_array(mysql_query("SELECT * FROM localizacao WHERE idCinema = '5'"));
                                $mapa = $selecLoc['mapa'];
                                $l1 = $selecLoc['l1'];
                                $l2 = $selecLoc['l2'];
                                $l3 = $selecLoc['l3'];
                                echo "$mapa\n<p>\n$l1 <br/>\n$l2 <br/>\n$l3\n</p>\n";
                                ?>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locMulticine" class="barraLoc"><font id="rMulticine">>></font><font id="lMulticine" style="display: none;"><<</font></div>
                        </div>
                        <div style="height: 20px;"></div>
                        <div class="propaganda1" id='prop4' onclick="window.open('<?php echo $linkProp4; ?>', '_blank');"></div>
                    </div>
                </div>

            </div>

            <div style="clear: both; height: 10px;"></div>
            <div class="propaganda2" id='prop5' onclick="window.open('<?php echo $linkProp5; ?>', '_blank');"></div>
            <div style="clear: both; height: 10px;"></div>
        </div>

        <div id="botBg">
            <div id="bot">
                <p>© Copyright 2016 Filmões | <a href="http://pdsgroup.com.br/" target="_blank">Made with <font>♥</font> by PDS Group</a></p>
            </div>
        </div>

        <a href="#topBg" class="scroll" id="subir" style="display: none;"><div id="subirDiv"><div><</div></div></a>
    </body>
    <?php
    if (@$_GET['go'] == 'login') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $senhaEncode = base64_encode($senha);
        $ok = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE login = '$usuario' AND senha = '$senhaEncode'"));

        if ($ok == 1) {
            $hue = mysql_fetch_row(mysql_query("SELECT nome FROM usuarios WHERE login = '$usuario'"));
            $_SESSION['nome'] = $hue[0];
            $laf = mysql_fetch_row(mysql_query("SELECT id FROM usuarios WHERE login = '$usuario'"));
            $_SESSION['id'] = $laf[0];

            $row = mysql_fetch_row(mysql_query("SELECT per FROM usuarios WHERE login = '$usuario'"));
            $per = $row[0];
            $_SESSION['permissao'] = $per;
            $_SESSION ['usuario'] = $usuario;

            if ($per == '0') {
                echo "<meta http-equiv='refresh' content='0, url=painelAdm.php'>";
            } else if ($per == '1') {
                echo "<meta http-equiv='refresh' content='0, url=painelEmp.php'>";
            } else if ($per == '2') {
                echo "<meta http-equiv='refresh' content='0, url=painelUs.php'>";
            }
        } else {
            echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
        }
    }
    if (@$_GET['go'] == 'cadastro') {
        $tipo = $_POST['tipoCad'];
        $pfj = $_POST['pfj'];
        $nome = $_POST['nomeCad'];
        $razao = $_POST['razaoCad'];
        $cad = $_POST['cadCad'];
        $email = $_POST['emailCad'];
        $usuario = $_POST['usuarioCad'];
        $senha = $_POST ['senhaCad1'];
        $senhaEncode = base64_encode($senha);
        $per = '1';
        $loc = 'painelEmp.php';
        if ($tipo == '1') {
            $razao = '';
            $cad = '';
            $per = '2';
            $loc = 'painelUs.php';
        }
        if ($pfj == '2') {
            $razao = '';
        }

        $conf1 = mysql_num_rows(mysql_query("SELECT id FROM usuarios WHERE login = '$usuario'"));
        $conf2 = mysql_num_rows(mysql_query("SELECT id FROM usuarios WHERE email = '$email'"));
        if ($conf1 == 1) {
            echo ("<script> alert('Erro: Login já cadastrado!'); history.back(); </script>");
        } else if ($conf2 == 1) {
            echo ("<script> alert('Erro: E-mail já cadastrado!'); history.back(); </script>");
        } else {
            mysql_query("insert into usuarios(nome, razaoSocial, cad, email, login, senha, per) values ('$nome','$razao','$cad','$email','$usuario','$senhaEncode','$per')");
            $idCli = mysql_insert_id();
            if ($tipo == '1') {
                mysql_query("insert into email(idCli, email, nome) values ('$idCli','$email','$nome')");
            }
            $_SESSION['id'] = $idCli;
            $_SESSION['nome'] = $nome;
            $_SESSION['permissao'] = $per;
            $_SESSION ['usuario'] = $usuario;
            echo ("<script>alert('Cadastrado com sucesso!'); location.href = '$loc';</script>");
        }
    }
    ?>
</html>