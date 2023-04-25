<?php
session_start();
// session_regenerate_id();
include('../../inc/function.inc.php');
include('../../inc/connection.inc.php');
include('../../inc/constant.inc.php');
if(isset($_POST['otp']) && isset($_POST['verify_type']) && $_POST['verify_type']=='phone_number'){
    $otp=get_safe_value($_POST['otp']);
    if($_SESSION['MOBILE_OTP']==$otp){
        echo "done";
        $_SESSION['FORGOT_PASSWORD']=true;
    }else{
        echo "error";
    }
}

if(isset($_POST['otp']) && isset($_POST['verify_type']) && $_POST['verify_type']=='email'){
    $otp=get_safe_value($_POST['otp']);
    if($_SESSION['EMAIL_OTP']==$otp){
        echo "done";
        $_SESSION['FORGOT_PASSWORD']=true;
    }else{
        echo "error";
    }
}