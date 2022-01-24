<?php
$email = noInjection($_REQUEST['email']);
$email = strtolower($email);
$telefone = noInjection($_REQUEST['telefone']);

$senha1 = noInjection($_REQUEST['senha1']);
$senha2 = noInjection($_REQUEST['senha2']);
$nova_senha = md5($senha2);

if ($senha1 == $senha2) {
    $sql_verifica = "SELECT * FROM `dados` WHERE `email`='$email' and `telefone`='$telefone' limit 1";
    $exe_verifica = mysqli_query($conn, $sql_verifica);
    $existe = mysqli_num_rows($exe_verifica);
    $row = mysqli_fetch_assoc($exe_verifica);
    $TK = $row['REF_TOKEN'];
    if ($existe > 0) {
        $sql = "UPDATE `acesso` SET `senha_acesso`='$nova_senha' WHERE `token_acesso`='$TK'";
        $exe = mysqli_query($conn, $sql);
        if ($exe) {
            $exe = 1;
        } else {
            $exe = 0;
        }
        echo json_encode(['st' =>  $exe, 'msg' => 'Sucesso!']);
    } else {
        echo json_encode(['st' => 0, 'msg' => 'Usúario inválido!']);
    }
} else {
    echo json_encode(['st' => 0, 'msg' => 'Senha não confere']);
}
