<?php
// Load the database configuration file
include "config.php";

// Filter the excel data
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Fetch records from database
$data_search = "SELECT id, student_name, company_name, admission_no, contact_no, student_location, action, cv_file FROM `applications`";
$query = mysqli_query($con, $data_search);

// Check if query executed successfully
if ($query) {
    // Excel file name for download
    $fileName = "registered-applicants_" . date('Y-m-d') . ".xls";

    // Column names
    $fields = array('ID', 'Applicant Name', 'Admission No', 'Contact No','Location','Resume Link', 'Applied At');

    // Display column names as first row
    $excelData = implode("\t", array_values($fields)) . "\n";

    if (mysqli_num_rows($query) > 0) {
        // Output each row of the data
        while ($row = mysqli_fetch_assoc($query)) {
            $resumeLink = "../student/CV_Uploads/" . $row['cv_file'];
            $resumeLinkHtml = $resumeLink ? '<a href="' . $resumeLink . '" target="_blank">Link</a>' : '';
            $lineData = array(
                $row['id'],
                $row['student_name'],
                $row['admission_no'],
                $row['contact_no'],
                $row['student_location'],
                $resumeLinkHtml,
                $row['company_name'],
                $row['action'],
            );
            array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }
    } else {
        $excelData .= 'No records found...' . "\n";
    }

    // Headers for download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    // Render excel data
    echo $excelData;
} else {
    echo "Query execution failed.";
}
?>