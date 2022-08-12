<?php

   session_start();
   if(isset($_SESSION['login']) && $_SESSION['login']==true){
    $token=$_SESSION['token'];
    header("Location: http://localhost/placement_prediction/predict.php?token=".$token);
    die();
   } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6 card mt-4 p-3 bs">
                <form preventDefault>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button  class="btn btn-primary btn-sm mr-1" onclick="loginClicked(this)">Log In</button>
                    <a  class="btn btn-primary btn-sm" href="http://localhost/placement_prediction/signup.php">Sign Up</a>
                </form>
            </div>
            <div class="col-md-3"> </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>