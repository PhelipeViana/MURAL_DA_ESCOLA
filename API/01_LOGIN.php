<?php

$login = noInjection($_REQUEST['login']);
$login = strtolower($login);

$senha = noInjection($_REQUEST['senha']);
$senha_db=md5($senha);

$sql = "SELECT * FROM `acesso` WHERE `login_acesso`='$login' AND `senha_acesso`='$senha_db'";
$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);
$row = mysqli_fetch_assoc($exe);
$TOKEN = $row['token_acesso'];
$ACESSO = $row['tipo_acesso'];


if ($num > 0) {
    echo json_encode(['msg' => 'sucesso','token'=>$TOKEN ,'acesso'=>$ACESSO,'st'=>1]);
} else {
    echo json_encode(['msg' => 'login e senha errado', 'st' => 0]);
}
