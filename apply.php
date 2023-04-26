<?php
   include("header.php");

   if(isset($_SESSION['APPLICANT_LOGIN'])){
      redirect('dashboard');
   }
   $display="";
   $class="";
   $id="";
   $msg="";
   $first_name="";
   $last_name="";
   $f_name="";
   $m_name="";
   $phone_number="";
   $email="";
   $blood_group="";
   $present_address="";
   $gender="";
   $permanent_address="";
   $dob="";
   $quota="";
   $password="";
   $religion="";
   $code="";
   $f_nid="";
   $m_nid="";
   $local_guardian_name="";
   $local_guardian_nid="";
   $image="";
   $birthID="";
   if(isset($_POST['submit'])){
   	$first_name=ucfirst(get_safe_value($_POST['first_name']));
   	$last_name=ucfirst(get_safe_value($_POST['last_name']));
   	$f_name=ucfirst(get_safe_value($_POST['f_name']));
   	$f_nid=ucfirst(get_safe_value($_POST['f_nid']));
   	$m_name=ucfirst(get_safe_value($_POST['m_name']));
   	$m_nid=ucfirst(get_safe_value($_POST['m_nid']));
   	$phone_number=get_safe_value($_POST['phone_number']);
   	$email=get_safe_value($_POST['email']);
   	$present_address=get_safe_value($_POST['present_address']);
   	$permanent_address=get_safe_value($_POST['permanent_address']);
   	$gender=get_safe_value($_POST['gender']);
   	$blood_group=get_safe_value($_POST['blood_group']);
   	$local_guardian_name=get_safe_value($_POST['local_guardian_name']);
   	$localGuardianNid=get_safe_value($_POST['localGuardianNid']);
   	$birthID=get_safe_value($_POST['birthID']);
   	$class=get_safe_value($_POST['class']);
   	$dob=get_safe_value($_POST['dob']);
   	$quota=get_safe_value($_POST['quota']);
    //   $password=password_hash($password,PASSWORD_DEFAULT);
    $password=rand(111111,999999);
   	$religion=get_safe_value($_POST['religion']);
      if(mysqli_num_rows(mysqli_query($con,"select id from applicants where phoneNumber='$phone_number'"))>0){
         $_SESSION['TOASTR_MSG']=array(
            'type'=>'error',
            'body'=>'Phone number is already added',
            'title'=>'Error',
         ); 
      }else{
         $roll=date('y').rand(1111,9999);
         if($id==''){
            $info=getimagesize($_FILES['image']['tmp_name']);
            $width = $info[0];
            $height = $info[1];
            if(isset($info['mime'])){
               if($info['mime']=="image/jpeg"){
                  $img=imagecreatefromjpeg($_FILES['image']['tmp_name']);
               }elseif($info['mime']=="image/png"){
                  $img=imagecreatefrompng($_FILES['image']['tmp_name']);
               }else{
                  $_SESSION['TOASTR_MSG']=array(
                     'type'=>'error',
                     'body'=>'Only select jpg or png image',
                     'title'=>'Error',
                  );
               }
               if(isset($img)){
                  if (($_FILES["image"]["size"] > 1000000)) {//2000000 = 2Mb
                     $_SESSION['TOASTR_MSG']=array(
                        'type'=>'error',
                        'body'=>'Image size exceeds 1 MB',
                        'title'=>'Error',
                     );
                  }else{
                     $id="NPKKGS".substr(strtoupper(md5(uniqid())),0,4);;
                     $insert_id=$id;
                     $code=rand(111111,999999);
                     $image=time().'.jpg';
                     imagejpeg($img,UPLOAD_APPLICANT_IMAGE.$image,100);
                     $sql="INSERT INTO `applicants`(`id`, `first_name`,`last_name`,  `class_roll`, `roll`, `fName`, `mName`, `phoneNumber`, `presentAddress`, `permanentAddress`, `dob`, `gender`, `religion`, `birthId`, `quota`, `bloodGroup`, `examRoll`, `merit`, `localGuardianName`, `localGuardianNid`, `password`, `email`, `code`, `image`, `last_notification`,`class`,`fNid`,`mNid`,`final_submit`, `status`) 
                           VALUES ('$id','$first_name','$last_name','','$roll','$f_name','$m_name','$phone_number','$present_address','$permanent_address','$dob','$gender','$religion','$birthID','$quota','$blood_group','$roll','','$local_guardian_name','$local_guardian_nid','$password','$email','$code','$image','','$class','$f_nid','$m_nid','0','0')";
                     if(mysqli_query($con,$sql)){
                        $_SESSION['TOASTR_MSG']=array(
                           'type'=>'success',
                           'body'=>'An OTP has been sent to your '.$phone_number.'. Please Verify your Phone number & login.',
                           'title'=>'Success',
                        );
                        $otp=rand(1111,9999);
                        $_SESSION['MOBILE_OTP']=$otp;
                        $_SESSION['MOBILE_NUMBER']=$phone_number;
                        $_SESSION['APPLICATION_ID']=$insert_id;
                        $sms="Dear $first_name, $otp is your OTP for your application. Application ID: $insert_id";
                        $sms_status=send_sms_greenweb($phone_number,$sms);
                        if($sms_status=='sent'){
                           redirect("apply-otp-verification");
                        }else{
                           $_SESSION['TOASTR_MSG']=array(
                              'type'=>'error',
                              'body'=>'Sms Sending error!',
                              'title'=>'Error',
                           );
                        }
                        // echo send_email($email,'Your otp is '. $otp,'Otp email');
                        // redirect("apply-otp-verification");
                     }else{
                        echo $sql;
                        $_SESSION['TOASTR_MSG']=array(
                           'type'=>'error',
                           'body'=>'Something Went wrong!',
                           'title'=>'Error',
                        );
                     }
                  }
               }
            }else{
                $_SESSION['TOASTR_MSG']=array(
                  'type'=>'warning',
                  'body'=>'Only select jpg or png image',
                  'title'=>'Error',
                );
            }
         }
         // else{
         //    $sql="update `applicants` set  `first_name`='$first_name',`last_name`='$last_name',  `roll`='$roll',`fName`='$f_name',`fNid`='$f_nid',`mName`='$m_name',`mNid`='$m_nid',`phoneNumber`='$phone_number',`presentAddress`='$present_address',`permanentAddress`='$permanent_address',`dob`='$dob',`gender`='$gender',`religion`='$religion',`birthId`='$birthID',`quota`='$quota',`bloodGroup`='$blood_group',`legalGuardianName`='$local_guardian_name',`localGuardianNid`='$localGuardianNid',`image`='$image', `email`='$email' , `dept_id`='$dept_id' where  id='$id'";
         //    mysqli_query($con,$sql);
         // }
      }
   }?>
