<?php
session_start();
// require_once("./smtp/class.phpmailer.php");
include('function.inc.php');
include('constant.inc.php');
include('connection.inc.php');

// send_email("dhruborajroy3@gmail.com",'Your account has been created. ','Account Created');
echo "<pre>";
pr($_SESSION['MOBILE_OTP']);
pr($_SESSION['EMAIL_OTP']);
// $grandToken=grandToken();
// $user_data=['tran_id'=>'ssdn','amount'=>1];
// $createPayment=createPayment($grandToken['id_token'],$user_data);
// print_r($createPayment);
?>