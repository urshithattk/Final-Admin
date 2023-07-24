
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>

<!-- <?php
// require './auth.php';
// ?> -->


<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>


    <div class="container my-2 greet">
        <p>Applications</p>
        <div class="col-md-8">
        </div>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./active.php" class="btn btn-primary btn-lg col-md-12 p-sm-4" role="button">Active Internships</a>
            </div>
            <div class="col my-3">
                <a href="./studentApplication.php" class="btn btn-warning btn-lg col-md-12 p-sm-4" role="button">Student
                    Applications</a>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./approved.php" class="btn btn-success btn-lg col-md-12 p-sm-4" role="button">Approved
                    Applications</a>
            </div>
            <div class="col my-3">
                <a href="./rejected.php" class="btn btn-danger btn-lg col-md-12 p-sm-4" role="button">Rejected
                    Applications</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-2 greet">
        <p>Announcements</p>
    </div>
    <div class="container text-center">
        <div class="row mx-auto">
            <div class="col mt-3">
                <a href="./new.php" class="btn btn-primary btn-lg col-md-12 p-sm-4" role="button">New
                    Announcements</a>
            </div>
            <div class="col my-3">
                <a href="./previous.php" class="btn btn-info btn-lg col-md-12 p-sm-4" role="button">Previous
                    Announcements</a>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <br>
    <br>



</body>

</html>