<?php 
include("header.php"); 
   $phone_number="";
   if(isset($_POST['submit'])){
   	$phone_number=get_safe_value($_POST['phone_number']);
      $res=mysqli_query($con,"select id,first_name from applicants where phoneNumber='$phone_number'");
      if(mysqli_num_rows($res)>0){
         $row=mysqli_fetch_assoc($res);
         $first_name=$row['first_name'];
         $password=rand(111111,999999);
         echo $sql="update applicants set `password`='$password' where `phoneNumber`='$phone_number'";
         mysqli_query($con,$sql);
         $_SESSION['FORGOT_PASSWORD']=$password;
         $sms="Dear $first_name, Password is ".$password;
         // $sms_status=send_sms_greenweb($phone_number,$sms);
         $sms_status="sent";
         if($sms_status=='sent'){
            $_SESSION['TOASTR_MSG']=array(
               'type'=>'success',
               'body'=>'Password has been sent to your number '.$phone_number.'.',
               'title'=>'Success',
            );
         }
      }
   }
   
// prx($_SESSION);
?>
<div class="main-wrapper">
         <div class="row">
            <div class="col-md-6 login-bg">
               <div class="owl-carousel login-slide owl-theme aos" data-aos="fade-up">
                  <div class="welcome-login">
                     <div class="login-banner">
                        <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                     </div>
                     <div class="mentor-course text-center">
                        <h2>Welcome to <br>DreamsLMS Courses.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                     </div>
                  </div>
                  <div class="welcome-login">
                     <div class="login-banner">
                        <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                     </div>
                     <div class="mentor-course text-center">
                        <h2>Welcome to <br>DreamsLMS Courses.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                     </div>
                  </div>
                  <div class="welcome-login">
                     <div class="login-banner">
                        <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                     </div>
                     <div class="mentor-course text-center">
                        <h2>Welcome to <br>DreamsLMS Courses.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 login-wrap-bg">
               <div class="login-wrapper">
                  <div class="loginbox">
                     <div class="img-logo">
                        <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                        <div class="back-home">
                           <a href="index">Back to Home</a>
                        </div>
                     </div>
                     <h1>Forgot Password ?</h1>
                     <div class="reset-password">
                        <p>Enter your Phone Number to reset your password.</p>
                     </div>
                     <form method="post">
                        <div class="form-group">
                           <label class="form-control-label">Phone Number</label>
                           <input type="tel" name="phone_number" class="form-control" placeholder="Enter your Phone Number. Ex: 017xxxxx">
                        </div>
                        <div class="d-grid">
                           <button class="btn btn-start" name="submit" type="submit">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
<?php include("footer.php")?>
