<?php

include("D:/xampp_php/htdocs/placement_prediction/database/db_config.php");

function validateToken($token)
{
    global $conn;
    $q = "select * from user_login where unique_id='" . $token . "'";
    $result = $conn->query($q);
    if ($result) {
        if (mysqli_num_rows($result) > 0) return true;
    } else {
        return false;
    }
}
