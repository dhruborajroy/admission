<?php 
   session_start();
//    session_regenerate_id();
   include('../inc/function.inc.php');
   include('../inc/connection.inc.php');
   include('../inc/constant.inc.php');
   require_once("../inc/smtp/class.phpmailer.php");
   $msg="";
   // if(isset($_SESSION['USER_LOGIN'])){
   //     redirect('index.php');
   // }
   if(isset($_POST['submit'])){
   	$phoneNumber=get_safe_value($_POST['phoneNumber']);
      	$sql="select * from admin where phoneNumber='$phoneNumber'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $otp=rand(1111,9999);
            $html=send_email_using_tamplate($row['name'],$otp);
            send_email($row['email'],$html,"OTP $otp");
            $email=$row['email'];
        }else{
            $msg="You are not registered.";
        }
   }
   ?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>BEC Hall Management System | Login</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      <!-- Normalize CSS -->
      <link rel="stylesheet" href="./css/normalize.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="./css/main.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="./css/all.min.css">
      <!-- Flaticon CSS -->
      <link rel="stylesheet" href="fonts/flaticon.css">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="./css/animate.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="./css/style.css">
      <!-- Modernize js -->
      <script src="./js/modernizr-3.6.0.min.js"></script>
   </head>
   <body>
      <!-- Preloader Start Here -->
      <div id="preloader"></div>
      <!-- Preloader End Here -->
      <!-- Login Page Start Here -->
      <div class="login-page-wrap">
         <div class="login-page-content">
            <div class="login-box">
               <div class="item-logo">
                  <img src="img/logo2.png" alt="logo">
               </div>
               <form id="validate" class="login-form" method="POST">
                  <div class="form-group">
                     <?php echo $msg?>
                  </div>
                  <div class="form-group">
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Email address" id="email">
                        <div class="input-group-append" style="cursor: pointer;">
                           <span class="input-group-text sendOtpButton" style="font-size: 15px;" id="sendOTP" onclick="sendOTP()">Send OTP</span>
                        </div>
                     </div>
                     <span id="email_error"></span>
                     <div class="input-group mb-3" id="otp_box" style="display: none;">
                        <input type="text" class="form-control" placeholder="Enter OTP" id="otp">
                        <div class="input-group-append" style="cursor: pointer;" >
                           <span class="input-group-text" style="font-size: 15px;" id="verifyOTP" onclick="verifyOTP()">Verify OTP</span>
                        </div>
                     </div>
                     <span id="otp_error"></span>
                  </div>
                  <div class="form-group">
                     <a href="change_password.php" type="submit" name="submit" class="login-btn change_password" style="display:none;">Change Password</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Login Page End Here -->
      <!-- jquery-->
      <script src="./js/jquery-3.3.1.min.js"></script>
      <!-- Plugins js -->
      <script src="./js/plugins.js"></script>
      <!-- Popper js -->
      <script src="./js/popper.min.js"></script>
      <!-- Bootstrap js -->
      <script src="./js/bootstrap.min.js"></script>
      <!-- Scroll Up Js -->
      <script src="./js/jquery.scrollUp.min.js"></script>
      <!-- Custom Js -->
      <script src="./js/main.js"></script>
      <!-- validate JS -->
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
      <!-- validate  -->
      <script src="js/validation.php"></script>
   </body>
</html>
<script>
    function sendOTP(){
        jQuery('#email_error').html("");
        var email=jQuery('#email').val();
        if(email==""){
            jQuery('#email_error').html("Please Enter Email");
        }else{
            jQuery('.sendOtpButton').html("please wait...");
            jQuery.ajax({
                url:'./ajax/sendEmail',
                type:'post',
                data:'email='+email+'&type=otp',
                success: function (result){
                    // alert(result);
                    if(result=='done'){
                        jQuery('#email').attr('disabled',true);
                        jQuery('#sendOTP').hide();
                        jQuery('#otp_box').show();
                    }else if(result=='not_registered'){
                        jQuery('#verifyOTP').html('Verify Otp');
                        jQuery('#otp_error').html("Email Not registered");
                        jQuery('.sendOtpButton').html("Submit");
                    }else{
                        jQuery('#email_error').html("Please try after sometime");
                        jQuery('.sendOtpButton').html("Submit");
                    }
                }
            });
        }
    }
    function verifyOTP(){
        jQuery('#otp_error').html("");
        var otp=jQuery('#otp').val();
        if(otp==""){
            jQuery('#otp_error').html("Please Enter otp");
        }else{
            jQuery('#verifyOTP').html('Please Wait');
            jQuery.ajax({
                url:'./ajax/checkOTP',
                type:'post',
                data:'otp='+otp,
                success: function (result){
                    // alert(result);
                    if(result=='done'){
                        jQuery('#otp').attr('disabled',true);
                        jQuery('#verifyOTP').hide();
                        jQuery('#otp_box').html("Email verified");
                        jQuery('.change_password').show();
                    }else{
                        jQuery('#verifyOTP').html('Verify Otp');
                        jQuery('#otp_error').html("Please enter valid OTP");
                    }
                }
            });
        }

    }
</script>