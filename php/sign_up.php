<?php

include("../database/db_config.php");


if (isset($_REQUEST['data'])) {

    $json = array();
    $data = $_REQUEST['data'];
    $email = $data['email'];
    $password = $data['password'];
    $name = $data['name'];
    $unique_id = uniqid();

    $q = "insert into user_login values('$email','$password','$name','$unique_id')";
    $result = $conn->query($q);

    if ($result) {
        $json['inserted'] = 1;
    } else {
        $json['inserted'] = 0;
    }

    echo json_encode($json);
}
