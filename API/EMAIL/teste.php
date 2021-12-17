<?php

//emailSejaBemVindo('viana@dadosmobile.com',"Cezar",456253);

function emailSejaBemVindo($email,$nome,$senha)
{
    $headers = "MIME-Version: 1.0\r\n"; // Aqui vamos configurar o cabeçalho (header) do e-mail, formatos, remetentes, destinatários de cópias
    $headers .= "Content-type: text/html; charset=UTF-8\r\n"; // Aqui definirmos o formato padrão HTML e a codificação do Texto
    $headers .= "From:" . $email . "\r\n";
    $headers.= "Reply-To: contato@muraldadescola.com.br\r\n";
    $mensagem = "
	<html>
	<head>
	<title>SEJA BEM VINDO(A)</title>
	</head>
	<body>
	<h1>Prazer,$nome<h1>
    <h5>Seja bem vindo(a) ao mural da escola<h5>
    <p>Para seu primeiro acesso:</p>
    <p style='color:blue'>Login:$email</p>
    <p style='color:red'>Senha:$senha</p>
    <p><a href='https://www.muraldaescola.com.br/'>ACESSAR A PLATAFORMA</a></p>   
	</body>";

    $destinatario = $email;
    $cabeca = "MURAL DA ESCOLA";
    $e = mail($destinatario, $cabeca, $mensagem, $headers);
    //var_dump($e);
    //echo $mensagem;
}
