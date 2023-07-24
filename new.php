<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
// require "../../connect/connect.php";
include('config.php');
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['announcement_title']) && !empty($_POST['description']) && !empty($_POST['skills_required']) && !empty($_POST['location']) && !empty($_POST['start_date']) && !empty($_POST['duration']) && !empty($_POST['branch']) && !empty($_POST['work_type']) && !empty($_POST['stipend_type']) && !empty($_POST['work_location']) && !empty($_POST['perks'])) {
    $announcement_title = $_POST['announcement_title'];
    $description = $_POST['description'];
    $skills_required = $_POST['skills_required'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $duration = $_POST['duration'];
    $branch = $_POST['branch'];
    $work_type = $_POST['work_type'];
    $stipend_type = $_POST['stipend_type'];
    $stipend = $_POST['stipend'];
    $work_location = $_POST['work_location'];
    $perks = $_POST['perks'];

    $query = "insert into new_annoucement(announcement_title,description, skills_required, location, start_date, duration, branch, work_type, stipend_type, stipend, work_location, perks ) values('$announcement_title', ' $description', '$skills_required', '$location', '$start_date', '$duration', '$branch', '$work_type', '$stipend_type', '$stipend', '$work_location', '$perks') ";
    if(mysqli_query($con, $query))
    {
        return true;
        die;
    }else{
        echo "error". mysqli_error($con);
    }
  

}
else{echo "empty";
}
?>

<!-- Auth -->

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>New Announcement</p>
    </div>
    <div class="container my-3" id="content">
        <div class="bg-light p-5 rounded">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">

                <div class="col-12">

                    <strong for="Title" class="form-label">Announcement Title</strong>
                    <br>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="announcement_title"
                        id="Title" placeholder="e.g. ABC pvt. ltd. hiring interns for XYZ fields....">
                </div>
                <br>

                <div class="mb-3">
                    <label for="Description" class="form-label">
                        <strong>
                            Description
                        </strong>

                    </label>
                    <br>

                    <textarea class="form-control" id="Description" rows="10"
                        placeholder="Description Of Announcement" name = "description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">
                        <strong>
                            Skills required
                        </strong>

                    </label>
                    <br>
                    <textarea class="form-control" id="skills" rows="2"
                        placeholder="e.g. AutoCAD, JAVA, Web development, PCB Designing, etc..." name = "skills_required"></textarea>
                </div>
                <div class="col-12">
                    <strong for="Location" class="form-label">Location</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off"
                        name="location" id="Location" placeholder="e.g. Raigad,Panvel">
                </div>
                <br>

                <div class="col-12">
                    <strong for="startDate" class="form-label">Start Date</strong>
                    <input id="startDate" class="form-control" type="date" name = "start_date" />

                </div>
                <br>
                <div class="col-12">

                    <strong for="Duration" class="form-label">Duration</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off"
                        name="duration" id="Duration" placeholder="Number (In Months)">
                </div>
                <br>

                <div class="form-group">
                    <label><strong>Branch :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="ECS" />
                        <span class="form-check-label">ECS</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="CS" />
                        <span class="form-check-label">CS</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="IT" />
                        <span class="form-check-label">IT</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="MECH" />
                        <span class="form-check-label">MECH</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="AUTO" />
                        <span class="form-check-label">AUTO</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="branch" value="All" />
                        <span class="form-check-label">All Branches</span>
                    </label>

                </div>
                <div class="form-group">
                    <label><strong>Work type :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_type" value="Paid" />
                        <span class="form-check-label"> Paid </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_type" value="UnPaid" />
                        <span class="form-check-label"> Unpaid </span>
                    </label>
                </div>
                <div class="form-group">
                    <label><strong>Stipend type :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stipend_type" value="Paid" />
                        <span class="form-check-label"> Lumpsum (After Internship Duration)</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stipend_type" value="UnPaid" />
                        <span class="form-check-label"> Monthly </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stipend_type" value="UnPaid" />
                        <span class="form-check-label"> Unpaid </span>
                    </label>
                </div>
                <div class="col-12">

                    <strong for="Stipend" class="form-label">Stipend</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off"
                        name="stipend" id="Stipend" placeholder="(In Rupees)">
                </div>
                <div class="form-group">
                    <label><strong>Work Location :</strong></label>
                    <br>
                    <br>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_location" value="WFH" />
                        <span class="form-check-label"> Work From Home</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_location" value="Hybrid" />
                        <span class="form-check-label"> Hybrid </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="work_location" value="OnSite" />
                        <span class="form-check-label"> On-site </span>
                    </label>
                </div>
                <div class="col-12">
                    <strong for="Perks" class="form-label">Perks</strong>
                    <br>

                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="perks"
                        id="Perks" placeholder="e.g. Certificate, Letter Of Recommendation, Flexible timings, etc...">
                </div>
                <br>
                <div class="container text-center">
                    <div class="row mx-auto">
                        <div class="col mt-5">
                            <button onclick= "alert()" class="btn btn-warning btn-lg col-md-12" role="button">Add Announcement</button>
                        </div>

                    </div>
                </div>



            </form>
        </div>
    </div>

<script>
        function alert() {
            alert("New Announcement Added Successfully!");
        }
</script>



</body>

</html>