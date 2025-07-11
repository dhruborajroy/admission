<?php
include("header.php");
if(!isset($_SESSION['APPLICATION_ID'])) {
   $_SESSION['TOASTR_MSG']=array(
      'type'=>'error',
      'body'=>'You don\'t have the permission to access that page',
      'title'=>'Error',
   );
   redirect("apply");
}
$application_id=$_SESSION['APPLICATION_ID'];
// prx($_SESSION);
if(isset($_SESSION['NUMBER_VEFIED']) && $application_id!=""){
   $application_id=get_safe_value($application_id);
   $sql="SELECT * FROM `applicants` where id='$application_id' and final_submit!=1";
   $res=mysqli_query($con,$sql);
   if(mysqli_num_rows($res)>0){
      $row=mysqli_fetch_assoc($res);
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
   }else{
      $_SESSION['TOASTR_MSG']=array(
         'type'=>'error',
         'body'=>'You don\'t have the permission to access the location!',
         'title'=>'Error',
      );
      redirect("index");
   }
}else{
   $_SESSION['TOASTR_MSG']=array(
      'type'=>'error',
      'body'=>'You don\'t have the permission to access the location!',
      'title'=>'Error',
   );
   redirect("index");
}

//Bkash Payment started
$val_id="";
$amount="";
$card_type="";
$tran_date="";
$card_issuer="";
$card_no="";
$error="";
$msg="";
$status="pending";
$createPayment['bkashURL']="";
$createPayment['message']="";
$total_amount=round(intval(FORM_AMOUNT)*(1+SERVICE_CHARGE),2);
if(isset($_POST['bkash'])){
   // pr($_POST);
   $amount=round($total_amount,2);
   $token=timeWiseTokenGeneartion();
   // pr($token);
   $user_data=array(
      'tran_id'=>uniqid("admission_"),
      'amount'=>$amount,
   );
   if(isset($token['id_token'])){
      $createPayment=createPayment($token['id_token'],$user_data);
      // pr($createPayment);
      if(isset($createPayment['message'])){
         $msg= $createPayment['message'];
      }
      if(isset($createPayment['statusCode']) && $createPayment['statusCode']==000){
         $statusMessage=$createPayment['statusMessage'];
         $paymentID=$createPayment['paymentID'];
         $amount=$createPayment['amount'];
         $paymentCreateTime=$createPayment['paymentCreateTime'];
         $merchantInvoiceNumber=$createPayment['merchantInvoiceNumber'];
         $swl="select id from bkash_online_payment where user_id='$application_id' and status='pending'";
         $res=mysqli_query($con,$swl);
         if(mysqli_num_rows($res)>0){
            $sql="update bkash_online_payment set tran_id='$merchantInvoiceNumber', bkash_payment_id='$paymentID', amount='$amount', added_on='$paymentCreateTime' where  user_id='$application_id' and status='pending'";
            if(mysqli_query($con,$sql)){
               redirect($createPayment['bkashURL']);
               die;
            }else{
               // echo $sql;
               $_SESSION['TOASTR_MSG']=array(
                  'type'=>'error',
                  'body'=>'Something went wrong!',
                  'title'=>'Error',
               );
            }
         }else{
            $sql="INSERT INTO `bkash_online_payment` ( `tran_id`,`user_id`, `bkash_payment_id`,`customerMsisdn`,`trxID`,`amount`,`statusMessage`, `added_on`,`updated_on`,`status`) VALUES 
                           ( '$merchantInvoiceNumber', '$application_id','$paymentID',  '',   '', '$amount', '','$paymentCreateTime', '', 'pending')";
            if(mysqli_query($con,$sql)){
               redirect($createPayment['bkashURL']);
               die;
            }else{
               // echo $sql;
               $_SESSION['TOASTR_MSG']=array(
                  'type'=>'error',
                  'body'=>'Something went wrong!',
                  'title'=>'Error',
               );
            }
         }
      }
   }else{
      $_SESSION['TOASTR_MSG']=array(
         'type'=>'error',
         'body'=>'Something went wrong!',
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
                     <li class="breadcrumb-item">Mobile number verification</li>
                     <li class="breadcrumb-item" style="color:#ff5364">Preview</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="course-content checkout-widget">
<div class="container">
      <div class="col-md-12">
         <div class="settings-widget">
            <div class="settings-inner-blk p-0">
               <div class="sell-course-head comman-space">
                  <h3 align="center">Basic Informations</h3>
                  <table width="100%">
                  <tr>
                     <td align="center"><img style="border-radius: 15px;width: 80%;max-width: 300px;max-height: 300px;box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;" src="./media/users/<?php echo $image?>" alt="preview image" width="300px" height="300px"></td>
                  </tr>
                  </table>
                  <table id="preview">
                     <tbody>
                        <tr>
                           <td>First Name: </td>
                           <td><?php echo $first_name?></td>
                        </tr>
                        <tr>
                           <td>Last Name: </td>
                           <td> <?php echo $last_name?></td>
                        </tr>
                        <tr>
                           <td>Date of Birth: </td>
                           <td><?php echo $dob?></td>
                        </tr>
                        <tr>
                           <td>Application Id: </td>
                           <td><?php echo $application_id?></td>
                        </tr>
                        <tr>
                           <td>Password: </td>
                           <td>Has been sent to your number</td>
                        </tr>
                        <tr>
                           <td>Email: </td>
                           <td><?php echo $email?></td>
                        </tr>
                        <tr>
                           <td>Phone Number: </td>
                           <td><?php echo $phoneNumber?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="settings-widget">
            <div class="settings-inner-blk p-0">
               <div class="sell-course-head comman-space">
                  <h3 align="center">Admission Details</h3>
                  <table id="preview">
                     <tbody>
                        <tr>
                           <td>Class Name: </td>
                           <td> <?php echo $class?></td>
                        </tr>
                        <tr>
                           <td>Quota:  </td>
                           <td><?php echo $quota?></td>
                        </tr>
                        <tr>
                           <td>Blood Group: </td>
                           <td>  <?php echo $bloodGroup?></td>
                        </tr>
                        <tr>
                           <td>Religion: </td>
                           <td>  <?php echo $religion?></td>
                        </tr>
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-12">
         <div class="settings-widget">
            <div class="settings-inner-blk p-0">
               <div class="sell-course-head comman-space">
                  <h3 align="center"> Gardian Details</h3>
                  <table id="preview">
                     <tbody>
                        <tr>
                           <td>Father's Name: </td>
                           <td>  <?php echo $f_name?></td>
                        </tr>
                        <tr>
                           <td>Father's NID: </td>
                           <td>  <?php echo $fNid?></td>
                        </tr>
                        <tr>
                           <td>Mother's Name: </td>
                           <td>  <?php echo $m_name?></td>
                        </tr>
                        <tr>
                           <td>Mother's NID: </td>
                           <td>  <?php echo $mNid?></td>
                        </tr>
                        <tr>
                        <tr>
                           <td>Local Guardian's Name: </td>
                           <td>  <?php echo $localGuardianName?></td>
                        </tr>
                        <tr>
                           <td>Local Guardian's NID: </td>
                           <td>  <?php echo $localGuardianNid?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="settings-widget">
            <div class="settings-inner-blk p-0">
               <div class="sell-course-head comman-space">
                  <h3 align="center"> Address</h3>
                  <table id="preview">
                     <tbody>
                        <tr>
                           <td width="50%">Present Address: </td>
                           <td width="50%"><?php echo $presentAddress ?></td>
                        </tr>
                        <tr>
                           <td>Permanent Address: </td>
                           <td><?php echo $permanentAddress ?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space row">
                     <h3 align="center"></h3>
                        <div class="payment-btn" style="text-align:center;">
                           <form  method="post">
                              <div class="go-dashboard text-center ">
                                    <div class="alert alert-warning">Without payment the application will not submitted properly.</div>
                                    <br>
                                    <button type="submit" name="bkash" class="btn btn-primary">
                                       Pay & Submit Your application
                                       <img src="./assets/img/bkash.png" weight="100px" height="70px" alt="Bkash Payment" >
                                    </button>
                              </div>
                              </form>
                           <!-- <button id="submit" class="btn btn-primary" readonly name="submit">Pay Now With Bkash</button> -->
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</form>
<?php include("footer.php");?>
<script>
   $("#submit").click(function(){
      swal({
         title: "Are you sure?",
         text: "Do you want to final submit the application! Once you submitted it can't be changed",
         icon: "warning",
         buttons: true,
         dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            // $("#submit").prop("disabled", false);
            jQuery.ajax({
               url: "apply",
               data: "submit=submit",
               type: "post",
               failure: function (result) {
                  alert(result);
               },
               success: function (result) {

               },
            });
         } else {
            swal("Your imaginary file is safe!");
         }
      });
   });
        
        </script>