<!DOCTYPE html>
<?php
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
?>
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
    </head>
    <body>
        <div id="topBg" data-stellar-background-ratio="0.2">

            <div id="faixa">
                <div><span><a href="#" class="scroll">Alterar Estado</a> • <a href="#" class="scroll">Acessar Painel</a></span></div>
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
                        <li><a href="#" class="scroll">PREÇO</a></li>
                        <li><a href="#" class="scroll">LOCALIZAÇÃO</a></li>
                        <li><a href="#" class="scroll">CONTATO</a></li>
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
                            <img src="imagens/slide/4.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="midBg" data-stellar-background-ratio="0.05">
            <div id="mid">

                <h1 style="text-align: center; border-bottom: 3px solid #000; width: 618px;">Programação</h1>
                <ul>
                    <li><a href="#" class="scroll"><div>Cinemark<br/>Midway Mall</div></a></li>
                    <li><a href="#" class="scroll"><div style="margin-left: 2px;">Moviecom<br/>Praia Shopping</div></a></li>
                    <li><a href="#natalshopping" class="scroll"><div style="margin-left: 2px;">Cinépolis<br/>Natal Shopping</div></a></li>
                    <li><a href="#norteshopping" class="scroll"><div style="margin-left: 2px;">Cinépolis<br/>Norte Shopping</div></a></li>
                    <li><a href="#multicine" class="scroll"><div style="margin-left: 2px;">Multicine<br/>Partage Mossoró</div></a></li>
                </ul>

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
                                    }
                                    if ($contTD1 == '6') {
                                        $idade = str_replace(' anos', '', $idade);

                                        if (strpos("[" . $filme . "]", " (Estreia)")) {
                                            $filme .= " <font class=\"estreia\">ESTREIA</font>";
                                        }

                                        if ($idade == 'Livre') {
                                            $icos .= "<font class=\"livre\">L</font>";
                                        } else {
                                            $icos .= "<font class=\"anos$idade\">$idade</font>";
                                        }

                                        if (strpos("[" . $hora . "]", "Dub. - ")) {
                                            $icos .= "<font class=\"dublado\">DUB</font>";
                                        } else if (strpos("[" . $hora . "]", "Leg. - ")) {
                                            $icos .= "<font class=\"legendado\">LEG</font>";
                                        } else {
                                            $icos .= "<font class=\"nacional\">NAC</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "MacroXE")) {
                                            $icos .= "<font class=\"macroxe\">Macro XE</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "3D")) {
                                            $icos .= "<font class=\"tresd\">3D</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "VIP")) {
                                            $icos .= "<font class=\"vip\">VIP</font>";
                                        }

                                        $retirar = array('Dub. - ', 'Leg. - ', 'MacroXE ', '3D ', ' (Estreia)', 'VIP ');
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
                                <p>
                                    <font class="t1"> Salas Tradicionais </font> <br/>
                                    Seg., ter. <font class="hIco">EF</font>: R$ 17,00 <font class="hIco">M</font> e R$ 20,00 <font class="hIco">N</font> <br/>
                                    Qua. (exceto fer.): R$ 18,00 <font class="hIco">TD</font> <br/>
                                    Qui., sex., sáb., dom. e feriado: R$ 22,00 <font class="hIco">M</font> e R$ 25,00 <font class="hIco">N</font> <br/>
                                </p>
                                <p>
                                    <font class="t1"> Salas 3D </font> <br/>
                                    Seg., ter. <font class="hIco">EF</font>: R$ 26,00 <font class="hIco">TD</font> <br/>
                                    Qua. <font class="hIco">EF</font>: R$ 25,00 <font class="hIco">TD</font> <br/>
                                    Qui., sex., sáb., dom. e feriado: R$ 31,00 <font class="hIco">TD</font> <br/>
                                </p>
                                <p>
                                    <font class="t1"> Salas VIP </font> <br/>
                                    Seg., ter. <font class="hIco">EF</font>: R$ 33,00 <font class="hIco">TD</font> <br/>
                                    Qua. <font class="hIco">EF</font>: R$ 31,00 <font class="hIco">TD</font> <br/>
                                    Qui., sex., sáb., dom. e feriado: R$ 42,00 <font class="hIco">TD</font> <br/>
                                </p>
                                <p>
                                    <font class="t1"> Salas VIP 3D</font> <br/>
                                    Seg., ter. <font class="hIco">EF</font>: R$ 39,00 <font class="hIco">TD</font> <br/>
                                    Qua. <font class="hIco">EF</font>: R$ 37,00 <font class="hIco">TD</font> <br/>
                                    Qui., sex., sáb., dom. e feriado: R$ 45,00 <font class="hIco">TD</font> <br/>
                                </p>
                                <p>
                                    <font class="t1"> Salas Macro XE Tradicionais </font> <br/>
                                    Seg., ter. <font class="hIco">EF</font>: R$ 20,00 <font class="hIco">M</font> e R$ 23,00 <font class="hIco">N</font> <br/>
                                    Qua. <font class="hIco">EF</font>: R$ 21,00 <font class="hIco">TD</font> <br/>
                                    Qui., sex., sáb., dom. e feriado: R$ 25,00 <font class="hIco">M</font> e R$ 28,00 <font class="hIco">N</font> <br/>
                                </p>
                                <p>
                                    <font class="t1">Salas Macro XE 3D</font> <br/>
                                    Seg., ter. <font class="hIco">EF</font>: R$ 29,00 <font class="hIco">TD</font> <br/>
                                    Qua. <font class="hIco">EF</font>: R$ 28,00 <font class="hIco">TD</font> <br/>
                                    Qui., sex., sáb., dom. e feriado: R$ 34,00 <font class="hIco">TD</font> <br/>
                                </p>
                                <p>
                                    <font class="hIco">OBS</font>: Matinê são todas as sessões iniciadas até 16h55 <br/>
                                    <font class="hIco">EF</font>: Exceto Feriado <br/>
                                    <font class="hIco">TD</font>: Todo o Dia <br/>
                                    <font class="hIco">M</font>: Matinê <br/>
                                    <font class="hIco">N</font>: Noite
                                </p>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preNatalShopping" class="barraLoc"><font id="rpNatalShopping" style="display: none;">>></font><font id="lpNatalShopping"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midNatalShopping" class="midLoc">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.0957190284266!2d-35.2134393852327!3d-5.842131895767035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2ff7f174cbe21%3A0x2dca4e1d5201607!2sCin%C3%A9polis!5e0!3m2!1spt-BR!2sbr!4v1447375115106" frameborder="0" allowfullscreen></iframe>
                                <p>
                                    Avenida Senador Salgado Filho, 2234 <br/>
                                    Loja 400 – piso L2 – Candelaria <br/>
                                    Natal - RN
                                </p>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locNatalShopping" class="barraLoc"><font id="rNatalShopping">>></font><font id="lNatalShopping" style="display: none;"><<</font></div>
                        </div>
                        <div style="text-align: center; border: 2px solid #000; font-size: 12px; padding-top: 80px; width: 306px; height: 116px; margin-top: 20px">PROPAGANDA<br/>310x200</div>
                    </div>
                </div>

                <div class="cinema" id="norteshopping">
                    <div class="prog">
                        <h2 style="padding: 0px 0px 5px 30px;">//Cinépolis - Partage Norte Shopping</h2>
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
                                    }
                                    if ($contTD == '6') {
                                        $idade = str_replace(' anos', '', $idade);

                                        if (strpos("[" . $filme . "]", " (Estreia)")) {
                                            $filme .= " <font class=\"estreia\">ESTREIA</font>";
                                        }

                                        if ($idade == 'Livre') {
                                            $icos .= "<font class=\"livre\">L</font>";
                                        } else {
                                            $icos .= "<font class=\"anos$idade\">$idade</font>";
                                        }

                                        if (strpos("[" . $hora . "]", "Dub. - ")) {
                                            $icos .= "<font class=\"dublado\">DUB</font>";
                                        } else if (strpos("[" . $hora . "]", "Leg. - ")) {
                                            $icos .= "<font class=\"legendado\">LEG</font>";
                                        } else {
                                            $icos .= "<font class=\"nacional\">NAC</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "MacroXE")) {
                                            $icos .= "<font class=\"macroxe\">Macro XE</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "3D")) {
                                            $icos .= "<font class=\"tresd\">3D</font>";
                                        }

                                        if (strpos("[" . $filme . "]", "VIP")) {
                                            $icos .= "<font class=\"vip\">VIP</font>";
                                        }

                                        $retirar = array('Dub. - ', 'Leg. - ', 'MacroXE ', '3D ', ' (Estreia)', 'VIP ');
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
                                <p>
                                    <font class="t1"> Salas Tradicionais </font> <br/>
                                    Seg., ter., qua. <font class="hIco">EF</font>: R$ 13,00 <font class="hIco">M</font> e R$ 15,00 <font class="hIco">N</font>
                                    Qui., sex., sáb., dom. e feriado: R$ 17,00 <font class="hIco">M</font> e R$ 19,00 <font class="hIco">N</font>
                                </p>
                                <p>
                                    <font class="t1"> Salas 3D </font> <br/>
                                    Seg., ter., qua. <font class="hIco">EF</font>: R$ 17,00 <font class="hIco">TD</font>
                                    Qui., sex., sáb., dom. e feriado: R$ 22,00 <font class="hIco">TD</font>
                                </p>
                                <p>
                                    <font class="t1"> Salas Macro XE Tradicionais </font> <br/>
                                    Seg., ter., qua. <font class="hIco">EF</font>: R$ 13,00 <font class="hIco">M</font> e R$ 15,00 <font class="hIco">N</font>
                                    Qui., sex., sáb., dom. e feriado: R$ 17,00 <font class="hIco">M</font> e R$ 19,00 <font class="hIco">N</font>
                                </p>
                                <p>
                                    <font class="t1"> Salas Macro XE 3D </font> <br/>
                                    Seg., ter., qua. <font class="hIco">EF</font>: R$ 17,00 <font class="hIco">TD</font>
                                    Qui., sex., sáb., dom. e feriado: R$ 22,00 <font class="hIco">TD</font>
                                </p>
                                <p>
                                    <font class="hIco">OBS</font>: Matinê são todas as sessões iniciadas até 16h55 <br/>
                                    <font class="hIco">EF</font>: Exceto Feriado <br/>
                                    <font class="hIco">TD</font>: Todo o Dia <br/>
                                    <font class="hIco">M</font>: Matinê <br/>
                                    <font class="hIco">N</font>: Noite
                                </p>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preNorteShopping" class="barraLoc"><font id="rpNorteShopping" style="display: none;">>></font><font id="lpNorteShopping"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midNorteShopping" class="midLoc">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.6901799849184!2d-35.2492955852332!3d-5.757655095827385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b3aa4484175c1d%3A0x7c50cdd1371fb131!2sPartage+Norte+Shopping+Natal!5e0!3m2!1spt-BR!2sbr!4v1447375528809" frameborder="0" allowfullscreen></iframe>
                                <p>
                                    Av Doutor Medeiros Filho, 2395 <br/>
                                    Loja 230A – Bairro Potengi <br/>
                                    Natal - RN
                                </p>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locNorteShopping" class="barraLoc"><font id="rNorteShopping">>></font><font id="lNorteShopping" style="display: none;"><<</font></div>
                        </div>
                    </div>
                </div>
                <div class="cinema" id="multicine">
                    <div class="prog">
                        <h2 style="padding: 0px 0px 5px 30px;">//Multicine - Partage Shopping Mossoró</h2>
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
                                <p>Não há tabela de preços!</p>
                            </div>
                            <div class="espLoc"></div>
                            <div id="preMulticine" class="barraLoc"><font id="rpMulticine" style="display: none;">>></font><font id="lpMulticine"><<</font></div>
                        </div>

                        <div class="loc">
                            <div class="topLoc"><h3>Localização</h3><p></p></div>
                            <div id="midMulticine" class="midLoc">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.5744210714593!2d-37.379404785235806!3d-5.171942296246965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ba06ac1d109887%3A0xb8ce6a76107ec05c!2sMulticine+Cinemas!5e0!3m2!1spt-BR!2sbr!4v1447680431271" frameborder="0" allowfullscreen></iframe>
                                <p>
                                    Avenida João da Escóssia, 1515 <br/>
                                    Partage Shopping Mossoró – Nova Betânia <br/>
                                    Mossoró - RN
                                </p>
                            </div>
                            <div class="espLoc"></div>
                            <div id="locMulticine" class="barraLoc"><font id="rMulticine">>></font><font id="lMulticine" style="display: none;"><<</font></div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: both; height: 10px;"></div>
            <div style="text-align: center; border: 2px solid #000; font-size: 12px; padding-top: 26px; width: 746px; height: 50px; margin: 0 auto;">PROPAGANDA<br/>750x80</div>
            <div style="clear: both; height: 10px;"></div>
        </div>

        <div id="botBg">
            <div id="bot">
                <p>© Copyright 2015 Filmões | <a href="http://pdsgroup.com.br/" target="_blank">Made with <font>♥</font> by PDS Group</a></p>
            </div>
        </div>

        <a href="#topBg" class="scroll" id="subir" style="display: none;"><div id="subirDiv"><div><</div></div></a>
    </body>
</html>