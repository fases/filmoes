<!DOCTYPE html>
<?php
include "config.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link REL="SHORTCUT ICON" href="imagens/icon.ico" type="image/x-icon">

        <title>Filmões - Rio Grande do Norte</title>
        <link rel="stylesheet" href="css/contato.css" type="text/css">
        <script type='text/javascript' src='js/jquery-1.9.1.js'></script>
        <script type='text/javascript' src='js/jquery.cycle2.js'></script>
        <script type='text/javascript' src='js/jquery.stellar.js'></script>
        <script type='text/javascript' src='js/padrao.js'></script>
        <script>
            function carregar() {
                $('html,body').animate({scrollTop: $("#mid").offset().top}, 1500);
            }
        </script>
    </head>
    <body onload="carregar()">
        <div id="topBg" data-stellar-background-ratio="0.2">

            <div id="faixa">
                <div><span><a href="#" class="scroll">Alterar Estado</a> • <a href="#" class="scroll">Acessar Painel</a></span></div>
            </div>

            <div id="top">

                <div id="topL">
                    <a href="index.php">
                        <img src="imagens/logo2.png" width="300px"  alt="Filmões"/>
                    </a>
                </div>

                <div id="topR">
                    <p>Rio Grande do Norte</p>
                    <ul>
                        <li><a href="index.php">PROGRAMAÇÃO</a></li>
                        <li><a href="#" class="scroll">PREÇO</a></li>
                        <li><a href="#" class="scroll">LOCALIZAÇÃO</a></li>
                        <li><a href="#mid" class="scroll">CONTATO</a></li>
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
                <h1>Contato</h1>
                <p id="entreEmContato">Entre em contato pelo telefone <font style="font-weight: bold;"> (84) 98115-4101 </font> ou pelo formulário abaixo.</p>
                <div id="formGeral">
                    <form method="post" action="enviarEmail.php">
                        <div id="formLeft">
                            <p> Nome: </p>
                            <input type="text" name="nome" id="nome" class="txt" required/>
                            <p> Telefone/Celular: </p>
                            <input type="text" name="contato" id="contato" class="txt" required/>
                            <p> E-mail: </p>
                            <input type="email" name="email" id="email" class="txt" required/>
                        </div>
                        <div id="formRight">
                            <p> Assunto: </p> 
                            <input type="text" name="assunto" id="assunto" class="txt" required/>
                            <p> Mensagem: </p>
                            <textarea name="mensagem" id="mensagem" cols="45" rows="5" class="txt" required></textarea>
                            <input type="submit" value="Enviar" class="bot"/>
                        </div>
                    </form>
                </div>
                <h1 style="padding-top: 30px;">Onde Estamos</h1>
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.7486905227975!2d-35.26307878523317!3d-5.749273495833381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b3abb5048b2fcb%3A0xef4f6c5edaa6d542!2sIFRN+Campus+Natal+-+Zona+Norte!5e0!3m2!1spt-BR!2sbr!4v1455692263053" width="830" height="300" frameborder="0" scrolling="no" allowfullscreen></iframe>
                    <p>Rua Brusque, 2926</p>
                    <p>Potengi, Natal - RN</p>
                </div>
            </div>
            <div style="clear: both; height: 30px;"></div>
        </div>

        <div id="botBg">
            <div id="bot">
                <p>© Copyright 2015 Filmões | <a href="http://pdsgroup.com.br/" target="_blank">Made with <font>♥</font> by PDS Group</a></p>
            </div>
        </div>

        <a href="#topBg" class="scroll" id="subir" style="display: none;"><div id="subirDiv"><div><</div></div></a>
    </body>
</html>