<div class="breadcrumb-bar">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-12">
            <div class="breadcrumb-list">
               <nav aria-label="breadcrumb" class="page-breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index">Home</a></li>
                     <li class="breadcrumb-item" style="color:#ff5364">Apply</li>
                     <li class="breadcrumb-item">Mobile number verification</li>
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
                     <h3 align="center">Basic Informations</h3>
                     <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-lg-12 row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $first_name?>" name="first_name" id="first_name"  class="form-control" placeholder="Enter your first Name" required>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $last_name?>" name="last_name" id="last_name" class="form-control"  placeholder="Enter your last Name">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12 row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="text" autocomplete="off" name="dob" id="dob"  value="<?php echo $dob?>" class="form-control air-datepicker" placeholder="dd/mm/yyyy" required>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-select select" name="gender" id="gender" required>
                                       <option selected disabled>Select Gender</option>
                                       <?php
                                          $data=[
                                                'name'=>[
                                                   'Male',
                                                   'Female',
                                                   'Other',
                                                ]
                                             ];
                                          $count=count($data['name']);
                                          for($i=0;$i<$count;$i++){
                                             if($data['name'][$i]==$gender){
                                                   echo "<option selected='selected' value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                             }else{
                                                   echo "<option value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                             }                                                        
                                          }
                                          ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12 row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                       <span class="input-group-text" id="verifyEmailOTP"  >+88</span>
                                       <input required type="text" autocomplete="off" pattern="^(?:(?:\+|00)88|01)?(?:\d{11}|\d{13})$" title="Please enter correct format and length. ex: 017xxxxxx" name="phone_number"  value="<?php echo $phone_number?>" id="phone_number" class="form-control" placeholder="Applicant's Phone Number ex: 017xxxx">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Birth Certificate Number <span class="text-danger">*</span></label>
                                    <input required type="number" autocomplete="off" name="birthID" id="birthID" value="<?php echo $birthID?>" class="form-control" placeholder="Birth Certificate Number">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" autocomplete="off" name="email" id="email" value="<?php echo $email?>" class="form-control" placeholder="Enter email">
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
      <!-- start -->
      <div class="container">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
               <div class="sell-course-head comman-space">
                     <h3 align="center">Admission Details</h3>
                        <div class="col-lg-12 row">
                        <div class="col-lg-12 row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Class <span class="text-danger">*</span></label>
                                 <select class="form-select select" name="class" id="class" required>
                                    <option selected disabled>Select Class</option>
                                    <?php
                                       $res=mysqli_query($con,"SELECT * FROM `class` where status='1'");
                                       while($row=mysqli_fetch_assoc($res)){
                                          if($row['id']==$class){
                                                echo "<option selected='selected' value=".$row['id'].">".$row['name']."</option>";
                                          }else{
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                          }                                                        
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Quota</label>
                                 <select class="form-select select" name="quota" id="quota">
                                    <option selected value='N/A'>Select quota</option>
                                    <?php
                                       $data=[
                                             'name'=>[
                                                'N/A',
                                                'FF',
                                             ]
                                       ];
                                       $count=count($data['name']);
                                       for($i=0;$i<$count;$i++){
                                          if($data['name'][$i]==$quota){
                                                echo "<option selected='selected' value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                          }else{
                                                echo "<option value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                          }                                                        
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                                    <select class="form-select select" name="blood_group" id="bloodgroup"  value="<?php echo $blood_group?>">
                                       <option selected disabled>Select Bloodgroup</option>
                                       <?php
                                          $data=[
                                             'name'=>[
                                                'A+',
                                                'A-',
                                                'B+',
                                                'B-',
                                                'AB+',
                                                'AB-',
                                                'O+',
                                                'O-',
                                             ]
                                          ];
                                          $count=count($data['name']);
                                          for($i=0;$i<$count;$i++){
                                             if($data['name'][$i]==$blood_group){
                                                   echo "<option selected='selected' value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                             }else{
                                                   echo "<option value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                             }                                                        
                                          }
                                          ?>
                                    </select>
                                 </div>
                              </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Religion <span class="text-danger">*</span></label>
                                 <select class="form-select select" name="religion" id="religion" required>
                                    <option selected disabled>Select Religion</option>
                                    <?php
                                       $data=[
                                             'name'=>[
                                                   'Islam',
                                                   'Hinduism',
                                                   'Christian',
                                                   'Buddhism',
                                                   'Other',
                                             ]
                                          ];
                                          $count=count($data['name']);
                                          for($i=0;$i<$count;$i++){
                                             if($data['name'][$i]==$religion){
                                                   echo "<option selected='selected' value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                             }else{
                                                   echo "<option value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                             }                                                        
                                          }
                                       ?>
                                 </select>
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
      <!-- start -->
      <div class="container">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3 align="center"> Gardian Details</h3>
                        <div class="col-lg-12 row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Father's Name <span class="text-danger">*</span></label>
                                 <input type="text" name="f_name" required value="<?php echo $f_name?>" id="f_name" class="form-control" placeholder="Enter your father's Name">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Father's NID <span class="text-danger">*</span></label>
                                 <input type="text" name="f_nid" required value="<?php echo $f_nid?>" id="f_nid" class="form-control" placeholder="Enter your father's NID number">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Mother's Name <span class="text-danger">*</span></label>
                                 <input type="text" required name="m_name" value="<?php echo $m_name?>" id="m_name" class="form-control" placeholder="Enter your mother's Name">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Mother's NID <span class="text-danger">*</span></label>
                                 <input type="text" name="m_nid" required value="<?php echo $m_nid?>" id="m_nid" class="form-control" placeholder="Enter your mother's NID number">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Local Guardian's Name</label>
                                 <input type="text" name="local_guardian_name"  value="<?php echo $local_guardian_name?>" id="f_name" class="form-control" placeholder="Local Guardian's Name">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Local Guardian's NID</label>
                                 <input type="text" name="localGuardianNid"  value="<?php echo $local_guardian_nid?>" id="f_nid" class="form-control" placeholder="Local Guardian's NID">
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end -->
      <!-- start -->
      <div class="container">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3 align="center"> Address</h3>
                        <div class="col-lg-12 row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label">Present Address <span class="text-danger">*</span></label>
                                 <input type="text" required name="present_address" id="present_address"  value="<?php echo $present_address?>"class="form-control" placeholder="Present address">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label">Permanent Address <span class="text-danger">*</span></label>
                                 <input type="text" required name="permanent_address" id="permanent_address" value="<?php echo $permanent_address?>" class="form-control" placeholder="Permanent address">
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end -->
      <!-- start -->
      <div class="container">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
               <div class="col-md-12">
               <div class="settings-widget">
                  <div class="settings-inner-blk p-0">
                     <div class="sell-course-head comman-space row">
                        <h3 align="center">Applicant's Photo</h3>
                        <div class="row">
                           <div class="col-lg-6 error" id="result" align="center">
                              <p >Image Preview</p>
                              <img class="image-preview" src="<?php if(isset($img)){echo $img;}else{echo 'https://dummyimage.com/300x300/fff&text=300x300';}?>" <?php echo $image?> alt="" srcset="">
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Select Photo</label>
                                 <input style="margin-top:20%" name="image" type="file" id="image" required onchange="validateImage(event)">   
                                 <br>
                                 <br>
                                 <span>Photo should be 300 X 300 pixel (width X height) and file size not more than 150 KB. Colour Photo is a must.</span>
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
      <!-- start -->
      <div class="container">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                     <div class="sell-course-head comman-space row">
                        <h3 align="center">Submission</h3>
                           <div>
                              <table class="table table-bordered" style="width:40%;margin:0 auto;">
                              <tr>
                                    <td style="width:10%;">
                                       <img src="<?php echo FRONT_SITE_PATH?>/webadmin/ajax/captcha_gen.php?captchaCode=<?php 
                                                      $random_alpha = md5(rand()); //generation of random string
                                                      /** Genrate a captcha of length 6 */
                                                      $captcha_code = substr($random_alpha, 0, 6);
                                                      echo $captcha_code;?>" id="captcha"/>
                                    </td>
                                    <td  style="width:10%;">
                                       <span class="btn btn-primary" id="refreshCaptcha">Refresh</span>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" style="width:100%;">
                                       <input type="text" required name="captcha_code" placeholder="Enter Captcha Code" class="form-control" autocomplete="off"/>
                                    </td>
                                 </tr>
                              </table>  
                           </div>
                           <div class="payment-btn" style="text-align:center;">
                           <!-- Button trigger modal -->
                           <button type="button" id="pre_submit"  onclick="checDataVerification()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          Are you sure want to submit your application?
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button name="submit" id="submit" class="btn btn-success" type="submit">Submit</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- end modal -->
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
</form>
<?php include("footer.php");?>
<script>

function generateString(length) {


   return result;
}
$('#refreshCaptcha').on({'click': function(){
   var characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   let result = '';
   const charactersLength = characters.length;
   
   for(let i = 0; i <=6 ; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   var captchaCode=result;
   $('#captcha').attr('src','<?php echo FRONT_SITE_PATH?>/webadmin/ajax/captcha_gen.php?captchaCode='+captchaCode);
   }
});
var filename=jQuery("#image").val();
console.log(filename);
function checkImage(){
   if(filename==""){
      toastr["error"]("You have to select image","Image Error");
   }else{
      toastr["success"]("You have to select image","Image Error");
   }
}
function checDataVerification(){
   checkImage();
}
</script>