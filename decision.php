<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
?>

<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Application ID :- 1143</p>
    </div>
    <div class="container my-3" id="content">
        <div class="bg-light p-5 rounded">
            <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <strong>

                            Comment
                        </strong>

                    </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"
                        placeholder="e.g.Please collect the approval letter from office"></textarea>
                </div>

                <div class="container text-center">
                    <div class="row mx-auto">
                        <div class="col mt-3">
                            <button class="btn btn-success btn-lg col-md-12 p-sm-4" role="button">Approve</button>
                        </div>
                        <div class="col my-3">
                            <button class="btn btn-danger btn-lg col-md-12 p-sm-4" role="button">Reject</button>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>





</body>

</html>