<?php
include("header.php");
if(!isset($_SESSION['MOBILE_OTP'])) {
   $_SESSION['TOASTR_MSG']=array(
      'type'=>'error',
      'body'=>'You don\'t have the permission to access that page',
      'title'=>'Error',
   );
   redirect("apply");
}elseif(!isset($_SESSION['APPLICATION_ID'])) {
   $_SESSION['TOASTR_MSG']=array(
      'type'=>'error',
      'body'=>'You don\'t have the permission to access that page',
      'title'=>'Error',
   );
   redirect("apply");
}
$insert_id=$_SESSION['APPLICATION_ID'];
$phone_number=$_SESSION['MOBILE_NUMBER'];
if(isset($_POST['submit'])){
   $otp=get_safe_value($_POST['mobile_otp']);
   if($_SESSION['MOBILE_OTP']==$otp){
      $_SESSION['TOASTR_MSG']=array(
         'type'=>'success',
         'body'=>'You have successfully verified your phone number',
         'title'=>'Congrats',
      );
      $sql="update applicants set status='1' where phoneNumber='$phone_number'";
      if(mysqli_query($con,$sql)){
         $_SESSION['NUMBER_VEFIED']=true;
         unset($_SESSION['MOBILE_OTP']);
         redirect("preview");
      }else{
         $_SESSION['TOASTR_MSG']=array(
            'type'=>'error',
            'body'=>'Something Went wrong',
            'title'=>'Sorry',
         );
      }
   }else{
      $_SESSION['TOASTR_MSG']=array(
         'type'=>'error',
         'body'=>'Please enter valid OTP',
         'title'=>'Error',
      );
   }
}
?>
<div class="breadcrumb-bar">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-12">
            <div class="breadcrumb-list">
               <nav aria-label="breadcrumb" class="page-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index">Home</a></li>
                     <li class="breadcrumb-item">Apply</li>
                     <li class="breadcrumb-item" style="color:#ff5364">Mobile number verification</li>
                     <li class="breadcrumb-item">Preview</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="course-content checkout-widget">
      <!-- start -->
      <div class="container">
            <div class="col-md-12">
               <div class="settings-widget">
                  <div class="settings-inner-blk p-0">
                     <div class="sell-course-head comman-space">
                        <h3 align="center">Mobile Number Verification</h3>
                        <form method="POST" enctype="multipart/form-data">
                           <div class="row">
                              <div class="alert alert-success mt-3">An OTP has been sent to the following <?php echo maskNumber($phone_number)?> number. Please enter the OTP to verify the number. </div>
                              <div class="col-lg-12 row">
                                 <div class="col-lg-6" id="email_otp_box">
                                    <label class="form-control-label">Verify OTP</label>
                                    <div class="input-group mb-3">
                                       <input type="number" class="form-control" placeholder="Enter OTP" id="mobile_otp"  name="mobile_otp" >
                                    </div>
                                    <span id="mobile_otp_error" style="color:red;"></span>
                                 </div>
                                 <div class="col-lg-6" id="email_otp_box">
                                    <label class="form-control-label">&nbsp;</label>
                                    <div class="payment-btn" style="text-align:center;">
                                       <!-- Button trigger modal -->
                                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                                    </div>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end -->
      </div>
   </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Are you sure want to submit your OTP?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button name="submit" id="submit" class="btn btn-success" type="submit">Submit</button>
         </div>
      </div>
   </div>
</div>
<!-- end modal -->
</form>
<?php include("footer.php");?>

<script>
$('#refreshCaptcha').on({'click': function(){
      var captchaCode=(generateString(6));
      $('#captcha').attr('src','<?php echo FRONT_SITE_PATH?>/webadmin/ajax/captcha_gen.php?captchaCode='+captchaCode);
   }
});
function sendMobileOTP(){
   var mobile_otp_send_status=jQuery('#mobile_otp_send_status').val();
   if(mobile_otp_send_status==1){
      toastr["error"]("OTP already sent", "Phone Number");
      jQuery('#submit').attr('disabled',true);
   }else{
      jQuery('#phone_number_error').html("");
      var phone_number=jQuery('#phone_number').val();
      if(phone_number==""){
         jQuery('#phone_number_error').html("Please Enter Phone Number");
         // jQuery('#phone_number').attr('readonly',true);
      }else{
         jQuery('.sendOtpButton').html("please wait...");
         jQuery.ajax({
               url:'./webadmin/ajax/sendOTP',
               type:'post',
               data:'phone_number='+phone_number+'&type=otp&verify_type=phone_number',
               success: function (result){
                  if(result=='done'){
                     jQuery('#phone_number').attr('readonly',true);
                     jQuery('#sendOTP').hide();
                     jQuery('#mobile_otp_box').show();
                     jQuery('.sendOtpButton').html("Submit");
                     jQuery('.sendOtpButton').attr('disabled',true);
                     mobile_otp_send_status=jQuery('#mobile_otp_send_status').val(1);
                  }else if(result=='registered'){
                     jQuery('#verifyOTP').html('Verify Otp');
                     jQuery('.sendOtpButton').html("Submit");
                     jQuery('#phone_number_error').html("Phone Number Already registered.");
                  }else{
                     jQuery('#phone_number_error').html("Please try after sometime");
                     jQuery('.sendOtpButton').html("Submit");
                  }
               }
         });
      }
   }
}

