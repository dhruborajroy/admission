<?php
// Request URL: http://app5.nu.edu.bd/nu-web/application/educationInfo?sscRoll=223816&sscReg=1717732200&sscBoard=18&sscPassingYear=2020&hscRoll=146386&hscReg=1717732200&hscBoard=18&hscPassingYear=2022
// Request URL: http://app5.nu.edu.bd/nu-web/application/address?divisionId=55&districtId=49&gender=F

session_start();
//session_regenerate_id();
include('../../inc/function.inc.php');
include('../../inc/connection.inc.php');
include('../../inc/constant.inc.php');
require_once("../../inc/smtp/class.phpmailer.php");
$type=get_safe_value($_POST['type']);
$verify_type=get_safe_value($_POST['verify_type']);
if($type=='otp' && $verify_type=="phone_number"){
    $phone_number=get_safe_value($_POST['phone_number']);
    // echo "done";
    // echo "registered";
    $res=mysqli_query($con,"select id from applicants where phoneNumber='$phone_number'");
    if(mysqli_num_rows($res)>0){
        echo "registered";
    }else{
        $otp=rand(1111,9999);
        $_SESSION['MOBILE_OTP']=$otp;
        $email=$phone_number;
        $_SESSION['EMAIL']=$email;
        // echo send_email($email,'Your otp is '. $otp,'Otp email');
        echo "done";
    }
}
// die;
if($type=='otp' && $verify_type=="email"){
    $email=get_safe_value($_POST['email']);
    $res=mysqli_query($con,"select id from applicants where email='$email'");
    if(mysqli_num_rows($res)>0){
        echo "registered";
    }else{
        $otp=rand(1111,9999);
        $_SESSION['EMAIL_OTP']=$otp;
        $_SESSION['EMAIL']=$email;
        // echo send_email($email,'Your otp is '. $otp,'Otp email');
        echo "done";
    }
}