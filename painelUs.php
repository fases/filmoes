<?php
session_start();
require_once "config.php";

if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['permissao']) == true)) {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}

if ($_SESSION['permissao'] != '2') {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}

$nome = $_SESSION['nome'];
$idUser = $_SESSION['id'];

$selecEmail = mysql_fetch_array(mysql_query("SELECT * FROM email WHERE idCli = '$idUser'"));

$ativoUser = $selecEmail['ativo'];
if ($ativoUser == '1') {
    $ativoTxt = 'Ativar Newslatter';
    $ativoLink = 'location.href = \'?go=atvNews\'';
    $ativoId = 'btnAtivar';
} else {
    $ativoTxt = 'Desativar Newslatter';
    $ativoLink = 'location.href = \'?go=desNews\'';
    $ativoId = 'btnDesativar';
}

$ativoDom = $selecEmail['dDom'];
$ativoSeg = $selecEmail['dSeg'];
$ativoTer = $selecEmail['dTer'];
$ativoQua = $selecEmail['dQua'];
$ativoQui = $selecEmail['dQui'];
$ativoSex = $selecEmail['dSex'];
$ativoSab = $selecEmail['dSab'];

$ativoCinemark = $selecEmail['cCinemark'];
$ativoCinepolisZS = $selecEmail['cCinepolisZS'];
$ativoCinepolisZN = $selecEmail['cCinepolisZN'];
$ativoMoviecom = $selecEmail['cMoviecom'];
$ativoMulticine = $selecEmail['cMulticine'];

