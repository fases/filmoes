<?php
session_start();
require_once "config.php";

if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['permissao']) == true)) {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}

if ($_SESSION['permissao'] != '0') {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
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
        <script type='text/javascript' src='js/jquery.stellar.js'></script>
        <script type='text/javascript' src='js/padrao.js'></script>
        <style>
            #topBg{
                background-attachment: fixed;
                background-image: url("imagens/bg4.jpg");
                background-color: #d3ebd5;
                background-position: top;
            }
        </style>
    </head>
    <body>
        <div id="topBg" data-stellar-background-ratio="0.2">
            <div id="faixa"></div>
            <div id="top">
                <div id="topL">
                    <a href="index.php">
                        <img src="imagens/logo2.png" width="300px"  alt="Filmões"/>
                    </a>
                </div>

                <div id="topR">
                    <h1 style="margin-right: 60px; margin-top: -15px;">Painel Administrativo</h1>
                </div>
                <div style="clear: both;"></div>
                <div style="height: 450px;">
                </div>
            </div>
        </div>
        <div id="botBg">
            <div id="bot">
                <p>© Copyright 2016 Filmões | <a href="http://pdsgroup.com.br/" target="_blank">Made with <font>♥</font> by PDS Group</a></p>
            </div>
        </div>
        <a href="#topBg" class="scroll" id="subir" style="display: none;"><div id="subirDiv"><div><</div></div></a>
    </body>
</html>