function verifyMobileOTP(){
   var mobile_otp_verify_status=jQuery('#mobile_otp_verify_status').val();
   if(mobile_otp_verify_status==1){
      toastr["error"]("OTP already sent", "Phone Number");
      jQuery('#submit').attr('readonly',true);
   }else{
      jQuery('#mobile_otp_error').html("");
      var otp=jQuery('#mobile_otp').val();
      if(otp==""){
         jQuery('#mobile_otp_error').html("Please Enter otp");
      }else{
         jQuery('#verifyOTP').html('Please Wait');
         jQuery.ajax({
               url:'./webadmin/ajax/checkOTP',
               type:'post',
               data:'otp='+otp+'&verify_type=phone_number',
               success: function (result){
                  // alert(result);
                  if(result=='done'){
                     jQuery('#mobile_otp').attr('readonly',true);
                     jQuery('#verifyMobileOTP').hide();
                     jQuery('#mobile_otp_box').html("Phone Number verified");
                     // jQuery('.change_password').show();
                  }else{
                     jQuery('#verifyMobileOTP').html('Verify Otp');
                     jQuery('#phone_number_otp_error').html("Please enter valid OTP");
                  }
               }
         });
      }
   }
}

function sendEmailOTP(){
   var email_otp_send_status=jQuery('#email_otp_send_status').val();
   if(email_otp_send_status==1){
      toastr["error"]("OTP already sent", "Phone Number");
      // jQuery('#submit').attr('disabled',true);
   }else{
      jQuery('#email_error').html("");
      var email=jQuery('#email').val();
      if(email==""){
         jQuery('#email_error').html("Please Enter Phone Number");
         // jQuery('#email').attr('disabled',true);
      }else{
         jQuery('.sendEmailOtpButton').html("please wait...");
         jQuery.ajax({
               url:'./webadmin/ajax/sendOTP',
               type:'post',
               data:'email='+email+'&type=otp&verify_type=email',
               success: function (result){
                  if(result=='done'){
                     jQuery('#email').attr('readonly',true);
                     jQuery('#sendOTP').hide();
                     jQuery('#email_otp_box').show();
                     jQuery('.sendEmailOtpButton').html("Submit");
                     // jQuery('.sendEmailOtpButton').attr('disabled',true);
                     email_otp_send_status=jQuery('#email_otp_send_status').val(1);
                  }else if(result=='registered'){
                     jQuery('#verifyOTP').html('Verify Otp');
                     jQuery('.sendEmailOtpButton').html("Submit");
                     jQuery('#email_error').html("Email Already registered.");
                  }else{
                     jQuery('#email_error').html("Please try after sometime");
                     jQuery('.sendEmailOtpButton').html("Submit");
                  }
               }
         });
      }
   }
}


function verifyEmailOTP(){
   var email_otp_verify_status=jQuery('#email_otp_verify_status').val();
   if(email_otp_verify_status==1){
      toastr["error"]("OTP already sent", "Email Error");
      jQuery('#submit').attr('disabled',true);
   }else{
      jQuery('#email_otp_error').html("");
      var otp=jQuery('#email_otp').val();
      if(otp==""){
         jQuery('#email_otp_error').html("Please Enter otp");
      }else{
         jQuery('#verifyEmailOTP').html('Please Wait');
         jQuery.ajax({
               url:'./webadmin/ajax/checkOTP',
               type:'post',
               data:'otp='+otp+'&verify_type=email',
               success: function (result){
                  // alert(result);
                  if(result=='done'){
                     jQuery('#otp').attr('readonly',true);
                     jQuery('#verifyEmailOTP').hide();
                     jQuery('#email_otp_box').html("Email verified");
                  }else{
                     jQuery('#verifyEmailOTP').html('Verify Otp');
                     jQuery('#email_otp_error').html("Please enter valid OTP");
                  }
               }
         });
      }
   }
}



         var filename=image.value;
         function checkImage(){
            if(filename==""){
               toastr["error"]("You have to select image","Image Error");
            }
         }
         var email_otp_send_status=jQuery('#email_otp_send_status').val();
         function checkEmailVerification(){
            if(email_otp_send_status!="1"){
               toastr["error"]("You have to verify email first","Email verification Error. ");
            }
         }
         var mobile_otp_send_status=jQuery('#mobile_otp_send_status').val();
         function checkMobileVerification(){
            if(mobile_otp_send_status!="1"){
               toastr["error"]("You have to verify mobile number first","Mobile Number Error");
            }
         }
         function checkMobileAndEmailVerification(){
            checkMobileVerification();
            checkEmailVerification();
            checkImage();
         }
</script>