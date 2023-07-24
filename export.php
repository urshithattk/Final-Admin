<?php
include('config.php');

$sql = "SELECT applicant_details.ID, applicant_details.name, applicant_details.email_id, applicant_details.semester, applicant_details.branch, new_application.na_companyname,new_application.user_id
        FROM internshipportal.applicant_details 
        , internship_portal.new_application";

$result = mysqli_query($con,$sql);


$html='<table><tr><td>Admission No.</td><td>Student name</td><td>Email</td><td>Branch</td><td>Semester</td></tr>';

while($row=mysqli_fetch_assoc($result)){
    $html.='<tr><td>'.$row['ID'].'</td><td>'.$row['name'].'</td><td>'.$row['user_id'].'</td><td>'.$row['branch'].'</td><td>'.$row['semester'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>