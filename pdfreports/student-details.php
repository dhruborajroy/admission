<?php
session_start();
include("../inc/connection.inc.php");
include("../inc/constant.inc.php");
include("../inc/function.inc.php");
require_once("../inc/smtp/class.phpmailer.php");
require('../inc/vendor/autoload.php');
$html='';
$html.='
<style>
#customers {
   font-family: Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 100%;
}

#customers td, #customers th {
   border: 1px solid #ddd;
   padding: 2px;
   width: 50%;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
padding-top: 1px;
padding-bottom: 1px;
text-align: left;
background-color: #04AA6D;
color: white;
}

#title {
   font-family: Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 100%;
   font-size:20px;
   margin-top:20px;
}
#image{
   border-radius: 15px;
   width: 80%;
   max-width: 150px;
   max-height: 150px;
   box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
#new-page{
   margin-top:90px
}
#heading{
   width:100% !important;
}
</style>';

$id='NPKKGSC75D9';
$sql="SELECT * FROM `applicants`";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
while( $row=mysqli_fetch_assoc($res)){
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $f_name=$row['fName'];
    $fNid=$row['fNid'];
    $m_name=$row['mName'];
    $mNid=$row['mNid'];
    $phoneNumber=$row['phoneNumber'];
    $presentAddress=$row['presentAddress'];
    $permanentAddress=$row['permanentAddress'];
    $dob=$row['dob'];
    $gender=$row['gender'];
    $religion=$row['religion'];
    $birthId=$row['birthId'];
    $quota=$row['quota'];
    $bloodGroup=$row['bloodGroup'];
    $localGuardianName=$row['localGuardianName'];
    $localGuardianNid=$row['localGuardianNid'];
    $email=$row['email'];
    $image=$row['image'];
    $class=$row['class'];

    // start
    $html.='<table width="100%"  id="new-page">
    <tr>
       <td align="center" style="font-size:36px">'.NAME_BANGLA.'</td>
    </tr>
    <tr>
       <td align="center" style="font-size:22px;">
          '.ADDRESS_BANGLA.'
       </td>
    </tr>
    <tr>
       <td style="font-size:22px" align="center">'.ADDITIONAL_INFO.'</td>
    </tr>
    <tr>
       <td ><hr></td>
    </tr>
    </table>';
    // $html.='<table width="100%">
    // <tr>
    //    <td align="left"><img id="heading" src="../assets/img/heading.png" alt="preview image"></td>
    // </tr>
    // </table>';
    $html.='<table width="100%">
    <tr>
       <td align="center"><img id="image" src="../media/users/'.$image.'" alt="preview image" width="100px" height="100px"></td>
    </tr>
    </table>';
    $html.='<table width="100%">
    <tr>
       <td align="center" id="title">Applicant\'s Info</td>
    </tr>
    </table>';
    $html.='<table id="customers" class="mt-5">
    <tbody>
        <tr>
            <td>First Name: </td>
            <td>'.$first_name.'</td>
        </tr>
        <tr>
            <td>Last Name: </td>
            <td>'.$last_name.'</td>
        </tr>
        <tr>
            <td>Date of Birth: </td>
            <td>'.$dob.'</td>
        </tr>
        <tr>
            <td>Application Id: </td>
            <td>'.$id.'</td>
        </tr>
        <tr>
            <td>Password: </td>
            <td>Has been sent to your number</td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>'.$email.'</td>
        </tr>
        <tr>
            <td>Phone Number: </td>
            <td>'.$phoneNumber.'</td>
        </tr>
    </tbody>
    </table>';
    $html.='<table width="100%">
    <tr>
       <td align="center" id="title">Admission Details</td>
    </tr>
    </table>';
    $html.='<table id="customers">
    <tbody>
        <tr>
            <td>Class Name: </td>
            <td>'.$class.'</td>
        </tr>
        <tr>
            <td>Quota:  </td>
            <td>'.$quota.'</td>
        </tr>
        <tr>
            <td>Blood Group: </td>
            <td>'.$bloodGroup.'</td>
        </tr>
        <tr>
            <td>Religion: </td>
            <td>'.$religion.'</td>
        </tr>
    </tbody>
    </table>';
    $html.='<table width="100%">
    <tr>
       <td align="center" id="title">Gardian Details</td>
    </tr>
    </table>';
    $html.='<table id="customers" width="100%">
    <tbody>
        <tr>
            <td>Father\'s Name: </td>
            <td>'.$f_name.'</td>
        </tr>
        <tr>
            <td>Father\'s NID: </td>
            <td>'.$fNid.'</td>
        </tr>
        <tr>
            <td>Mother\'s Name: </td>
            <td>'.$m_name.'</td>
        </tr>
        <tr>
            <td>Mother\'s NID: </td>
            <td>'.$mNid.'</td>
        </tr>
        <tr>
        <tr>
            <td>Local Guardian\'s Name: </td>
            <td>'.$localGuardianName.'</td>
        </tr>
        <tr>
            <td>Local Guardian\'s NID: </td>
            <td>'.$localGuardianNid.'</td>
        </tr>
    </tbody>
    </table>';
    $html.='<table width="100%">
    <tr>
       <td align="center" id="title">Address</td>
    </tr>
    </table>';
    $html.='<table id="customers">
    <tbody>
        <tr>
            <td width="50%">Present Address: </td>
            <td width="50%">'.$presentAddress.'</td>
        </tr>
        <tr>
            <td>Permanent Address: </td>
            <td>'.$permanentAddress.'</td>
        </tr>
    </tbody>
    </table>';
    // end
    }
}else{
    $html="skn";
}
// echo $html;
$mpdf=new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/custom/temp/dir/path',
    'default_font_size' => 12,
    'default_font' => 'FreeSerif',
	'margin_left' => 10,
	'margin_right' => 10,
	'margin_top' => 10,
	'margin_bottom' => 10,
]);
$mpdf->SetTitle('Student Details');
$mpdf->SetFooter('|| Developed By The Web Divers');
$mpdf->SetProtection(array('print'), '', 'MyPassword');
$mpdf->WriteHTML($html);
$file="Student_Details_".time().'.pdf';
$mpdf->output($file,'I');