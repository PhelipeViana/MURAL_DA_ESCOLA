<?php
$ID_RESUL_PROJETO = noInjection($_REQUEST['p1']);

$sql = "SELECT * FROM `resultado_projeto_aluno` WHERE `idresprojaluno`=$ID_RESUL_PROJETO";

$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);

$GABARITO;
while ($row = mysqli_fetch_assoc($exe)) {
    $row['caderno_de_prova'] = json_decode($row['caderno_de_prova']);
    $GABARITO = $row['REF_PROJ'];
    $dados[] = $row;
}
$sql_gabarito = "SELECT * FROM `gabarito_quiz` WHERE `REF_PROJETO`='$GABARITO' and `REF_ALUNO`='$TOKEN_USER'";

$exe_gab = mysqli_query($conn, $sql_gabarito);

while ($r = mysqli_fetch_assoc($exe_gab)) {

    $dados['RESPOSTAS'][] = $r;
}
echo json_encode($dados);
