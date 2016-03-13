<?php
session_start();
require_once "config.php";

if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['permissao']) == true)) {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}

if ($_SESSION['permissao'] != '1') {
    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
}

$nome = $_SESSION['nome'];
$user = $_SESSION['usuario'];

$selecEmail = mysql_fetch_array(mysql_query("SELECT email FROM usuarios WHERE login = '$user'"));
$emailUser = $selecEmail[0];

$dadosProp1 = mysql_query("SELECT fim FROM propaganda WHERE loc = '1' and ativo = '0'");
$selecDataFimProp1 = mysql_fetch_array($dadosProp1);
$totalProp1 = mysql_num_rows($dadosProp1);
if ($totalProp1 != 0) {
    $dataFimProp1 = formatarData($selecDataFimProp1[0]);
    $txtProp1 = "Propaganda 1 - Disponível em: $dataFimProp1";
    $disabledProp1 = "disabled";
} else {
    $txtProp1 = "Propaganda 1 - Valor: R$ 70,00 p/m";
    $disabledProp1 = "";
}

$dadosProp2 = mysql_query("SELECT fim FROM propaganda WHERE loc = '2' and ativo = '0'");
$selecDataFimProp2 = mysql_fetch_array($dadosProp2);
$totalProp2 = mysql_num_rows($dadosProp2);
if ($totalProp2 != 0) {
    $dataFimProp2 = formatarData($selecDataFimProp2[0]);
    $txtProp2 = "Propaganda 2 - Disponível em: $dataFimProp2";
    $disabledProp2 = "disabled";
} else {
    $txtProp2 = "Propaganda 2 - Valor: R$ 60,00 p/m";
    $disabledProp2 = "";
}

$dadosProp3 = mysql_query("SELECT fim FROM propaganda WHERE loc = '3' and ativo = '0'");
$selecDataFimProp3 = mysql_fetch_array($dadosProp3);
$totalProp3 = mysql_num_rows($dadosProp3);
if ($totalProp3 != 0) {
    $dataFimProp3 = formatarData($selecDataFimProp3[0]);
    $txtProp3 = "Propaganda 3 - Disponível em: $dataFimProp3";
    $disabledProp3 = "disabled";
} else {
    $txtProp3 = "Propaganda 3 - Valor: R$ 50,00 p/m";
    $disabledProp3 = "";
}

$dadosProp4 = mysql_query("SELECT fim FROM propaganda WHERE loc = '4' and ativo = '0'");
$selecDataFimProp4 = mysql_fetch_array($dadosProp4);
$totalProp4 = mysql_num_rows($dadosProp4);
if ($totalProp4 != 0) {
    $dataFimProp4 = formatarData($selecDataFimProp4[0]);
    $txtProp4 = "Propaganda 4 - Disponível em: $dataFimProp4";
    $disabledProp4 = "disabled";
} else {
    $txtProp4 = "Propaganda 4 - Valor: R$ 50,00 p/m";
    $disabledProp4 = "";
}

$dadosProp5 = mysql_query("SELECT fim FROM propaganda WHERE loc = '5' and ativo = '0'");
$selecDataFimProp5 = mysql_fetch_array($dadosProp5);
$totalProp5 = mysql_num_rows($dadosProp5);
if ($totalProp5 != 0) {
    $dataFimProp5 = formatarData($selecDataFimProp5[0]);
    $txtProp5 = "Propaganda 5 - Disponível em: $dataFimProp5";
    $disabledProp5 = "disabled";
} else {
    $txtProp5 = "Propaganda 5 - Valor: R$ 60,00 p/m";
    $disabledProp5 = "";
}

