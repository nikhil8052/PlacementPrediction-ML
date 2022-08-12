<?php
session_start();
session_unset();
session_destroy();
include("./components/topbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Prediction</title>

    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/index.css">

</head>

<body>



    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <img src="./images/teacher1.webp" class="img-fluid" alt="">
            </div>
            <div class="col-md-4 toptext">
                <h4>
                    Predict Your Placement based on your current score and make yourself ready with us.
                </h4>
                <a class="btn unacadmy " href="http://localhost/placement_prediction/predict.php">  Predict Now </a>
            </div>
        </div>
    </div>
    <?php include('./components/aboutus.php'); 
     include('./components/footer.php');?>
   



    <!-- LINKS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> -->


</body>

</html>