<?php
// Db connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "internshipportal";

include 'config.php';

// $conn = new mysqli($servername, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Retrieving company name 
$companyName = isset($_GET["company"]) ? $_GET["company"] : '';

//inner join
// $sql = "SELECT applications.StudentName, applications.Major
//         FROM applications
//         INNER JOIN companies ON applications.IDs = companies.IDs
//         WHERE companies.CompanyName = '$companyName'";



$sql = "SELECT student_name,admission_no,contact_no,student_location FROM applications
        WHERE company_name = '$companyName'";


$result = $con->query($sql);


if ($result === false) {
    die("Error executing the query: " . $con->error);
}

//csv
$filename = $companyName.'_applications.csv';
$file = fopen($filename, 'w');


fputcsv($file, array('Student Name','Major'));


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }
}


fclose($file);


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $filename);
header('Pragma: no-cache');
header('Expires: 0');


readfile($filename);


unlink($filename);


$con->close();
?>
