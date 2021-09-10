<?php

/**Enviar email */
include 'connection.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'] ;
$conteudo = $_POST['conteudo'];

 
$to = "albino77miguel@gmail.com";//email do destinatario
$headers = "MIME-Version:1.0 "."\r\n";
$headers.="Content-type:text/html; charset=iso-8859-1"."\r\n";
$headers.="To:António<albino77miguel@gmail.com>"."\r\n";
$headers.="From:<contacto@site_php.co.ao>"."\r\n";
$headers.="Replay-To:contacto@site_php.co.ao"."\r\n";
$envio = mail($to,$assunto,$conteudo,$headers);

if($envio == true):

    echo 'E-mail enviado com sucesso<br />';
    echo '<a href = "index.php">Ir para Home</a>';
else:
    echo 'Erro de envio<br />';
    echo '<a href="contacto.php">Voltar a tela de Contacto</a>';
endif;