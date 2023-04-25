<?php
   include("header.php");
   $display="";
   $class="1";
   $id="";
   $msg="";
   $first_name="d";
   $last_name="d";
   $f_name="d";
   $m_name="d";
   $phone_number="3".rand(111,999);
   $email="projects.dhrubo@gmail.com";//.rand(111,999);
   $blood_group="A+";
   $present_address="s";
   $gender="Male";
   $permanent_address="d";
   $dob="30/11/2002";
   $quota="N/A";
   $password="m";
   $religion="Hinduism";
   $code="";
   $f_nid="s";
   $m_nid="s";
   $local_guardian_name="sd";
   $local_guardian_nid="s";
   $image="";
   $birthID="2344";
   if(isset($_POST['submit'])){
      // pr($_POST);
      // pr($_FILES);
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
      $password=password_hash($password,PASSWORD_DEFAULT);
   	$religion=get_safe_value($_POST['religion']);
      if(mysqli_num_rows(mysqli_query($con,"select id from applicants where phoneNumber='$phone_number'"))>0){
         $_SESSION['TOASTR_MSG']=array(
            'type'=>'error',
            'body'=>'Phone number is already added',
            'title'=>'Error',
         ); 
      }elseif(mysqli_num_rows(mysqli_query($con,"select id from applicants where email='$email'"))>0){
         $class='class="alert alert-danger"'; 
         $_SESSION['TOASTR_MSG']=array(
            'type'=>'error',
            'body'=>'Email is already added',
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
                     $id=uniqid();
                     $insert_id=$id;
                     $code=rand(111111,999999);
                     $image=time().'.jpg';
                     imagejpeg($img,UPLOAD_APPLICANT_IMAGE.$image,100);
                     $sql="INSERT INTO `applicants`(`id`, `first_name`,`last_name`,  `class_roll`, `roll`, `fName`, `mName`, `phoneNumber`, `presentAddress`, `permanentAddress`, `dob`, `gender`, `religion`, `birthId`, `quota`, `bloodGroup`, `examRoll`, `merit`, `localGuardianName`, `localGuardianNid`, `password`, `email`, `code`, `image`, `last_notification`,`class`,`fNid`,`mNid`,`final_submit`, `status`) 
                           VALUES ('$id','$first_name','$last_name','','$roll','$f_name','$m_name','$phone_number','$present_address','$permanent_address','$dob','$gender','$religion','$birthID','$quota','$blood_group','$roll','','','','$password','$email','$code','$image','','$class','$f_nid','$m_nid','0','0')";
                     // send_email($email,'Your account has been created. <a href="'.FRONT_SITE_PATH.'/verify?email='.$email.'&code='.md5($code).'">Verify Email</a>','Account Created');
                     if(mysqli_query($con,$sql)){
                        $_SESSION['TOASTR_MSG']=array(
                           'type'=>'success',
                           'body'=>'An Email has been sent to your '.$email.' account. Please Verify your email & login.',
                           'title'=>'Success',
                        );
                        redirect("preview.php?application_id=".$insert_id);
                     }else{
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
                     <li class="breadcrumb-item" aria-current="page">Apply</li>
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
                                    <label class="form-control-label">First Name</label>
                                    <input type="text" value="<?php echo $first_name?>" name="first_name" id="first_name"  class="form-control" placeholder="Enter your first Name" required>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Last Name</label>
                                    <input type="text" value="<?php echo $last_name?>" name="last_name" id="last_name" class="form-control"  placeholder="Enter your last Name">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12 row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Date of Birth</label>
                                    <input type="text" autocomplete="off" name="dob" id="dob"  value="<?php echo $dob?>" class="form-control air-datepicker" placeholder="dd/mm/yyyy">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select select" name="gender" id="gender" >
                                       <option>Select Gender</option>
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
                                 <label class="form-control-label">Phone Number</label>
                                 <div class="input-group mb-3">
                                    <input type="text" autocomplete="off" pattern="^(?:(?:\+|00)88|01)?(?:\d{11}|\d{13})$" title="Please enter correct format and length. ex: 017xxxxxx" name="phone_number"  value="<?php echo $phone_number?>" id="phone_number" class="form-control" placeholder="Phone Number">
                                    <span class="input-group-text sendOtpButton"  onclick="sendMobileOTP()" id="basic-addon1" style="cursor: pointer;background: #ff5364;
                                       border: 1px solid #ff5364;
                                       color: #fff;
                                       padding: 12px 15px;">Send OTP</span>
                                    <input type="hidden" id="mobile_otp_send_status" value="0">
                                 </div>
                                 <span id="phone_number_error" style="color:red;"></span>
                              </div>
                              <div class="col-lg-6" id="mobile_otp_box" style="display:none;">
                                 <label class="form-control-label">Verify OTP</label>
                                 <div class="input-group mb-3">
                                    <input type="hidden" id="mobile_otp_verify_status" value="0">
                                    <input type="text" class="form-control" placeholder="Enter Mobile OTP" id="mobile_otp">
                                    <span class="input-group-text" id="verifyMobileOTP" onclick="verifyMobileOTP()"  style="cursor: pointer;background: #ff5364;
                                       border: 1px solid #ff5364;
                                       color: #fff;
                                       padding: 12px 15px;background: #ff5364;
                                       border: 1px solid #ff5364;
                                       color: #fff;
                                       padding: 12px 15px;">Submit OTP</span>
                                 </div>
                                 <span id="mobile_otp_error" style="color:red;"></span>
                              </div>
                           </div>
                           <div class="col-lg-12 row">
                              <div class="col-lg-6">
                                 <label class="form-control-label">Email</label>
                                 <div class="input-group mb-3">
                                    <input type="email" autocomplete="off" value="<?php echo $email?>" id="email" class="form-control" placeholder="Enter Email">
                                    <span class="input-group-text sendEmailOtpButton"  onclick="sendEmailOTP()" id="basic-addon1" style="cursor: pointer;background: #ff5364;
                                    border: 1px solid #ff5364;
                                    color: #fff;
                                    padding: 12px 15px;background: #ff5364;
                                    border: 1px solid #ff5364;
                                    color: #fff;
                                    padding: 12px 15px;">Send OTP</span>
                                 </div>
                                 <span id="email_error" style="color:red;"></span>
                              </div>
                              <div class="col-lg-6" id="email_otp_box" style="display:none;">
                                 <label class="form-control-label">Verify OTP</label>
                                 <div class="input-group mb-3">
                                    <input type="hidden" id="email_otp_verify_status" value="0">
                                    <input type="text" class="form-control" placeholder="Enter Email OTP" id="email_otp">
                                    <span class="input-group-text" id="verifyEmailOTP" onclick="verifyEmailOTP()"  style="cursor: pointer;background: #ff5364;
                                    border: 1px solid #ff5364;
                                    color: #fff;
                                    padding: 12px 15px;background: #ff5364;
                                    border: 1px solid #ff5364;
                                    color: #fff;
                                    padding: 12px 15px;">Submit OTP</span>
                                 </div>
                                 <span id="email_otp_error" style="color:red;"></span>
                              </div>
                              <div class="col-lg-6">
                                 <span id="email_error"></span>
                              </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Birth Certificate Number</label>
                                    <input type="number" autocomplete="off" name="birthID" id="birthID" value="<?php echo $birthID?>" class="form-control" placeholder="Birth Certificate Number">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="form-control-label">Birth Certificate Number</label>
                                    <input type="number" autocomplete="off" name="birthID" id="birthID" value="<?php echo $birthID?>" class="form-control" placeholder="Birth Certificate Number">
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
                                 <label class="form-label">Class</label>
                                 <select class="form-select select" name="class" id="class">
                                    <option>Select Class</option>
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
                                    <option>Select quota</option>
                                    <?php
                                       $data=[
                                             'name'=>[
                                                'N/A',
                                                'FF',
                                                'TR',
                                                'DI',
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
                                    <label class="form-label">Blood Group</label>
                                    <select class="form-select select" name="blood_group" id="bloodgroup"  value="<?php echo $blood_group?>">
                                       <option>Select Bloodgroup</option>
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
                                 <label class="form-label">Gender</label>
                                 <select class="form-select select" name="religion" id="religion">
                                    <option>Select Religion</option>
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
                                 <label class="form-control-label">Father's Name</label>
                                 <input type="text" name="f_name"  value="<?php echo $f_name?>" id="f_name" class="form-control" placeholder="Enter your father's Name">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Father's NID</label>
                                 <input type="text" name="f_nid"  value="<?php echo $f_nid?>" id="f_nid" class="form-control" placeholder="Enter your father's NID number">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Mother's Name</label>
                                 <input type="text" name="m_name" value="<?php echo $m_name?>" id="m_name" class="form-control" placeholder="Enter your mother's Name">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-control-label">Mother's NID</label>
                                 <input type="text" name="m_nid"  value="<?php echo $m_nid?>" id="m_nid" class="form-control" placeholder="Enter your mother's NID number">
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
                                 <label class="form-control-label">Present Address</label>
                                 <input type="text" name="present_address" id="present_address"  value="<?php echo $present_address?>"class="form-control" placeholder="Present address">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-control-label">Permanent Address</label>
                                 <input type="text" name="permanent_address" id="permanent_address" value="<?php echo $permanent_address?>" class="form-control" placeholder="Permanent address">
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
                                 <input style="margin-top:20%" name="image"  align="center" type="file" id="image" required onchange="validateImage(event)">   
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
                                    <td colspan="3" style="width:10%;">
                                       <img src="<?php echo FRONT_SITE_PATH?>/webadmin/ajax/captcha_gen.php?captchaCode=<?php 
                                                      $random_alpha = md5(rand()); //generation of random string
                                                      /** Genrate a captcha of length 6 */
                                                      $captcha_code = substr($random_alpha, 0, 6);
                                                      echo $captcha_code;?>" id="captcha"/>
                                    </td>
                                    <td colspan="3" style="width:10%;">
                                       <span class="btn btn-primary" id="refreshCaptcha">Refresh</span>
                                    </td>
                                    <td colspan="3" style="width:30%;">
                                       <input type="text" name="captcha_code" placeholder="Enter Captcha Code" class="form-control" autocomplete="off"/>
                                    </td>
                                 </tr>
                              </table>  
                           </div>
                           <div class="payment-btn" style="text-align:center;">
                           <!-- Button trigger modal -->
                           <button type="button"  onclick="checkMobileAndEmailVerification()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
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