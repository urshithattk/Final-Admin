<?php
$title = "Dashboard";
$style = "./styles/global.css";
$favicon = "../../assets/favicon.ico";
include_once("../../components/head.php");
include_once("../../connect/connect.php");
// Retrieve data from the database

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$per_page_record = 20; // Number of records to display per page
$start = ($page - 1) * $per_page_record;

// Search functionality
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$searchedData = [];
// Count total records for pagination
$total_records_sql = "SELECT COUNT(*) AS count FROM new_annoucement";
$total_records_result = $db_connection->query($total_records_sql);

if (!$total_records_result) {
    die("Query execution failed: " . $db_connection->error);
}

$total_records = $total_records_result->fetch_assoc()['count'];
$total_pages = ceil($total_records / $per_page_record);
$end = $start + $per_page_record;

$search = isset($_GET["search"]) ? $_GET["search"] : '';
// $sql = "SELECT * FROM new_annoucement WHERE (announcement_id LIKE '%$search%' OR announcement_title LIKE '%$search%') LIMIT $start, $per_page_record";
$sql = "SELECT * FROM new_annoucement WHERE status = 'active' AND (announcement_id LIKE '%$search%' OR announcement_title LIKE '%$search%')";


$result = $db_connection->query($sql);
if (!$result) {
    die("Query execution failed: " . $db_connection->error);
}
//$sql = "SELECT * FROM feedback WHERE status = 'approved' AND (id LIKE '%$search%' OR announcement_title LIKE '%$search%')";
//$result = $conn->query($sql);

// Close the database connection
$db_connection->close();
?>

<body>
    <style>
        .company-link {
    text-decoration: none;
    color: #0f1142;
    font-weight: bold;
}

    </style>
    <?php include_once("../../components/navbar/index.php"); ?>
    <div class="container my-2 greet">
        <p>Active Internships</p>
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
            <th scope="col">ID</th>
            <th scope="col">Company</th>
            <th scope="col">Start Date</th>
            <th scope="col">Duration</th>
            <th scope="col">Download</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Output row data
                echo "<tr>";
                echo "<td class='text-center'>" . $row["announcement_id"] . "</td>";
                echo "<td class='text-center'><a href='./index copy.php?announcement_title=" . urlencode($row["announcement_title"]) . "' class='company-link'>" . $row["announcement_title"] . "</a></td>";
                echo "<td class='text-center'>" . $row["start_date"] . "</td>";
                echo "<td class='text-center'>" . $row["duration"] . "</td>";
                echo "<td class='text-center'><a href='./active_process.php?announcement_id=" . urlencode($row["announcement_id"]) ."' class='btn btn-primary ' role='button'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'><path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/><path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/></svg></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td class='text-center' colspan='5'>No records found.</td></tr>";
        }
        ?>
    </tbody>
</table>
        <br>
        <!-- Pagination code here -->
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page < 2) echo "disabled"; ?>">
                <a class="page-link" href="./active.php?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>" tabindex="-1">Previous</a>
            </li>
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink = "<li class='page-item active'><a class='page-link' href='./active.php?page=$i&search=$search'>" . $i . "</a></li>";
                } else {
                    $pagLink = "<li class='page-item'><a class='page-link' href='./active.php?page=$i&search=$search'>" . $i . "</a></li>";
                }
                echo $pagLink;
            }
            ?>
            <li class="page-item <?php if ($page == $total_pages) echo "disabled"; ?>">
                <a class="page-link" href="./active.php?page=<?php if ($page < $total_pages) echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
            </li>
        </ul>
    </nav>
    </div>
</body>

</html>