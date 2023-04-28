<?php
include("../inc/constant.inc.php");
include("../inc/connection.inc.php");
include("../inc/function.inc.php");
require_once("../inc/smtp/class.phpmailer.php");
require('../inc/vendor/autoload.php');
if (isset($_GET['notice_id']) && $_GET['notice_id']!="") {
    $notice_id=get_safe_value($_GET['notice_id']);
}else{
    $_SESSION['PERMISSION_ERROR']=1;
    redirect("index.php");
}
$sql="select * from `notice` where id='$notice_id'";
$res=mysqli_query($con,$sql);
$html="";
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    $html='<table class="table" width="100%">';
    $html.='
        <tr>
            <td align="center">                    
                <img width="150" src="../assets/img/logo.svg" width="100" /> 
            </td>
            <td  align="center" colspan="2">
                <strong><span style="font-size:25px">'.NAME.'</span></strong>
                <br>
                <span style="font-size:25px;text-align:left"><b>Sylhet Engineering College</b></span>
            </td>
        </tr>';
        $html.='
            <tr>
                <td align="left" colspan="5" style="height:4">                    
                    <hr>
                </td>
            </tr>';
            $html.='
                <tr>
                    <td align="left">                    
                        স্মারক নং: '.$row['reference'].'
                    </td>
                    <td  align="center">
                    </td>
                    <td  align="center">
                        তারিখ: '.date("d M Y ",($row['added_on'])).'
                    </td>
                </tr>';
                $html.='
                    <tr>
                        <td align="left" colspan="4" align="center" style="padding-top:30px">                    
                        <u style="font-size:35px">'.$row['title'].'</u>
                        </td>
                    </tr>';
                    $html.='
                        <tr >
                            <td align="left" colspan="5" align="center" style="padding-top:10px">                    
                                <p>'.$row['details'].'</p>
                            </td>
                        </tr>';
            $html.='
            <tr>
                <td align="left">                    
                    
                </td>
                <td  align="center">
                </td>
                <td  align="center" style="padding-top:100px">
                <img  src="https://static.cdn.wisestamp.com/wp-content/uploads/2020/08/Oprah-Winfrey-Signature-1.png" width="100" height="50" />
                <span style="font-style:30px;margin-top:100px">
                    <br>
                        <span style="font-size:20px">এম. রহমান </span>
                    <br>
                    Principal
                    <br>
                    Get Admitted Online Engineering College
                </span>
                </td>
            </tr>';
                        
	    $html.='</table>';
}else{
    $html.="";
}

$mpdf=new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/custom/temp/dir/path',
    'default_font_size' => 12,
    'default_font' => 'FreeSerif',
	'margin_left' => 20,
	'margin_right' => 20,
	'margin_top' => 2,
	'margin_bottom' => 10,
]);
$mpdf->SetTitle('Notice '.NAME);
$mpdf->SetFooter('Developed By The Web divers');
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'I');