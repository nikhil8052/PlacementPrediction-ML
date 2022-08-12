<?php
session_start();
include("./helpers/global.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $flag = validateToken($token);
    if ($flag == true) {
        $_SESSION['login'] = true;
        $_SESSION['token'] = $token;
    } else {
        header("Location: http://localhost/placement_prediction/error.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predictor</title>

    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        include('./components/topbar.php');
    ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div id="valuesAlert" class="alert alert-primary w-70" role="alert" style="display: none ;">
                        Please Enter Values less than 100.
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="emptyAlert" class="alert alert-primary w-70" role="alert" style="display: none ;">
                        Values are Empty, Please fill the values first.
                    </div>
                </div>
            </div>

        </div>
        <!-- If user is logged in then display this code  -->
        <div class="container mt-3">

            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-11">
                                <h4 class="card-title">Predict With Us.</h4>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-dark" onclick="reset(this)" id='reset-btn'>Reset</button>

                            </div>
                        </div>


                        <div class="row">


                            <div class="col-md-6 border p-4 bs">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Secondary Percentile (10th % ) * </label>
                                    <input type="number" class="form-control" id="10p" aria-describedby="emailHelp" placeholder="10th % " required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senior Secondary Percentile (12th % ) * </label>
                                    <input type="number" class="form-control" id="12p" placeholder="12th % " required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Becholer's Degree Percentile (12th % ) * </label>
                                    <input type="number" class="form-control" id="collegep" placeholder="Bacholer's Percentage " required>
                                </div>

                                <button type="submit" onclick="predictClicked(this)" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6 border bs p-4 mm ">

                                <div class="row result-div">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 result-div ">
                                        <marquee behavior="" direction="">
                                            <h3 class="placed">Congraculations</h3>
                                        </marquee>
                                        <marquee behavior="" direction="">
                                            <h3 class="not-placed">Not Placed.</h3>
                                        </marquee>
                                        <div id="nosel">
                                            <img src="./images/recycle.png" class="" alt="">
                                            <h3>No data selected.</h3>
                                        </div>


                                        <div id="loading">
                                            <div class="spinner-grow text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-secondary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-success" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-danger" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-warning" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-info" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="spinner-grow text-light" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="./js/index.js"></script>

        <!-- Include the about us page  -->
        <?php include("./components/aboutus.php");
        include("./components/footer.php");
         ?>
        <script>
            function reset(e) {
                window.location.reload();
            }
        </script>

    <?php
    } else header("Location: http://localhost/placement_prediction/login.php"); ?>
</body>

</html>