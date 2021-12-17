<?php
$nome = noInjection($_REQUEST['nome']);
$nome = nomeCase($nome);
$email = noInjection($_REQUEST['email']);
$email = strtolower($email);
$cpf = noInjection($_REQUEST['cpf']);
$estado = noInjection($_REQUEST['estado']);
$cidade = noInjection($_REQUEST['cidade']);
$telefone = noInjection($_REQUEST['telefone']);
$sexo = noInjection($_REQUEST['sexo']);




$sql = "SELECT login_acesso FROM `acesso` WHERE 
	token_acesso!='$TOKEN_USER' AND `login_acesso`='$email'";
$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);
if ($num > 0) {
    //email duplicado
    echo json_encode(['msg' => 'Email Duplicado', 'st' => 2]);
} else {
    $sql_email_acesso = "UPDATE `acesso` SET `login_acesso`='$email' 
    WHERE token_acesso='$TOKEN_USER'";
    $exe_acesso = mysqli_query($conn, $sql_email_acesso);
    //DADOS CADASTRAIS
    $sql_cadastral = "UPDATE `dados` SET 
    `nome`='$nome',
    sexo='$sexo',
    `cpf`='$cpf',
    `email`='$email',
    `estado`='$estado',
    `cidade`='$cidade',
    `telefone`='$telefone' WHERE `REF_TOKEN`='$TOKEN_USER'";
    $exe_cadastro = mysqli_query($conn, $sql_cadastral);

    echo json_encode(['msg' => 'sucesso', 'st' => 1]);
}
