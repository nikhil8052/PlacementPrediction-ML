<?php

include("../database/db_config.php");


if (isset($_REQUEST['data'])) {

    $json = array();
    $data = $_REQUEST['data'];
    $email = $data['email'];
    $password = $data['password'];

    $q = "select * from user_login where email='" . $email . "' and password='" . $password . "'";
    $result = $conn->query($q);

    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $json['valid'] = 1;
            $result=mysqli_fetch_assoc($result);
            $json['token']=$result['unique_id'];
        }
        // echo $count;
    } else {
        $json['valid'] = 0;
    }

    echo json_encode($json);
}
