<?php 
include('header.php');
$id="";
$msg="";
$first_name="s";
$last_name="s";
$f_name="s";
$f_nid="24";
$roll="";
$m_name="34";
$m_nid="234";
$phone_number="2343".rand(22,2322);
$present_address="234";
$permanent_address="234";
$dob="30/11/2002";
$gender="Male";
$religion="Hinduism";
$birth_Id="234342";
$quota="N/A";
$bloodGroup="A+";
$local_guardian_name="Dhrubo";
$local_guardian_nid="34".rand(22,2322);
$email="ksdn@ldmv.csk".rand(22,2322);
$image="";
$class="1";
$fOccupation="1";
$required='required';
$readonly="";
if(isset($_GET['id']) && $_GET['id']!=""){
	$id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from applicants where id='$id'");
	if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $roll=$row['roll'];
        $f_name=$row['fName'];
        $f_nid=$row['fNid'];
        $m_name=$row['mName'];
        $m_nid=$row['mNid'];
        $phone_number=$row['phoneNumber'];
        $present_address=$row['presentAddress'];
        $permanent_address=$row['permanentAddress'];
        $dob=$row['dob'];
        $gender=$row['gender'];
        $religion=$row['religion'];
        $birth_Id=$row['birthId'];
        $quota=$row['quota'];
        $bloodGroup=$row['bloodGroup'];
        $local_guardian_name=$row['localGuardianName'];
        $local_guardian_nid=$row['localGuardianNid'];
        $email=$row['email'];
        $image=$row['image'];
        $class=$row['class'];
        $required='';
        $readonly="disabled";
    }else{
        $_SESSION['TOASTR_MSG']=array(
           'type'=>'error',
           'body'=>'You don\'t have the permission to access that location!',
           'title'=>'Error',
        );
        redirect('index.php');
    }
}
if(isset($_POST['submit'])){
    $first_name=ucfirst(get_safe_value($_POST['first_name']));
    $last_name=ucfirst(get_safe_value($_POST['last_name']));
    $f_name=ucfirst(get_safe_value($_POST['f_name']));
    $f_nid=ucfirst(get_safe_value($_POST['f_nid']));
    $m_name=ucfirst(get_safe_value($_POST['m_name']));
    $m_nid=ucfirst(get_safe_value($_POST['m_nid']));
    if($readonly!=="disabled"){
        $phone_number=get_safe_value($_POST['phone_number']);
        $email=get_safe_value($_POST['email']);
        $gender=get_safe_value($_POST['gender']);
        $birth_Id=get_safe_value($_POST['birth_Id']);
        $class=get_safe_value($_POST['class']);
        $dob=get_safe_value($_POST['dob']);
        $quota=get_safe_value($_POST['quota']);
        $blood_group=get_safe_value($_POST['blood_group']);
    }
    $present_address=get_safe_value($_POST['present_address']);
    $permanent_address=get_safe_value($_POST['permanent_address']);
    $local_guardian_name=get_safe_value($_POST['local_guardian_name']);
    $local_guardian_nid=get_safe_value($_POST['local_guardian_nid']);
    $time=time();
    if($id==''){
        if(mysqli_num_rows(mysqli_query($con,"select id from applicants where phoneNumber='$phone_number'"))){
            $msg="Phone number is already added";
        }elseif(mysqli_num_rows(mysqli_query($con,"select id from applicants where email='$email'"))){
            $msg="Email is already added";
        }else{
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
                    if (($_FILES["image"]["size"] > 300000)) {//2000000 = 2Mb
                        $_SESSION['TOASTR_MSG']=array(
                           'type'=>'error',
                           'body'=>'Image size exceeds 300 kb',
                           'title'=>'Error',
                        );
                    }else{
                        $id=PREFIX.substr(strtoupper(md5(uniqid())),0,4);
                        $roll=date('y').rand(1111,9999);
                        $password=rand(111111,999999);
                        $image=$id."_".time().'.jpg';
                        imagejpeg($img,UPLOAD_APPLICANT_IMAGE.$image);
                        $code='';
                        $sql="INSERT INTO `applicants`(`id`, `first_name`,`last_name`,   `roll`, `fName`, `mName`, `phoneNumber`, `presentAddress`, `permanentAddress`, `dob`, `gender`, `religion`, `birthId`, `quota`, `bloodGroup`, `examRoll`, `merit`, `localGuardianName`, `localGuardianNid`, `password`, `email`, `code`, `image`, `last_notification`,`class`,`fNid`,`mNid`,`final_submit`, `status`) 
                        VALUES ('$id','$first_name','$last_name','$roll','$f_name','$m_name','$phone_number','$present_address','$permanent_address','$dob','$gender','$religion','$birth_Id','$quota','$blood_group','$roll','','$local_guardian_name','$local_guardian_nid','$password','$email','$code','$image','','$class','$f_nid','$m_nid','0','0')";
                        if(mysqli_query($con,$sql)){
                            $_SESSION['TOASTR_MSG']=array(
                               'type'=>'success',
                               'body'=>'Applicants ',
                               'title'=>'Error',
                            );
                            redirect("applicants");
                        }else{
                            $_SESSION['TOASTR_MSG']=array(
                               'type'=>'error',
                               'body'=>'SQL Error',
                               'title'=>'Error',
                            );
                            echo $sql;
                        }
                    }
                }
            }else{
                $_SESSION['TOASTR_MSG']=array(
                   'type'=>'error',
                   'body'=>'Only select jpg or png image',
                   'title'=>'Error',
                );
            }
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
                    $_SESSION['TOASTR_MSG']=array(
                       'type'=>'error',
                       'body'=>'Only select jpg or png image',
                       'title'=>'Error',
                    );
                }
                if(isset($img)){
                    if (($_FILES["image"]["size"] > 300000)) {//2000000 = 2Mb
                        $_SESSION['TOASTR_MSG']=array(
                           'type'=>'error',
                           'body'=>'Image size exceeds 200 kb',
                           'title'=>'Error',
                        );
                    }else{
                        $image=$id."_".time().'.jpg';
                        imagejpeg($img,UPLOAD_APPLICANT_IMAGE.$image);
                        // echo $sql="update `applicants` set  `first_name`='$first_name', `last_name`='$last_name', `class`='$class',`fName`='$f_name',`fNid`='$f_nid',`mName`='$m_name',`mNid`='$m_nid',`phoneNumber`='$phone_number',`presentAddress`='$present_address',`permanentAddress`='$permanent_address',`dob`='$dob',`gender`='$gender',`religion`='$religion',`birthId`='$birth_Id',`quota`='$quota',`bloodGroup`='$blood_group',`image`='$image', `email`='$email' where md5(id)='$id'";
                        $sql="update `applicants` set  `first_name`='$first_name', `last_name`='$last_name', `fName`='$f_name',`fNid`='$f_nid',`mName`='$m_name',`mNid`='$m_nid',`presentAddress`='$present_address',`permanentAddress`='$permanent_address',`image`='$image' where md5(id)='$id'";
                        if(mysqli_query($con,$sql)){
                            $_SESSION['TOASTR_MSG']=array(
                               'type'=>'success',
                               'body'=>'Applicants Data updated Successfully',
                               'title'=>'Error',
                            );
                            redirect("applicants");
                        }else{
                            $_SESSION['TOASTR_MSG']=array(
                               'type'=>'error',
                               'body'=>'SQL Error',
                               'title'=>'Error',
                            );
                            echo $sql;
                        }
                    }
                }
            }else{
                $_SESSION['TOASTR_MSG']=array(
                   'type'=>'error',
                   'body'=>'Only select jpg or png image',
                   'title'=>'Error',
                );
            }
        }else{
            $sql="update `applicants` set  `first_name`='$first_name', `last_name`='$last_name', `fName`='$f_name',`fNid`='$f_nid',`mName`='$m_name',`mNid`='$m_nid',`presentAddress`='$present_address',`permanentAddress`='$permanent_address',`image`='$image' where md5(id)='$id'";
            if(mysqli_query($con,$sql)){
                $_SESSION['TOASTR_MSG']=array(
                   'type'=>'success',
                   'body'=>'Applicants Data updated Successfully',
                   'title'=>'Error',
                );
                redirect("applicants");
            }else{
                $_SESSION['TOASTR_MSG']=array(
                   'type'=>'error',
                   'body'=>'SQL Error',
                   'title'=>'Error',
                );
                echo $sql;
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
                        <input class="form-control" placeholder="First Name" name="first_name" id="first_name" type="text"
                            value="<?php echo $first_name?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Last Name *</label>
                        <input class="form-control" placeholder="Last Name" name="last_name" id="last_name" type="text"
                            value="<?php echo $last_name?>" required>
                    </div>
                    <?php if($readonly!=""){?>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Exam Roll *</label>
                        <input <?php echo $readonly?> class="form-control" placeholder="Student's ID" name="roll" id="roll" type="number"
                            value="<?php echo $roll?>" required>
                    </div>
                    <?php }?>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Father's Name *</label>
                        <input class="form-control" placeholder="Father's Name" autocomplete="off" name="f_name"
                            value="<?php echo $f_name?>" id="f_name" type="text" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Father's NID *</label>
                        <input class="form-control" placeholder="Father's NID" autocomplete="off"
                            name="f_nid" value="<?php echo $f_nid?>" type="text" required id="f_nid">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mother's Name *</label>
                        <input class="form-control" placeholder="Mother's Name" autocomplete="off" name="m_name"
                            type="text" required value="<?php echo $m_name?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mother's NID *</label>
                        <input class="form-control" placeholder="Father's NID" autocomplete="off"
                            name="m_nid" value="<?php echo $m_nid?>" type="text" required id="m_nid">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Phone Number *</label>
                        <input <?php echo $readonly?> class="form-control"  placeholder="Phone Number" autocomplete="off" name="phone_number"
                            type="tel" required value="<?php echo $phone_number?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Email *</label>
                        <input <?php echo $readonly?> class="form-control" placeholder="Email" autocomplete="off" name="email" type="email"
                            required value="<?php echo $email?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Present Address*</label>
                        <input class="form-control" placeholder="Present Address" autocomplete="off"
                            name="present_address" type="text" required value="<?php echo $present_address?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Permanent Address *</label>
                        <input class="form-control" placeholder="Permanent Address" autocomplete="off"
                            name="permanent_address" type="text" required value="<?php echo $permanent_address?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Date of Birth *</label>
                        <input <?php echo $readonly?> name="dob" value="<?php echo $dob?>" type="text" placeholder="dd/mm/yyyy"
                            class="form-control air-datepicker" data-position="bottom right" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Birth certificate Id number *</label>
                        <input <?php echo $readonly?> class="form-control" placeholder="Birth certificate Id number" autocomplete="off"
                            name="birth_Id" type="number" required value="<?php echo $birth_Id?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Gender *</label>
                        <select class="select2" name="gender" required <?php echo $readonly?>>
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
                        <select class="form-control select2" name="blood_group" <?php echo $readonly?>>
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
                        <select class="select2" name="religion" required <?php echo $readonly?>>
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
                        <select class="form-control select2" name="class" <?php echo $readonly?>>
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
                        <select class="select2" name="quota" required <?php echo $readonly?>>
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
                        <label>Legal Guardian Name</label>
                        <input class="form-control" placeholder="Legal Guardian Name" autocomplete="off"
                            name="local_guardian_name" type="text" value="<?php echo $local_guardian_name?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Legal Guardian NID</label>
                        <input class="form-control" placeholder="Legal Guardian NID" autocomplete="off"
                            name="local_guardian_nid" type="text" required
                            value="<?php echo $local_guardian_nid?>">
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