$ativoPreco = $selecEmail['preco'];
$ativoInfos = $selecEmail['infos'];
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
        <script src="js/sweetalert.js"></script>
        <link rel="stylesheet" type="text/css" href="js/sweetalert1.css">
        <link rel="stylesheet" type="text/css" href="js/sweetalert2.css">
        <script type='text/javascript' src='js/padrao.js'></script>
        <script>
            function carregar() {
                if ('<?php echo $ativoDom ?>' == '0') {
                    $('#check1').prop('checked', true);
                }
                if ('<?php echo $ativoSeg ?>' == '0') {
                    $('#check2').prop('checked', true);
                }
                if ('<?php echo $ativoTer ?>' == '0') {
                    $('#check3').prop('checked', true);
                }
                if ('<?php echo $ativoQua ?>' == '0') {
                    $('#check4').prop('checked', true);
                }
                if ('<?php echo $ativoQui ?>' == '0') {
                    $('#check5').prop('checked', true);
                }
                if ('<?php echo $ativoSex ?>' == '0') {
                    $('#check6').prop('checked', true);
                }
                if ('<?php echo $ativoSab ?>' == '0') {
                    $('#check7').prop('checked', true);
                }

                if ('<?php echo $ativoCinemark ?>' == '0') {
                    $('#check8').prop('checked', true);
                }
                if ('<?php echo $ativoMoviecom ?>' == '0') {
                    $('#check9').prop('checked', true);
                }
                if ('<?php echo $ativoCinepolisZS ?>' == '0') {
                    $('#check10').prop('checked', true);
                }
                if ('<?php echo $ativoCinepolisZN ?>' == '0') {
                    $('#check11').prop('checked', true);
                }
                if ('<?php echo $ativoMulticine ?>' == '0') {
                    $('#check12').prop('checked', true);
                }

                if ('<?php echo $ativoPreco ?>' == '0') {
                    $('#check13').prop('checked', true);
                }
                if ('<?php echo $ativoInfos ?>' == '0') {
                    $('#check14').prop('checked', true);
                }
            }
        </script>
        <style>
            #topBg{
                background-attachment: fixed;
                background-image: url("imagens/bg4.jpg");
                background-color: #d3ebd5;
                background-position: top;
            }
            
            select{
                padding: 1px;
                font-size: 17px;
                outline: none;
                border: 1px #aaa solid;
            }

            span{
                font-size: 22px;
            }

            form{
                margin-top: 90px;
            }

            p{
                padding-top: 10px;
                text-align: center;
            }

            .btnForm{
                margin-top: 20px;
                padding: 4px 18px;
                font-size: 15px;
                outline: none;
                background-color: #444;
                color: #fff;
                border: none;
                cursor: pointer;

                -webkit-transition: 0.1s linear;
                -moz-transition: 0.1s linear;
                -o-transition: 0.1s linear;
                transition: 0.1s linear;
            }

            #btnSalvar:focus, #btnSalvar:hover{
                background-color: #008000;
            }

            #btnDesativar:focus, #btnDesativar:hover{
                background-color: #CC0000;
            }

            #btnAtivar:focus, #btnAtivar:hover{
                background-color: #427fed;
            }

            #nome{
                float: right;
                margin-right: 60px;
            }
            .check{
                padding-right: 8px;
            }
        </style>
    </head>
    <body onload="carregar()">
        <div id="topBg" data-stellar-background-ratio="0.2">
            <div id="faixa"></div>
            <div id="top">
                <div id="topL">
                    <a href="index.php">
                        <img src="imagens/logo2.png" width="300px"  alt="Filmões"/>
                    </a>
                </div>

                <div id="topR">
                    <h1 style="margin-right: 60px; margin-top: -15px;">Configurar Newslatter</h1>
                    <font id="nome"><?php echo $nome; ?></font>
                </div>
                <div style="clear: both;"></div>
                <div style="height: 340px;">
                    <form method="post" action="?go=salvar" onsubmit="return validacao();">
                        <p>
                            <span style="padding-right: 5px;">Receber programação:</span>
                            <input type="checkbox" id='check1' name="dom" /> <font class="check">Domingo</font>
                            <input type="checkbox" id='check2' name="seg" /> <font class="check">Segunda</font>
                            <input type="checkbox" id='check3' name="ter" /> <font class="check">Terça</font>
                            <input type="checkbox" id='check4' name="qua" /> <font class="check">Quarta</font>
                            <input type="checkbox" id='check5' name="qui" /> <font class="check">Quinta</font>
                            <input type="checkbox" id='check6' name="sex" /> <font class="check">Sexta</font>
                            <input type="checkbox" id='check7' name="sab" /> <font class="check">Sábado</font>
                        </p>
                        <p>
                            <span> Cinemas: </span>
                            <input type="checkbox" id='check8' name="cine1" /> <font class="check">Cinemark - Midway Mall</font>
                            <input type="checkbox" id='check9' name="cine2" /> <font class="check">Moviecom - Praia Shopping</font>
                            <input type="checkbox" id='check10' name="cine3" /> <font class="check">Cinépolis - Natal Shopping</font> <br />
                            <input type="checkbox" id='check11' name="cine4" /> <font class="check">Cinépolis - Partage Norte Shopping</font>
                            <input type="checkbox" id='check12' name="cine5" /> <font class="check">Multicine - Partage Shopping Mossoró</font>
                        </p>
                        <p>
                            <input type="checkbox" id='check13' name="preco" /> <span>Receber tabela de preços do(s) cinema(s) selecionado(s)</span>
                        </p>
                        <p>
                            <input type="checkbox" id='check14' name="infos" /> <span>Receber lançamentos e promoções</span>
                        </p>
                        <p>
                            <input type="submit" value="SALVAR" class="btnForm" id="btnSalvar">
                            <input type="button" value="<?php echo $ativoTxt; ?>" class="btnForm" id="<?php echo $ativoId; ?>" onclick="<?php echo $ativoLink; ?>">
                        </p>
                    </form>
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
    <?php
    if (@$_GET['go'] == 'salvar') {
        if ((!isset($_POST['dom'])) && (!isset($_POST['seg'])) && (!isset($_POST['ter'])) && (!isset($_POST['qua'])) && (!isset($_POST['qui'])) && (!isset($_POST['sex'])) && (!isset($_POST['sab']))) {
            echo ("<script>newAlert3('Selecione pelo menos um dia da semana, ou desative o newslatter!', 'warning');</script>");
        } else {
            if (!isset($_POST['cine1']) && !isset($_POST['cine2']) && !isset($_POST['cine3']) && !isset($_POST['cine4']) && !isset($_POST['cine5'])) {
                echo ("<script>newAlert3('Selecione pelo menos um cinema, ou desative o newslatter!', 'warning');</script>");
            } else {
                if (isset($_POST['dom'])) {
                    $dom = '0';
                } else {
                    $dom = '1';
                }
                if (isset($_POST['seg'])) {
                    $seg = '0';
                } else {
                    $seg = '1';
                }
                if (isset($_POST['ter'])) {
                    $ter = '0';
                } else {
                    $ter = '1';
                }
                if (isset($_POST['qua'])) {
                    $qua = '0';
                } else {
                    $qua = '1';
                }
                if (isset($_POST['qui'])) {
                    $qui = '0';
                } else {
                    $qui = '1';
                }
                if (isset($_POST['sex'])) {
                    $sex = '0';
                } else {
                    $sex = '1';
                }
                if (isset($_POST['sab'])) {
                    $sab = '0';
                } else {
                    $sab = '1';
                }
                if (isset($_POST['cine1'])) {
                    $cinemark = '0';
                } else {
                    $cinemark = '1';
                }
                if (isset($_POST['cine2'])) {
                    $moviecom = '0';
                } else {
                    $moviecom = '1';
                }
                if (isset($_POST['cine3'])) {
                    $cinepolisZS = '0';
                } else {
                    $cinepolisZS = '1';
                }
                if (isset($_POST['cine4'])) {
                    $cinepolisZN = '0';
                } else {
                    $cinepolisZN = '1';
                }
                if (isset($_POST['cine5'])) {
                    $multicine = '0';
                } else {
                    $multicine = '1';
                }
                if (isset($_POST['preco'])) {
                    $preco = '0';
                } else {
                    $preco = '1';
                }
                if (isset($_POST['infos'])) {
                    $infos = '0';
                } else {
                    $infos = '1';
                }
                mysql_query("UPDATE email SET dDom='$dom', dSeg='$seg', dTer='$ter', dQua='$qua', dQui='$qui', dSex='$sex', dSab='$sab', cCinemark='$cinemark', cCinepolisZS='$cinepolisZS', cCinepolisZN='$cinepolisZN', cMoviecom='$moviecom', cMulticine='$multicine', preco='$preco', infos='$infos' WHERE idCli='$idUser'");
                echo ("<script>newAlert1('Alterações feitas com sucesso!', 'success', 'painelUs.php');</script>" );
            }
        }
    }
    if (@$_GET['go'] == 'desNews') {
        mysql_query("UPDATE email SET ativo='1' WHERE idCli='$idUser'");
        echo ("<script>newAlert1('Alteração feita com sucesso!', 'success', 'painelUs.php');</script>" );
    }
    if (@$_GET['go'] == 'atvNews') {
        mysql_query("UPDATE email SET ativo='0' WHERE idCli='$idUser'");
        echo ("<script>newAlert1('Alteração feita com sucesso!', 'success', 'painelUs.php');</script>");
    }
    ?>
</html>