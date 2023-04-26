<?php 
include('header.php');
$msg="";
$id="";
$name='';
$fname='';
$fOccupation='';
$mname='';
$mOccupation='';
$phoneNumber='';
$presentAddress='';
$permanentAddress='';
$required='required';
$paymentStatus='';
$dob='';
$gender='';
$religion='';
$birthId='';
$bloodGroup='';
$examRoll='';
$legalGuardianName='';
$legalGuardianRelation='';
$image='';
$email='';
$merit='';
$block='';
$room_number='';
$batch='';
$deptId="";
if(isset($_GET['id']) && $_GET['id']!=""){
	$id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from applicants where md5(id)='$id'");
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
        $required='';
    }else{
        $_SESSION['TOASTR_MSG']=array(
           'type'=>'error',
           'body'=>'You don\'t have the permission to access that location!',
           'title'=>'Error',
        );
        // redirect('index.php');
    }
}
if(isset($_POST['submit'])){
	$name=ucfirst(get_safe_value($_POST['name']));
	$class_roll=get_safe_value($_POST['roll']);
	$fName=ucfirst(get_safe_value($_POST['fName']));
	$fOccupation=get_safe_value($_POST['fOccupation']);
	$mName=ucfirst(get_safe_value($_POST['mName']));
	$mOccupation=get_safe_value($_POST['mOccupation']);
	$phoneNumber=get_safe_value($_POST['phoneNumber']);
	$presentAddress=get_safe_value($_POST['presentAddress']);
	$permanentAddress=get_safe_value($_POST['permanentAddress']);
	$dob=get_safe_value($_POST['dob']);
	$gender=get_safe_value($_POST['gender']);
	$religion=get_safe_value($_POST['religion']);
	$birthId=get_safe_value($_POST['birthId']);
	$bloodGroup=get_safe_value($_POST['bloodGroup']);
	$examRoll=get_safe_value($_POST['examRoll']);
	$merit=get_safe_value($_POST['merit']);
	$room_number=get_safe_value($_POST['room_number']);
	$block=get_safe_value($_POST['block']);
	$legalGuardianName=get_safe_value($_POST['legalGuardianName']);
	$legalGuardianRelation=get_safe_value($_POST['legalGuardianRelation']);
	$email=get_safe_value($_POST['email']);
    $ffQuata=get_safe_value($_POST['ffQuata']);
    $dept_id=get_safe_value($_POST['dept_id']);
    $batch=get_safe_value($_POST['batch']);
    $time=time();
    if(mysqli_num_rows(mysqli_query($con,"select id from users where phoneNumber='$phoneNumber'"))){
        $msg="Phone number is already added";
    }elseif(mysqli_num_rows(mysqli_query($con,"select id from users where email='$email'"))){
        $msg="Email is already added";
    }else{
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
                    $msg= "Only select jpg or png image";
                }
                if(isset($img)){
                    // if ($width > "300" || $height > "200"){
                    //     echo "Image dimension should be within 300X200";
                    // }
                    // else
                    if (($_FILES["image"]["size"] > 300000)) {//2000000 = 2Mb
                        $msg= "Image size exceeds 300 kb";
                    }else{
                        $roll=date('y').rand(1111,9999);
                        $password=password_hash("12345678",PASSWORD_DEFAULT);
                        $image=time().'.jpg';
                        move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_STUDENT_IMAGE.$image);
                        $sql="INSERT INTO `users` (`name`, `roll`, `class_roll`,`fName`, `fOccupation`, `mName`, `mOccupation`, `phoneNumber`, `presentAddress`, `permanentAddress`, `dob`, `gender`, `religion`, `birthId`,`ffQuata`, `bloodGroup`,  `examRoll`, `merit`,`block`,`room_number`, `legalGuardianName`, `legalGuardianRelation`, `image`,`email`,`dept_id`,`batch`,`password`, `last_notification`,`meal_status`,`full_month_on`,`guest_meal`,`meal_request_status`,`meal_request_pending`,`guest_meal_request_status`,`guest_meal_request_pending`,`role`,`status`)
                                                VALUES ( '$name', '$roll','$class_roll','$fName', '$fOccupation', '$mName', '$mOccupation', '$phoneNumber','$presentAddress','$permanentAddress','$dob','$gender','$religion','$birthId','$ffQuata','$bloodGroup','$examRoll','$merit','$block', '$room_number','$legalGuardianName','$legalGuardianRelation','$image','$email','$dept_id','$batch','$password','$time',0,1, 0,0,0,0,0,1, 1)";
                        send_email($email,"Your account has been created. Your password is <b>12345678 </b>. Please login and change your password <br> http://localhost/hall/students/ ","Account Created");
                        mysqli_query($con,$sql);
                        $_SESSION['INSERT']=1;
                        redirect("users.php");
                    }
                }
            }else{
                $msg= "Only select jpg or png image";
            }
        }else{
                if($_FILES['image']['name']!=''){
                    $info=getimagesize($_FILES['image']['tmp_name']);
                    // $width = $info[0];
                    // $height = $info[1];
                    if(isset($info['mime'])){
                        if($info['mime']=="image/jpeg"){
                            $img=imagecreatefromjpeg($_FILES['image']['tmp_name']);
                        }elseif($info['mime']=="image/png"){
                            $img=imagecreatefrompng($_FILES['image']['tmp_name']);
                        }else{
                            $msg= "Only select jpg or png image";
                        }
                        if(isset($img)){
                            // if ($width > "300" || $height > "200"){
                            //     echo "Image dimension should be within 300X200";
                            // }
                            // else
                            if (($_FILES["image"]["size"] > 300000)) {//2000000 = 2Mb
                                $msg= "Image size exceeds 200 kb";
                            }else{
                                $image=time().'.jpg';
                                // $image=imagejpeg($img,$image,40);
                                move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_STUDENT_IMAGE.$image);
                                $sql="update `users` set  `name`='$name',`class_roll`='$class_roll', `fName`='$fName',`fOccupation`='$fOccupation',`mName`='$mName',`mOccupation`='$mOccupation',`phoneNumber`='$phoneNumber',`permanentAddress`='$permanentAddress',`dob`='$dob',`gender`='$gender',`religion`='$religion',`batch`='$batch',`birthId`='$birthId',`ffQuata`='$ffQuata',`bloodGroup`='$bloodGroup',`examRoll`='$examRoll',`merit`='$merit',`legalGuardianName`='$legalGuardianName',`legalGuardianRelation`='$legalGuardianRelation',`image`='$image', `email`='$email', `dept_id`='$dept_id', `room_number`='$room_number', `block`='$block',`meal_request_status`='0'  where md5(id)='$id'";
                                mysqli_query($con,$sql);
                                $_SESSION['UPDATE']=1;
                                redirect("users.php");
                            }
                        }
                    }else{
                        $msg= "Only select jpg or png image";
                    }
                }else{
                    $sql="update `users` set  `name`='$name', `class_roll`='$class_roll',`fName`='$fName',`fOccupation`='$fOccupation',`mName`='$mName',`mOccupation`='$mOccupation',`phoneNumber`='$phoneNumber',`permanentAddress`='$permanentAddress',`dob`='$dob',`gender`='$gender',`religion`='$religion',`batch`='$batch',`birthId`='$birthId',`ffQuata`='$ffQuata',`bloodGroup`='$bloodGroup',`examRoll`='$examRoll',`merit`='$merit',`legalGuardianName`='$legalGuardianName',`legalGuardianRelation`='$legalGuardianRelation',`image`='$image', `email`='$email' , `dept_id`='$dept_id' ,`meal_request_status`='0', `room_number`='$room_number', `block`='$block' where  md5(id)='$id'";
                    mysqli_query($con,$sql);
                    $_SESSION['UPDATE']=1;
                    // redirect("users.php");
                }
            }
    }
}
?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Students</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Student Admit Form</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->

    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Manage Details</h3>
                    <br>
                    <?php echo $msg?>
                </div>
            </div>
            <form class="new-added-form" id="validate" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>First Name *</label>
                        <input class="form-control" placeholder="First Name" name="name" id="name" type="text"
                            value="<?php echo $first_name?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Last Name *</label>
                        <input class="form-control" placeholder="Last Name" name="name" id="name" type="text"
                            value="<?php echo $last_name?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Exam Roll *</label>
                        <input class="form-control" placeholder="Student's ID" name="roll" id="roll" type="number"
                            value="<?php echo $roll?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Father's Name *</label>
                        <input class="form-control" placeholder="Father's Name" autocomplete="off" name="fName"
                            value="<?php echo $f_name?>" id="fName" type="text" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Father's Occupation *</label>
                        <input class="form-control" placeholder="Father's Occupation" autocomplete="off"
                            name="fOccupation" value="<?php echo $fOccupation?>" type="text" required id="fOccupation">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mother's Name *</label>
                        <input class="form-control" placeholder="Mother's Name" autocomplete="off" name="mName"
                            type="text" required value="<?php echo $m_name?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mother's Occupation *</label>
                        <input class="form-control" placeholder="Mother's Occupation" autocomplete="off"
                            name="mOccupation" type="text" required value="<?php echo $mOccupation?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Phone Number *</label>
                        <input class="form-control"  placeholder="Phone Number" autocomplete="off" name="phoneNumber"
                            type="tel" required value="<?php echo $phoneNumber?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Email *</label>
                        <input class="form-control" placeholder="Email" autocomplete="off" name="email" type="email"
                            required value="<?php echo $email?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Present Address*</label>
                        <input class="form-control" placeholder="Present Address" autocomplete="off"
                            name="presentAddress" type="text" required value="<?php echo $presentAddress?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Permanent Address *</label>
                        <input class="form-control" placeholder="Permanent Address" autocomplete="off"
                            name="permanentAddress" type="text" required value="<?php echo $permanentAddress?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Date of Birth *</label>
                        <input name="dob" value="<?php echo $dob?>" type="text" placeholder="dd/mm/yyyy"
                            class="form-control air-datepicker" data-position="bottom right" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Birth certificate Id number *</label>
                        <input class="form-control" placeholder="Birth certificate Id number" autocomplete="off"
                            name="birthId" type="number" required value="<?php echo $birthId?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Gender *</label>
                        <select class="select2" name="gender" required>
                            <option>Please Select Gender </option>
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
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Blood Group *</label>
                        <select class="form-control select2" name="bloodGroup">
                            <option>Select Blood Group</option>
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
                                if($data['name'][$i]==$bloodGroup){
                                    echo "<option selected='selected' value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                }else{
                                    echo "<option value=".$data['name'][$i].">".$data['name'][$i]."</option>";
                                }                                                        
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Religion *</label>
                        <select class="select2" name="religion" required>
                            <option>Please Select Religion </option>
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
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Class *</label>
                        <select class="form-control select2" name="class">
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
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label> Quota *</label>
                        <select class="select2" name="quota" required>
                            <option>Please Select Quota </option>
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
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Merit</label>
                        <input class="form-control" placeholder="Last Exam Result" autocomplete="off" name="merit"
                            type="text" required value="<?php echo $merit?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Legal Guardian Name</label>
                        <input class="form-control" placeholder="Legal Guardian Name" autocomplete="off"
                            name="legalGuardianName" type="text" value="<?php echo $legalGuardianName?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Legal Guardian Relation</label>
                        <input class="form-control" placeholder="Legal Guardian Relation" autocomplete="off"
                            name="legalGuardianRelation" type="text" required
                            value="<?php echo $legalGuardianRelation?>">
                    </div>
                    <div class="col-lg-6 col-12 form-group">
                        <div class="col-sm-12 img-body">
                            <div class="center">
                                <div class="form-input">
                                    <div class="preview">
                                        <img id="file_ip_1-preview" <?php if($image!=''){
                                                    echo 'src="'.STUDENT_IMAGE.$image.'"';}
                                                    ?> style="width:200px;height: 200px">
                                    </div>
                                    <label for="file_ip_1">Upload Image</label>
                                    <input type="file" name="image" id="file_ip_1" accept="image/*"
                                        onchange="showPreview(event);" <?php echo $required?>
                                        value="<?php echo $image?>">
                                </div>
                            </div>
                            <script type="text/javascript">
                            function showPreview(event) {
                                if (event.target.files.length > 0) {
                                    var src = URL.createObjectURL(event.target.files[0]);
                                    var preview = document.getElementById("file_ip_1-preview");
                                    preview.src = src;
                                    preview.style.display = "block";
                                }
                            }
                            </script>
                        </div>

                    </div>
                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" name="submit"
                            class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        <!-- <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Admit Form Area End Here -->

    <?php include('footer.php');?>