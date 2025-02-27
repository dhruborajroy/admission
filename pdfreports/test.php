<?php
session_start();
include("../inc/connection.inc.php");
include("../inc/constant.inc.php");
include("../inc/function.inc.php");
require_once("../inc/smtp/class.phpmailer.php");
require('../inc/vendor/autoload.php');
$mpdf=new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/custom/temp/dir/path',
    'default_font_size' => 12,
    'default_font' => 'FreeSerif',
	'margin_left' => 15,
	'margin_right' => 15,
	'margin_top' => 17,
	'margin_bottom' => 20,
]);
// $mpdf = new mPDF('es', 'A4', 0, '', 5, 5, 0, 0, 0, 0, 'P');

$mpdf->useSubstitutions=false;
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->SetDisplayMode('fullpage');


$cabecera = file_get_contents('http://localhost/admission/webadmin/preview.php?id=NPKKGSCFF17');

$mpdf->WriteHTML($cabecera);

$mpdf->Output();
?>