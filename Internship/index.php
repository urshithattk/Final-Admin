<?php
$title = "Dashboard";
$style = "./index.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Apply for Internship</p>
    </div>
    <div class="alert alert-success container col-8" role="alert">
        <h2 class="alert-heading">Successfully applied for XYZ pvt ltd.</h2>
        <hr>
        <p>You have successfully registered for 
            <b>XYZ pvt ltd</b> . Please keep checking your mes email inbox for further updates. 
        </p>
       
    </div>
    <div class="alert alert-warning container col-8" role="alert">
        <h2 class="alert-heading">Cannot apply for this internship!</h2>
        <hr>
        <p> 
            <b>Please upload your previous completion certificate.</b> 
            <br>
            To apply for this internship please upload your previous completion certificate or contact TPO. 
        </p>
       
    </div>
    <div class="container my-3 text-justify" id="content">
        <div class="bg-light p-5 rounded">


            <p class="h3 ">SportsKeeda is now hiring interns for content writing.</p>
            <br>
            <p class="lead">
                Sportskeeda is looking for editing interns to join its team. They will start with the designation of
                'Junior Editor Intern' and get promoted to 'Editor' after three months of theoretical and on-the-job
                training.

                We're looking for applicants who can commit to working with us for 6-7 hours a day for at least 6
                months. You will be part of the team that edits and publishes highly engaging sports content from
                writers across the world. We operate in an extremely competitive environment where quality and being
                first to market are paramount.

                Sportskeeda is home to engaging and premium sports content. It is one of the largest sports content
                platforms in the world, connecting journalists, pundits, and experts with millions of sports readers
                every day. Working here is a great way to further your journalistic career in sports.
            </p>
            <br>
            <div>
                <p class="h5">
                    Duration
                </p>
                <p class="lead">
                    <small>
                        3 Months
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
                        11/10/2022
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

                        Content Writing,
                        Copywriting,
                        English Proficiency (Spoken),
                        English Proficiency (Written),
                        Proofreading.
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
                        All Branches
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
                        Raigad,Panvel.
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
                        Paid
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
                        On-site
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
                        Monthly
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
                        5000-10000
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
                            Certificate,
                            Letter of recommendation,
                            free snacks
                        </b>
                    </small>
                </p>
            </div>
            <br>
            <div class="col d-flex align-items-center justify-content-center">
                <a href="../staff/edit.php" class="btn btn-warning btn-lg col col-lg-2 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" role="button" aria-disabled="true">
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
            </div>
            <br>
            <div class="col d-flex align-items-center justify-content-center">
                <button href="../student/apply.php" class="btn btn-warning btn-lg col col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" disabled role="button" aria-disabled="true">
                    <div>
                        Apply Now
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                    </svg>
                </button>
            </div>
            <br>
            <div class="col d-flex align-items-center justify-content-center">
                <button disabled class="btn btn-secondary btn-lg col col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-evenly" role="button" aria-disabled="true">
                    <div>
                        Applied
                    </div>
                </button>
            </div>
        </div>
    </div>

</body>

</html>