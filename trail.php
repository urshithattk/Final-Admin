<?php
include('config.php');

// Construct the SQL query for INNER JOIN
// $sql = "SELECT DISTINCT applicant_details.ID, applicant_details.name, applicant_details.email_id, applicant_details.semester, applicant_details.branch, new_application.na_companyname,new_application.user_id
//         FROM internshipportal.applicant_details 
//         , internship_portal.new_application";

//  $sql = "SELECT DISTINCT applicant_details.ID, applicant_details.name, applicant_details.email_id, applicant_details.semester, applicant_details.branch, new_application.na_companyname, new_application.user_id
//         FROM internshipportal.applicant_details
//         INNER JOIN internship_portal.new_application ON applicant_details.email_id = new_application.user_id";

$sql = "SELECT applicant_details.ID, applicant_details.name, applicant_details.email_id, applicant_details.semester, applicant_details.branch, new_application.na_companyname, new_application.user_id
        FROM internshipportal.applicant_details
        INNER JOIN internship_portal.new_application ON applicant_details.ID = new_application.user_id
        GROUP BY applicant_details.ID, applicant_details.name, applicant_details.email_id, applicant_details.semester, applicant_details.branch, new_application.na_companyname, new_application.user_id";



$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <a href="export.php"><button type="button" class="btn btn-primary">Export</button></a>
</div>
                    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Admission No.</th>
                <th scope="col">Student name</th>
                <th scope="col">Email</th>
                <th scope="col">Branch</th>
                <th scope="col">Semester</th>
                <th scope="col">Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>
                        <td><?php echo $row['branch']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['resume']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
// Close the database connection
$con->close();
?>
