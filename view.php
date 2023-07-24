<?php
$title = "Dashboard";
$style = "./index.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
require "config.php";

if(isset($_GET['id'])) {
    // Retrieve the company name from the URL
    $id = $_GET['id'];

    // Query to fetch the specific announcement based on the company name
    $query = "SELECT * FROM new_annoucement WHERE announcement_id = '$id'";

    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query execution error: ' . mysqli_error($con));
    }

    // Check if a row is found
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Extract the information from the row
        $announcement_title = $row["announcement_title"];
        $description = $row["description"];
        $duration = $row["duration"];
        $start_date = $row["start_date"];
        $skills_required = $row["skills_required"];
        $branch = $row["branch"];
        $location = $row["location"];
        $work_type = $row["work_type"];
        $work_location = $row["work_location"];
        $stipend_type = $row["stipend_type"];
        $stipend = $row["stipend"];
        $perks = $row["perks"];
    } else {
        // No announcement found with the specified company name, handle accordingly
        echo "Announcement not found.";
        exit;
    }
} else {
    // Company parameter not present in the URL, handle accordingly
    echo "Invalid request.";
    exit;
}
?>

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
  
    <div class="container my-3 text-justify" id="content">
        <div class="bg-light p-5 rounded">


            <p class="h3 "><?php echo $announcement_title; ?></p>
            <br>
            <p class="lead">
            <?php echo $description; ?>
            </p>
            <br>
            <div>
                <p class="h5">
                    Announcement Title
                </p>
                <p class="lead">
                    <small>
                    <?php echo $announcement_title; ?>
                    </small>
                </p>
            </div>
            <div>
                <p class="h5">
                    Duration
                </p>
                <p class="lead">
                    <small>
                    <?php echo $duration; ?>
                    </small>
                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Start Date
                </p>
                <p class="lead">

                    <small>
                    <?php echo $start_date; ?>
                    </small>

                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Skills Required
                </p>
                <p class="lead">
                    <small>

                    <?php echo $skills_required; ?>
                    </small>
                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Open for Branches
                </p>
                <p class="lead">
                    <small>
                    <?php echo $branch; ?>
                    </small>
                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Location
                </p>
                <p class="lead">
                    <small>
                    <?php echo $location; ?>
                        
                    </small>
                </p>
            </div>

            <br>
            <div>
                <p class="h5">
                    Work Type
                </p>
                <p class="lead">
                    <small>
                    <?php echo $work_type; ?>
                    </small>
                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Work Location
                </p>
                <p class="lead">
                    <small>
                    <?php echo $work_location; ?>
                    </small>
                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Stipend Type
                </p>
                <p class="lead">
                    <small>
                    <?php echo $stipend_type; ?>
                    </small>
                </p>
            </div>


            <br>
            <div>
                <p class="h5">
                    Stipend
                </p>
                <p class="lead">
                    &#x20b9;
                    <strong>
                    <?php echo $stipend; ?>
                    </strong>
                    <strong>/ Month</strong>

                </p>
            </div>
            <br>
            <div>
                <p class="h5">
                    Perks
                </p>
                <p class="lead text-muted">
                    <small>
                        <b>
                        <?php echo $perks; ?>
                        </b>
                    </small>
                </p>
            </div>
            <br>
            <!--<div class="col d-flex align-items-center justify-content-center">
                <a href="../staff/edit.php?id=<//?php echo $id; ?>" class="btn btn-warning btn-lg col col-lg-2 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" role="button" aria-disabled="true">
                    <div>
                        Edit
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                    </svg>
                </a>
            </div>
            <br>
            <div class="col d-flex align-items-center justify-content-center">
                <a href="../student/apply.php" class="btn btn-primary btn-lg col col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" role="button" aria-disabled="true">
                    <div>
                        Apply Now
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                    </svg>
                </a>
            </div>-->
            <!-- <br> -->
            <!-- <div class="col d-flex align-items-center justify-content-center">
                <button href="../student/apply.php" class="btn btn-warning btn-lg col col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" disabled role="button" aria-disabled="true">
                    <div>
                        Apply Now
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                    </svg>
                </button>
            </div> -->
            <!-- <br> -->
            <!-- <div class="col d-flex align-items-center justify-content-center">
                <button disabled class="btn btn-secondary btn-lg col col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" role="button" aria-disabled="true">
                    <div>
                        Applied
                    </div>
                </button>
            </div> -->
        </div>
        <div class="container">
        <div class="response-box">
            <div style="text-align: center;">
                
                <a href="./previous.php" class="btn btn-primary btn-sm col-md-2 p-sm-4" role="button">Go Back</a>
            </div>
        </div>
    </div>
    </div>
    

</body>

</html>