$dadosPropAll = mysql_query("SELECT fim FROM propaganda WHERE (loc = '1' and ativo = '1') or (loc = '2' and ativo = '1') or (loc = '3' and ativo = '1') or (loc = '4' and ativo = '1') or (loc = '5' and ativo = '1')");
$selecDataFimPropAll = mysql_fetch_array($dadosPropAll);
$totalPropAll = mysql_num_rows($dadosPropAll);
if ($totalProp3 == 0) {
    $disabledPropAll = "disabled";
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
        <script src="js/sweetalert.js"></script>
        <link rel="stylesheet" type="text/css" href="js/sweetalert1.css">
        <link rel="stylesheet" type="text/css" href="js/sweetalert2.css">
        <script type='text/javascript' src='js/padrao.js'></script>

        <style>
            #topBg{
                background-attachment: fixed;
                background-image: url("imagens/bg4.jpg");
                background-color: #d3ebd5;
                background-position: top;
            }
            
            select{
                margin-top: 5px;
                padding: 0px 5px;
                font-size: 15px;
                outline: none;
                border: 1px #aaa solid;
            }

            span{
                font-size: 22px;
            }

            form{
                margin-top: 70px;
            }

            p{
                padding-top: 10px;
                text-align: center;
            }

            #btnSalvar{
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
                background-color: #dd5e0f;
            }

            #nome{
                float: right;
                margin-right: 60px;
            }

            h2{
                text-align: center;
                margin-bottom: 10px;
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
                    <h1 style="margin-right: 60px; margin-top: -15px;">Configurar Anuncio</h1>
                    <font id="nome"><?php echo $nome; ?></font>
                </div>
                <div style="clear: both;"></div>
                <div style="height: 380px;">
                    <form method="post" action="?go=enviar">
                        <h2>Solicitar Criação de Propaganda</h2>
                        <p> <input type="radio" name='prop' value="1" <?php echo $disabledProp1; ?>/> <font class=""><?php echo $txtProp1; ?></font> </p>
                        <p> <input type="radio" name='prop' value="2" <?php echo $disabledProp2; ?>/> <font class=""><?php echo $txtProp2; ?></font> </p>
                        <p> <input type="radio" name='prop' value="3" <?php echo $disabledProp3; ?>/> <font class=""><?php echo $txtProp3; ?></font> </p>
                        <p> <input type="radio" name='prop' value="4" <?php echo $disabledProp4; ?>/> <font class=""><?php echo $txtProp4; ?></font> </p>
                        <p> <input type="radio" name='prop' value="5" <?php echo $disabledProp5; ?>/> <font class=""><?php echo $txtProp5; ?></font> </p>
                        <p>
                            Período: 
                            <select name="periodo">
                                <option value="1">1 mês</option>
                                <option value="2">2 meses</option>
                                <option value="3">3 meses</option>
                            </select>
                        </p>
                        <p><input type="submit" value="Enviar" class="btnForm" id="btnSalvar"></p>
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
    if (@$_GET['go'] == 'enviar') {
        $prop = $_POST['prop'];
        $periodo = $_POST['periodo'];
        if (empty($prop)) {
            echo ("<script>newAlert3('Selecione a propaganda desejada! Caso não haja propaganda disponível, tente mais tarde!', 'error');</script>");
        } else {
            $emaildestinatario = 'contato@filmoes.com.br';
            $assunto = 'Solicitação de Propaganda';
            $mensagem = $_POST['mensagem'];

            $mensagemHTML = '<p align="center"><b>SOLICITAÇÃO DE PROPAGANDA</b></p>
                            <p align="center"><b>-----------------------------------------</b></p>
                            <p><b>Propaganda:</b> ' . $prop . ' </p>
                            <p><b>Período:</b> ' . $periodo . ' M </p>
                            <p></p>
                            <p><i><b>Nome:</b> ' . $nome . ' </i></p>
                            <p><i><b>E-Mail:</b> ' . $emailUser . ' </i></p>
                            <hr>';

            $headers = "MIME-Version: 1.1\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "From: $emaildestinatario\r\n";
            $headers .= "Return-Path: $emaildestinatario \r\n";
            $headers .= "Reply-To: $emailUser \r\n";

            mail($emaildestinatario, $assunto, $mensagemHTML, $headers);
            
            echo ("<script>newAlert1('Solicitação enviada com sucesso!', 'success', 'painelEmp.php');</script>");
        }
    }
    ?>
</html>