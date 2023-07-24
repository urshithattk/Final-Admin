<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
include "config.php";

// Pagination
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$id = isset($_GET['id']) ? $_GET['id'] : null;

$per_page_record = 10; // limit
$start_from = ($page - 1) * $per_page_record;
$data_search = "SELECT * FROM applications WHERE announcement_id = $id LIMIT $start_from, $per_page_record";
$query = mysqli_query($con, $data_search);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'action_') === 0) {
            $id = substr($key, strlen('action_'));
            $action = $value;

            $updateQuery = "UPDATE applications SET action = '$action' WHERE id = $id";
            mysqli_query($con, $updateQuery);
        }
    }
}
?>

<!-- Auth -->
<body>
    <?php
    include_once("../../components/navbar/index.php");
    ?>
    <div class="container my-2 greet">
        <p>Registered Applicants</p>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered table-dark table-sm">
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Applicant Name</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($query)){
                    $id = $row['id'];
                    $name = $row['student_name'];
                    $resume = $row['cv_file'];
                    $resumeLink ="../student/CV_Uploads/" . $resume; 
                    $action = $row['action'];
                ?>
                <tr class="table-light">
                    <th class="pt-3 text-center text-danger" scope="row">
                        <?php echo $id; ?>
                    </th>
                    <td class="pt-3" scope="row">
                        <?php echo $name; ?>
                    </td>
                    <td class="pt-3 text-center">
                        <a href="<?php echo $resumeLink; ?>" target="_blank" class="btn btn-primary" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                    </a>
                    </td>
                    <td class="text-center">

                        <?php  echo $action;  ?>



                        <!-- <?php if ($action) : ?>
                            <p style="color: <?php echo ($action === 'Approved') ? 'green' : 'red'; ?>">
                            <?php echo $action; ?></p>
                        <?php else : ?>
                            <form class="action-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                <input type="hidden" name="applicant_id" value="<?php echo $id; ?>">
                                <select name="action_<?php echo $id; ?>">
                                    <option value="Approved">Approve</option>
                                    <option value="Rejected">Reject</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            
                        <?php endif; ?> -->
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        <br>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <!-- Pagination logic goes here -->
                <?php
                    $total_records_query = "SELECT COUNT(*) AS total FROM applications";
                    $total_records_result = mysqli_query($con, $total_records_query);
                    $total_records_row = mysqli_fetch_assoc($total_records_result);
                    $total_records = $total_records_row['total'];
                    
                    // Calculate total number of pages
                    $total_pages = ceil($total_records / $per_page_record);

                    // Display Previous button
                    if ($page > 1) {
                        echo "<li class='page-item'><a class='page-link' href='registrations.php?page=".($page - 1)."'>Previous</a></li>";
                    } else {
                        echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
                    }

                    // Determine the range of visible pages
                    $visiblePages = 5; // Adjust this value as needed
                    $halfVisible = floor($visiblePages / 2);
                    $start = max(1, $page - $halfVisible);
                    $end = min($start + $visiblePages - 1, $total_pages);

                    // Display ellipsis and first page link if necessary
                    if ($start > 1) {
                        echo "<li class='page-item'><a class='page-link' href='registrations.php?page=1'>1</a></li>";
                        if ($start > 2) {
                            echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                        }
                    }

                    // Display page links
                    for ($i = $start; $i <= $end; $i++) {
                        if ($i == $page) {
                            echo "<li class='page-item active'><a class='page-link' href='registrations.php?page=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='registrations.php?page=$i'>$i</a></li>";
                        }
                    }

                    // Display ellipsis and last page link if necessary
                    if ($end < $total_pages) {
                        if ($end < $total_pages - 1) {
                            echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                        }
                        echo "<li class='page-item'><a class='page-link' href='registrations.php?page=$total_pages'>$total_pages</a></li>";
                    }

                    // Display Next button
                    if ($page < $total_pages) {
                        echo "<li class='page-item'><a class='page-link' href='registrations.php?page=".($page + 1)."'>Next</a></li>";
                    } else {
                        echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
                    }
                    ?>
            </ul>
        </nav>
    </div>

    <script>
        // Hide the submit button and show the approved/rejected message
        function showActionMessage(form, action) {
            const select = form.querySelector('select');
            const submitButton = form.querySelector('button[type="submit"]');
            select.disabled = true;
            submitButton.disabled = true;
            submitButton.style.display = 'none';
            select.style.display = 'none';
            const message = document.createElement('p');
            message.textContent = action;
            message.style.color = (action === 'Approved') ? 'green' : 'red';
            form.appendChild(message);
        }

        // Add event listeners to each form
        const forms = document.querySelectorAll('.action-form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const select = this.querySelector('select');
                const action = select.value;

                // Send AJAX request to update the action in the database
                const xhr = new XMLHttpRequest();
                xhr.open('POST', this.action, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Request completed successfully
                        showActionMessage(form, action);
                    }
                };
                xhr.send('action_' + this.querySelector('input[name="applicant_id"]').value + '=' + action);
            });
        });
    </script>
</body>
</html>
