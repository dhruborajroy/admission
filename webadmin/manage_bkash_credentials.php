<?php 
include("header.php");
$id="";
$username="";
$password="";
$app_key="";
$app_secret="";
$form_amount="1";
$base_url="https://tokenized.pay.bka.sh/v1.2.0-beta";
$msg="";
$id=1;
// if(isset($_GET['id']) && $_GET['id']>0){
	// $id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from `bkash_credentials` where id='$id'");
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $username=$row['username'];
        $password=$row['password'];
        $app_key=$row['app_key'];
        $app_secret=$row['app_secret'];
        $base_url=$row['base_url'];
        $form_amount=$row['amount'];
    }else{
        $_SESSION['PERMISSION_ERROR']=1;
        redirect("index.php");
    }
// }
if(isset($_POST['submit'])){
    // pr($_POST);
	$username=get_safe_value($_POST['username']);
	$password=get_safe_value($_POST['password']);
	$app_key=$_POST['app_key'];
	$app_secret=$_POST['app_secret'];
	$form_amount=$_POST['form_amount'];
	$base_url=$_POST['base_url'];


    $sql="update `bkash_credentials` set  `username`='$username', `password`='$password',`app_key`='$app_key',`app_secret`='$app_secret',`base_url`='$base_url',`amount`='$form_amount' where id='1'";

    // $sql="INSERT INTO `bkash_credentials` ( `username`, `password`, `app_key`, `app_secret`, `base_url`) VALUES 
    //                             ( '$username', '$password','$app_key', '$app_secret', '$base_url')";
    if(mysqli_query($con,$sql)){
        $_SESSION['INSERT']=1;
        $msg="Done";
    }else{
        $msg="Something Went wrong";
    }

    // echo $sql;
    redirect('manage_bkash_credentials');
}

?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Bkash Credentials</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Manage Bkash Credentials </li>
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
                            <h3>Manage Bkash Credentials</h3>
                            <?php echo $msg?>
                        </div>
                    </div>
                    <form id="validate" class="new-added-form" method="post">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Form Amount</label>
                                <input type="text" required placeholder="Enter Form Amount" class="form-control" name="form_amount" id="form_amount"
                                    value="<?php echo $form_amount?>" min="1">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Username</label>
                                <input type="text" required placeholder="Username" class="form-control" name="username" id="username"
                                    value="<?php echo $username?>">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Password</label>
                                <input type="text" required placeholder="Password" class="form-control" name="password" id="password"
                                    value="<?php echo $password?>">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>App key</label>
                                <input type="text" required placeholder="App Key" class="form-control" name="app_key" id="app_key"
                                    value="<?php echo $app_key?>">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>App Secret</label>
                                <input type="text" required placeholder="App Secret" class="form-control" name="app_secret" id="app_secret"
                                    value="<?php echo $app_secret?>">
                            </div>
                            <div class="col-3">
                                <label>Mode <span class="text-danger">*</span></label>
                                <select name="base_url" class="select2">
                                    <option value="0" disabled selected>Select Mode</option>
                                    <?php
                                    $data = [
                                        'name' => [
                                            'Sandbox' => 'https://tokenized.sandbox.bka.sh/v1.2.0-beta',
                                            'Live' => 'https://tokenized.pay.bka.sh/v1.2.0-beta',
                                        ]
                                    ];

                                    foreach($data['name'] as $key => $value){
                                        if($value == $base_url){
                                            echo "<option selected='selected' value='".$value."'>".$key."</option>";
                                        } else {
                                            echo "<option value='".$value."'>".$key."</option>";
                                        }
                                    }
                                    ?>
                                </select>
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