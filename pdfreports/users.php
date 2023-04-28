<?php
session_start();
include("../inc/constant.inc.php");
include("../inc/connection.inc.php");
include("../inc/function.inc.php");
require_once("../inc/smtp/class.phpmailer.php");
require('../inc/vendor/autoload.php');
$batch_id="";
if (isset($_GET['batch_id']) && $_GET['batch_id']!="") {
    $batch_id=get_safe_value($_GET['batch_id']);
}else{
    // $_SESSION['PERMISSION_ERROR']=1;
    // redirect("index.php");
}
$html='<table class="table" width="100%">';
$html.='
    <tr>
        <td align="center">
        </td>
        <td align="center">
        </td>
        <td  align="center" colspan="7">
        <strong><span style="font-size:25px">'.NAME.'</span></strong>
        </td>
    </tr>';
$html.='<tr><td colspan="12"><hr></td></tr>';
$html.='<tr>
        <td width="5px" style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;"></td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Picture</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Roll</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Name</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Father\'s Name</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Mother\'s Name</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Class</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Phone</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Email</td>
    </tr>';
    $sql="select * from applicants";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $i=1;
        while($row=mysqli_fetch_assoc($res)){
            // the while loop
            $html.='<tr>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$i.'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;"><img src="http://'.STUDENT_IMAGE.$row['image'].'" style="border-radius:60px" height="100px" weight="100px"></td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['roll'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;overflow:hidden;inline:flex;">'.$row['first_name'].' '.$row['last_name'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['fName'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['mName'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['class'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['phoneNumber'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.maskEmail($row['email']).'</td>
            </tr>';
            $i++;
        } 
        //IF condition ended
    } else {
        $html.='
        <tr>
        <td colspan="8" align="center">No data found</td>
        </tr>';
    }//else ended
$html.='</table>';

echo $html;
$mpdf=new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/custom/temp/dir/path',
    'default_font_size' => 12,
    'default_font' => 'FreeSerif',
	'margin_left' => 5,
	'margin_right' => 5,
	'margin_top' => 2,
	'margin_bottom' => 10,
]);
// $mpdf->SetTitle('Students list');
// $mpdf->SetFooter('Students list | Developed By The Web divers | {PAGENO}');
// $mpdf->WriteHTML($html);
// $file=time().'.pdf';
// $mpdf->output($file,'I');