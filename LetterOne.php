<?php
require '../../Libraries/fpdf/fpdf.php';

// Replace these with your database credentials
$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "internship_portal";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    // Display detailed error message
    die("Connection failed: " . $conn->connect_error . " (Error code: " . $conn->connect_errno . ")");
}

// Check if the 'ID' parameter is present in the URL
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Fetch the data for the given ID
    $tableName = 'internship_applications';
    $query = "SELECT * FROM $tableName WHERE ID = $id";
    $result = mysqli_query($conn, $query);

    if ($result && $result->num_rows > 0) {
        // Extract values from the fetched data
        $row = mysqli_fetch_assoc($result);
        $name = $row['StudentName'];
        $applicationID = $row['ID'];
        $company = $row['CompanyName'];
        $companyaddress = $row['CompanyAddress'];
        $start_date = $row['startDate'];
        $end_date = $row['endDate'];
        $year = $row['Year'];
        $branch = $row['branch'];
        $academicYear = $row['AcademicYear'];
        $date = $row['created_at'];
        $refrenceNumber = "CE/INTERN/" . sprintf("%04d", intval($row['ID'])) . "/" . date('Y') . "-" . (date('y') + 1);

        // Close the database connection
        $conn->close();

        // Create the PDF
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(30);
        $pdf->SetTopMargin(40);
        $pdf->AddPage();
        $pdf->SetFont('Times', '');
        $pdf->Cell(70, 20, "Ref. No.:" . $refrenceNumber, 0, 0, "L");
        $pdf->Cell(90, 20, $date, 0, 1, "R");
        $pdf->SetFont('Times', 'B');
        $pdf->Cell(60, 6, "Manager", 0, 1, "L");
        $pdf->SetFont('Times', '');
        $pdf->Cell(60, 6, $company, 0, 1, "L");
        $pdf->MultiCell(65, 6, $companyaddress . ",", 0, "L");
        // ... continue with the rest of the PDF content ...
         $pdf->SetFont('Times', 'B');
        $pdf->Cell(0, 5, "", 0, 1);
        $pdf->Cell(50, 15, "Subject :", 0, 0, "R");
        $pdf->SetFont('Times', 'BU');
        $pdf->Cell(80, 15, "Permission for Internship Training.", 0, 1, "L");
        $pdf->SetFont('Times', '');
        $pdf->Cell(70, 15, "Dear Sir,", 0, 1, "L");

        $pdf->Write(8, "With reference to above subject, we request you to permit our student ");
        $pdf->SetFont('Times', 'B');
        $pdf->Write(8, $name);
        $pdf->SetFont('Times', '');
        $pdf->Write(8, ", who has appeared for " . $year . " ");
        $pdf->SetFont('Times', 'B');
        $pdf->Write(8, $branch);
        $pdf->SetFont('Times', '');
        $pdf->Write(8, " examinations during a.y. " . $academicYear . " to undertake internship training in your esteemed organization during their vacation ");
        $pdf->SetFont('Times', '');
        $pdf->Write(8, $start_date . " to " . $end_date);
        $pdf->SetFont('Times', '');
        $pdf->Write(8, " and also on Saturdays, Sundays, and Public Holidays, as the case may be.");
        $pdf->Cell(0, 20, "", 0, 1);
        $pdf->Write(8, "We will be grateful if your esteemed organization would help us provide practical training for our student.");
        $pdf->Cell(0, 15, "", 0, 1);
        $pdf->Write(8, "This certificate is issued on the request of the student for Internship purposes.");
        $pdf->Cell(0, 15, "", 0, 1);

        $pdf->Cell(0, 10, "Thank you.", 0, 1);
        $pdf->Cell(0, 20, "Yours faithfully", 0, 1);

        // Send the PDF as a response to the browser
        $pdf->Output("I", "Intern_Application_" . $applicationID . ".pdf");
    } else {
        echo "No data found for the given ID.";
    }
} else {
    echo "ID parameter not provided in the URL.";
}
?>