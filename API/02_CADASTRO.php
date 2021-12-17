<?php
$ERROR = [];
$nome = noInjection($_REQUEST['nome']);
$nome = nomeCase($nome);
if (empty($nome)) {
    $ERROR[] = 'NOME INVÁLIDO';
}

$email = noInjection($_REQUEST['email']);
$email = strtolower($email);
if (!isEmail($email) || empty($email)) {
    $ERROR[] = 'EMAIL INVÁLIDO';
}
$estado = noInjection($_REQUEST['estado']);


$cidade = noInjection($_REQUEST['cidade']);
$tipo = noInjection($_REQUEST['tipo']);
if (empty($tipo) || !is_numeric($tipo)) {
    $tipo = 1;
}
$telefone = noInjection($_REQUEST['telefone']);
if (empty($telefone)) {
    $ERROR[] = 'TELEFONE INVÁLIDO';
}

$TOKEN_NOVO = md5($email);
$primeira_senha = GerarSenha();
$senha_db = md5($primeira_senha);
if (empty($ERROR)) {
    $sql = "INSERT INTO `acesso` 
    (`token_acesso`, `login_acesso`, `senha_acesso`, `tipo_acesso`) VALUES 
    ('$TOKEN_NOVO','$email','$senha_db','$tipo')";
    $exe = mysqli_query($conn, $sql);
    if ($exe) {
        $exe = 1;
        $sql_dados = "INSERT INTO `dados`(`REF_TOKEN`, `nome`, `email`, `estado`, `cidade`, `telefone`) VALUES 
 ('$TOKEN_NOVO','$nome','$email','$estado','$cidade','$telefone')";
        $exe_dados = mysqli_query($conn, $sql_dados);
    } else {
        $exe = 2;
    }
    echo json_encode(['st' => $exe, 'senha' => $primeira_senha, 'login' => $email]);
} else {
    echo json_encode(['st' => 0, 'error' => $ERROR]);
}
