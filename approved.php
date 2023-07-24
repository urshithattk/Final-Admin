<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
include_once("../../connect/connect.php");

// Retrieve data from the database
$search = isset($_GET["search"]) ? $_GET["search"] : '';

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$per_page_record = 20; // Number of records to display per page
$start = ($page - 1) * $per_page_record;

// Search functionality
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$searchedData = [];
// Count total records for pagination
$total_records_sql = "SELECT COUNT(*) AS count FROM internship_applications WHERE Status = 'approved' AND (ID LIKE '%$search%' OR CompanyName LIKE '%$search%')";
$total_records_result = $db_connection->query($total_records_sql);

if (!$total_records_result) {
    die("Query execution failed: " . $db_connection->error);
}

$total_records = $total_records_result->fetch_assoc()['count'];
$total_pages = ceil($total_records / $per_page_record);
$end = $start + $per_page_record;

$sql = "SELECT * FROM internship_applications WHERE Status = 'approved' AND (ID LIKE '%$search%' OR CompanyName LIKE '%$search%') LIMIT $start, $per_page_record";
$result = $db_connection->query($sql);

if (!$result) {
    die("Query execution failed: " . $db_connection->error);
}

// Close the database connection
$db_connection->close();
?>

<body>
    <?php include_once("../../components/navbar/index.php"); ?>
    <div class="container my-2 greet">
        <p>Approved Applications</p>
        <!-- Search Button -->
        <form class="row g-3" method="GET">
            <div class="col-auto">
                <input class="form-control" id="search" name="search" placeholder="ID or Company Name" value="<?php echo $search; ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
        </form>
    </div>
    <div class="container mt-2 table-responsive-sm">
        <table class="table table-bordered table-light table-sm">
    <thead class="thead-light text-center">
        <tr>
            <!-- ... -->
            <th scope="col">ID</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Location</th>
                    <th scope="col">Application Date</th>
                    <!--<th scope="col">Approved On</th>-->
                    <th scope="col">Comment</th>
                    <th scope="col">View Letter</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Output row data
                echo "<tr>";
                // ... (existing code to display table data)
                                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["CompanyName"] . "</td>";
                        echo "<td>" . $row["StudentName"] . "</td>";
                        echo "<td>" . $row["Location"] . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
                        // echo "<td>" . $row["comment"] . "</td>";
                        //echo "<td>" . $row["approvedOn"] . "</td>";
                        echo "<td>" . $row["Comment"] . "</td>";

                // echo "<td class='pt-3 text-center'>";
               // echo "<a href='./letter.php?ID=" . $row["ID"] . "' target='_blank' class='btn btn-warning'>";
                if (!empty($row["StudentName"])) {
            echo "<td class='pt-3 text-center'>";
            echo "<a href='./LetterOne.php?ID=" . $row["ID"] . "' target='_blank' class='btn btn-warning'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>";
            echo "<path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' />";
            echo "<path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' />";
            echo "</svg>";
            echo "</a>";
            echo "</td>";
        } else {
            echo "<td class='pt-3 text-center'>";
            echo "<a href='./LetterTwo.php?ID=" . $row["ID"] . "' target='_blank' class='btn btn-warning'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>";
            echo "<path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' />";
            echo "<path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' />";
            echo "</svg>";
            echo "</a>";
            echo "</td>";
        }
                // echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>";
                // echo "<path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' />";
                // echo "<path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' />";
                // echo "</svg>";
                // echo "</a>";
                // echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No records found.</td></tr>";
        }
        ?>
    </tbody>
</table>
        <br>
        <!-- Pagination code here -->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page < 2) echo "disabled"; ?>">
                <a class="page-link" href="./approved.php?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>" tabindex="-1">Previous</a>
            </li>
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink = "<li class='page-item active'><a class='page-link' href='./approved.php?page=$i&search=$search'>" . $i . "</a></li>";
                } else {
                    $pagLink = "<li class='page-item'><a class='page-link' href='./approved.php?page=$i&search=$search'>" . $i . "</a></li>";
                }
                echo $pagLink;
            }
            ?>
            <li class="page-item <?php if ($page == $total_pages) echo "disabled"; ?>">
                <a class="page-link" href="./approved.php?page=<?php if ($page < $total_pages) echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
            </li>
        </ul>
    </nav>
    </div>
</body>

</html>