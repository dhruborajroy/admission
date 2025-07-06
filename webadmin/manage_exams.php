<?php include("header.php");
$id="";
$name="";
$result_published="0";
$msg="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from `exam` where id='$id'");
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $result_published=$row['result_published'];
    }else{
        $_SESSION['PERMISSION_ERROR']=1;
        redirect("index.php");
    }
}
if(isset($_POST['submit'])){
    // pr($_POST);
	$name=get_safe_value($_POST['name']);
    if(isset($_POST['result_published'])){
    	$result_published=get_safe_value($_POST['result_published']);
        $result_published=1;
    }
   if($id==''){
        $sql="INSERT INTO `exam` ( `name`,`result_published`, `status`) VALUES 
                                    ( '$name','$result_published', '1')";
        if(mysqli_query($con,$sql)){
            $_SESSION['INSERT']=1;
            $msg="Done";
        }else{
            $msg="Something Went wrong";
        }
    }else{
        $updated_on=time();
        $sql="update `exam` set  `name`='$name',`result_published`='$result_published' where id='$id'";
        if(mysqli_query($con,$sql)){
            $_SESSION['UPDATE']=1;
            $msg="Done";
        }else{
            $msg="Something Went wrong";
        }
    }
    // echo $sql;
    redirect('./exams');
}

?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Notice board</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Exams </li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- Add Notice Area Start Here -->
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Create A Exams</h3>
                            <?php echo $msg?>
                        </div>
                    </div>
                    <form id="validate" class="new-added-form" method="post">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Exam Name</label>
                                <input type="text" required placeholder="Ex: Admission Test 2025" class="form-control" name="name" id="name"
                                    value="<?php echo $name?>">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group row">
                                    <div class="col-5-xxxl col-lg-5 col-12 form-group">
                                        <label>Publish Result</label>
                                        <input class="form-control" name="result_published"  <?php echo $result_published == '1' ? 'checked' : ''; ?>  type="checkbox">
                                    </div>
                                </div>
                            <div class="col-12 form-group mg-t-8">
                                <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"
                                    name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add Notice Area End Here -->
    </div>
    <?php include("footer.php")?>