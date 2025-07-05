<?php
session_start();
include("../inc/connection.inc.php");
include("../inc/constant.inc.php");
include("../inc/function.inc.php");
require_once("../inc/smtp/class.phpmailer.php");
require('../inc/vendor/autoload.php');
$class="";
if (isset($_GET['class']) && $_GET['class']!="") {
    $class=get_safe_value($_GET['class']);
    if (isset($_GET['limit']) ) {
        $limit=get_safe_value($_GET['limit']);
    }
}else if (isset($_GET['limit']) ) {
    $limit=get_safe_value($_GET['limit']);
}else{
    // $_SESSION['PERMISSION_ERROR']=1;
    // redirect("index.php");
}
$html="";
$html.='<table width="100%"  id="new-page">
<tr >
   <td colspan="8" align="center" style="font-size:36px">'.NAME_BANGLA.'</td>
</tr>
<tr>
   <td colspan="8" align="center" style="font-size:22px;">
      '.ADDRESS_BANGLA.'
   </td>
</tr>
<tr>
   <td colspan="8" style="font-size:22px" align="center">'.ADDITIONAL_INFO.'</td>
</tr>';
$html.='<tr><td colspan="7"><hr></td></tr>';
$html.='<tr><td colspan="7" align="center" style="font-size:25px">Merit List</td></tr>';
$html.='<tr align="center">
        <td width="5px" style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Serial</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Roll</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Name</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Father\'s Name</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Merit</td>
        <td style="border: 1px solid black;border-collapse: collapse;background-color: #b7b4b4;text-align:center;">Phone Number</td>
    </tr>';
    $additional_sql="";
    $additional_sql2="";
    if($class!=""){
        $additional_sql="where `class`='$class'";
        if($limit!=""){
            $additional_sql2="limit ".$limit;
        }
    }else{
    }
    $sql="select * from applicants $additional_sql order by merit asc $additional_sql2";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $i=1;
        while($row=mysqli_fetch_assoc($res)){
            // the while loop
            $html.='<tr>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$i.'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['roll'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['first_name']." ".$row['last_name'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.$row['fName'].'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.addOrdinalNumberSuffix($row['merit']).'</td>
            <td style="border: 1px solid black;border-collapse: collapse;text-align:center;">'.maskNumber($row['phoneNumber']).'</td>
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
// $mpdf=new \Mpdf\Mpdf([
//     'tempDir' => __DIR__ . '/custom/temp/dir/path',
//     'default_font_size' => 12,
//     'default_font' => 'FreeSerif',
// 	'margin_left' => 5,
// 	'margin_right' => 5,
// 	'margin_top' => 2,
// 	'margin_bottom' => 10,
// ]);
// // $mpdf->SetProtection(array(),"Password");

// $mpdf->SetTitle('Students list');
// $mpdf->SetFooter('Students list | Developed By The Web divers | {PAGENO}');
// $mpdf->WriteHTML($html);
// $file=time().'.pdf';
// $mpdf->output($file,'I');