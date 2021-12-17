<?php
$COR = $_REQUEST['p1'];

$sql = "UPDATE `acesso` SET cor_sistema='$COR' WHERE `token_acesso`='$TOKEN_USER'";
$exe = mysqli_query($conn, $sql);


if ($exe) {
    echo json_encode(['cor' => $COR, 'st' => 1]);
} else {
    echo json_encode(['cor' => $COR, 'st' => 0]);
}
