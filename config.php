<?php

$con = @mysql_connect("localhost", "root", "") or die("Servidor OFFLINE!");
mysql_select_db("filmoes", $con) or die("Tabela não encontrada!");

header('Content-Type: text/html; charset=utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

date_default_timezone_set('America/Recife');

function formatarData($data) {
    $rData = implode("/", array_reverse(explode("-", trim($data))));
    return $rData;
}

?>