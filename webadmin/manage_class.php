<?php include("header.php");
$id="";
$name="";
$apply_last_date="";
$msg="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from `class` where id='$id'");
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $apply_last_date=$row['apply_last_date'];
    }else{
        $_SESSION['PERMISSION_ERROR']=1;
        redirect("index.php");
    }
}
if(isset($_POST['submit'])){
	$name=get_safe_value($_POST['name']);
	$apply_last_date=get_safe_value($_POST['apply_last_date']);
   if($id==''){
        $sql="INSERT INTO `class` ( `name`,`apply_last_date`, `status`) VALUES 
                                    ( '$name', '$apply_last_date', '1')";
        if(mysqli_query($con,$sql)){
            $_SESSION['INSERT']=1;
            $msg="Done";
        }else{
            $msg="Something Went wrong";
        }
    }else{
        $updated_on=time();
        $sql="update `class` set  `name`='$name',`apply_last_date`='$apply_last_date' where id='$id'";
        if(mysqli_query($con,$sql)){
            $_SESSION['UPDATE']=1;
            $msg="Done";
        }else{
            $msg="Something Went wrong";
        }
    }
    // echo $sql;
    redirect('./classes');
}

?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Class board</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>classs </li>
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
                            <h3>Create A classs</h3>
                            <?php echo $msg?>
                        </div>
                    </div>
                    <form id="validate" class="new-added-form" method="post">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Class Name</label>
                                <input type="text" required placeholder="Ex: Seven" class="form-control" name="name" id="name"
                                    value="<?php echo $name?>">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Last Date of Apply</label>
                                <input type="text" required placeholder="dd/mm/yyyy" name="apply_last_date" value="<?php echo $apply_last_date?>" class="form-control air-datepicker" data-position="bottom right">
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