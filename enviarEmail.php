<?php
$emaildestinatario = 'contato@filmoes.com.br';
$assunto = $_POST['assunto'];
$nome = $_POST['nome'];
$contato = $_POST['contato'];
$email = trim($_POST['email']);
$mensagem = $_POST['mensagem'];

$mensagemHTML = '<p align="center"><b>MENSAGEM ENVIADA NO SITE</b></p>
                            <p align="center"><b>-----------------------------------------</b></p>
                            <p><b>Mensagem:</b> ' . $mensagem . ' </p>
                            <p> </p>
                            <p><i><b>Nome:</b> ' . $nome . ' </i></p>
                            <p><i><b>Contato:</b> ' . $contato . ' </i></p>
                            <p><i><b>E-Mail:</b> ' . $email . ' </i></p>
                            <hr>';

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emaildestinatario\r\n";
$headers .= "Return-Path: $emaildestinatario \r\n";
$headers .= "Reply-To: $email \r\n";

mail($emaildestinatario, $assunto, $mensagemHTML, $headers);

echo "<script>alert('E-mail enviado com sucesso!'); location.href='contato.php'</script>";
?>