<?php

require_once __DIR__ . '/dompdf/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

//Grab variables


$cname=$_POST['company'];
$addressto=$_POST['authority'];
$sname=$_POST['name'];
$startdate=$_POST['start_date'];
$enddate=$_POST['end_date'];


$dompdf=new Dompdf();

// $dompdf->render();
//create our pdf

$data='';

$data .='trial';

//add data

 $data .= $cname;
 $data .= $sname;

//write pdf
$dompdf->loadHtml($data);

//

$dompdf->Output('');

?>