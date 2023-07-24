<?php

require __DIR__ . "/dompdf/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf=new Dompdf;

$dompdf->loadHtml('Hello');

$dompdf->render();

$dompdf->stream(["Attachment=>0"]);

?>