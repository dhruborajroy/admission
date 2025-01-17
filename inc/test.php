<?php
session_start();
// require_once("./smtp/class.phpmailer.php");
include('function.inc.php');
include('constant.inc.php');
include('connection.inc.php');
require_once("smtp/class.phpmailer.php");

$html="Parthib's Result <br>
    Your Result is 56. <br>
    Skip - 0 <br>
    1-5: AABDC <br>
    6-10: ADBDC <br>
    Good Luck Udvash
";
// send_email("Dhruborajroy3@gmail.com",$html,"Result");
// send_email("dhruborajroy3@gmail.com",'Your account has been created. ','Account Created');
echo "<pre>";
pr("Mobile ".$_SESSION['MOBILE_OTP']);
pr("Email ".$_SESSION['EMAIL_OTP']);
pr("Forget pass ".$_SESSION['FORGOT_PASSWORD']);
pr($_SERVER);

// $grandToken=grandToken();
// $user_data=['tran_id'=>'ssdn','amount'=>1];
// $createPayment=createPayment($grandToken['id_token'],$user_data);
// print_r($createPayment);
?>