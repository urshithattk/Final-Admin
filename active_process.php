<?php
// Load the database configuration file
include "../../connect/connect.php";

$id = isset($_GET['announcement_id']) ? $_GET['announcement_id'] : null;

// Fetch company name from the database
$companyNameQuery = "SELECT company_name FROM `applications` WHERE announcement_id = $id LIMIT 1";
$companyNameResult = mysqli_query($db_connection, $companyNameQuery);
$companyName = "company-name"; // Default company name if not found in the database

if ($companyNameResult && mysqli_num_rows($companyNameResult) > 0) {
    $companyData = mysqli_fetch_assoc($companyNameResult);
    $companyName = $companyData['company_name'];
}

// Fetch records from the database
$data_search = "SELECT id, student_name, company_name, admission_no, contact_no, student_location, action, cv_file, resume FROM `applications` WHERE announcement_id = $id";
$query = mysqli_query($db_connection, $data_search);

// Check if the query executed successfully
if ($query) {
    // HTML content to create the Excel file
    $html = '<table>';
    $html .= '<tr><th>ID</th><th>Applicant Name</th><th>Admission No</th><th>Contact No</th><th>Location</th><th>Resume Link</th><th>Company Name</th><th>Action</th></tr>';

    if (mysqli_num_rows($query) > 0) {
        // Output each row of the data
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $studentName = $row['student_name'];
            $companyName = $row['company_name'];
            $admissionNo = $row['admission_no'];
            $contactNo = $row['contact_no'];
            $location = isset($row['location']) ? $row['location'] : '';
            $filename = $row['cv_file'];
            $action = $row['action'];

            // Generate the resume link using the actual URL to the resume file
            $resumeLink ="http://localhost/23-07/internship-portal-final/internship-portal/pages/student/CV_Uploads/" . $filename; // Replace this with the actual URL

            // Create a clickable hyperlink for the resume link
            $resumeLinkHtml = '<a href="' . $resumeLink . '" target="_blank">View Resume</a>';

            // Append the data to the HTML table
            $html .= '<tr>';
            $html .= '<td>' . $id . '</td>';
            $html .= '<td>' . $studentName . '</td>';
            $html .= '<td>' . $admissionNo . '</td>';
            $html .= '<td>' . $contactNo . '</td>';
            $html .= '<td>' . $location . '</td>';
            $html .= '<td>' . $resumeLinkHtml . '</td>';
            $html .= '<td>' . $companyName . '</td>';
            $html .= '<td>' . $action . '</td>';
            $html .= '</tr>';
        }
    } else {
        // If no data found, show a message
        $html .= '<tr><td colspan="8">No records found...</td></tr>';
    }

    $html .= '</table>';

    // Set headers to force download
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $companyName . 'applicants' . date('Y-m-d') . '.xls"');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Render HTML content as Excel file
    echo $html;
} else {
    echo "Query execution failed.";
}
?>