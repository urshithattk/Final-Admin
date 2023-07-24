<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
include('config.php');
?>

<body>
    <?php
    include_once("../../components/navbar/index.php");

    ?>
    <div class="container my-2 greet">
        <p>Custom Letter Addressing</p>
    </div>
    <div class="container my-3" id="content">
        <div class="bg-light p-5 rounded">
            <form class="row g-3" action="trail.php" method="POST">

                <div class="col-12">
                    
                    <strong for="Title" class="form-label">Company name</strong>
                    <br>
                    <input type="text" class="form-control" spellcheck="false" required autocomplete="on" name="company" id="Title" placeholder="e.g. ABC pvt. ltd. hiring interns for XYZ fields....">
                
                </div>
                <br>
                <div class="col-12">
                   
                    <strong for="Stipend" class="form-label">Address To</strong>
                    <br>
                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="authority" id="Stipend" placeholder="e.g. General Manager, Director, Office in-charge">
                
                </div>
                <div class="col-12">
                  
                    <strong for="Duration" class="form-label">Name </small> </strong>
                    <br>
                    <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="name" id="name" placeholder="e.g. Mahesh Sharma">
               
                </div>
                <br>
                <!-- <div class='col-12'>
                <strong for="nos_candidates" class="form-label">Number Of Students: </small> </strong><br>
                    <input type="radio" name="numbers" value="i">individual
                    <br>
                    <input type="radio" name="numbers" value="g">Group

                </div> -->



                <br>               
                <div class="container text-center">
                    <div class="row mx-auto">
                        <div class="col mt-5">
                            <button class="btn btn-success btn-lg col-md-12" role="button"> <a href="../../components/internshipLetter/LetterOne.php" style='text-decoration:none;color:white;'>Generate Letter</a> </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>





</body>

</html>