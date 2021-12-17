<?php

if (isset($_FILES['file']['name'])) {

    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "../DOC/" . $filename;
    $location_refer = "DOC/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $valid_extensions = array("jpg", "jpeg", "png");

    $response = 0;
    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = $location_refer;

            $sql = "UPDATE `acesso` SET avatar='$location_refer' WHERE `token_acesso`='$TOKEN_USER'";
            $exe = mysqli_query($conn, $sql);
        }
    }

    echo $response;

    exit;
}

echo 0;
