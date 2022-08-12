<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 topbar">
            <h3 class="logo"> Placement Prediction</h3>
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            ?>
                <a href="http://localhost/placement_prediction/" class="btn  btn-sm gc" style="float: right !important ; margin-top: -40px !important;">Log Out</a>

            <?php } else { ?>
                session_start();
                <a href="http://localhost/placement_prediction/signup.php" class="btn  btn-sm gc" style="float: right !important ; margin-top: -40px;margin-right:70px">Register</a>
                <a href="http://localhost/placement_prediction/login.php" class="btn  btn-sm gc" style="float: right !important ; margin-top: -40px;">Sign In</a>

            <?php } ?>
        </div>
    </div>
</div>