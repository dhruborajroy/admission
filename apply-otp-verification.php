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
