
<?php 
   session_start();
   // session_regenerate_id();
   require('../inc/constant.inc.php');
   require('../inc/connection.inc.php');
   require('../inc/function.inc.php');
   require_once("../inc/smtp/class.phpmailer.php");
   isAdmin();
if(isset($_GET['id']) && $_GET['id']!=""){
    $id=get_safe_value($_GET['id']);
    $sql="SELECT * FROM `applicants` where id='$id'";
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
        // redirect("index");
    }
}else{
   $_SESSION['TOASTR_MSG']=array(
      'type'=>'error',
      'body'=>'You don\'t have the permission to access the location!',
      'title'=>'Error',
   );
//    redirect("index");
}

?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Get Admitted Online | Developed by Dhrubo</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      <!-- Normalize CSS -->
      <link rel="stylesheet" href="css/normalize.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="css/main.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="css/all.min.css">
      <!-- Flaticon CSS -->
      <link rel="stylesheet" href="fonts/flaticon.css">
      <!-- Full Calender CSS -->
      <link rel="stylesheet" href="css/fullcalendar.min.css">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="css/animate.min.css">
      <!-- Select 2 CSS -->
      <link rel="stylesheet" href="css/select2.min.css">
      <!-- Data Table CSS -->
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <!-- Date Picker CSS -->
      <link rel="stylesheet" href="css/datepicker.min.css">
      <!-- font awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/fontawesome.min.css" />
      <!-- summernote -->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
      <!-- Toastr CSS -->
      <link rel="stylesheet" href="css/toastr.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/custom.css">
      <link rel="stylesheet" href="css/invoice.css">
      <!-- Modernize js -->
      <script src="js/modernizr-3.6.0.min.js"></script>

        <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
        </style>
   </head>
<!-- Page Area Start Here -->
<div class="dashboard-content-one">
<!-- Teacher Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
    <!-- Teacher Table Area End Here -->
    <div class="container">
    <div class="col-md-12">
    <div class="settings-widget mt-3">
        <div class="settings-inner-blk p-0">
            <div class="sell-course-head comman-space">
                <h3 align="center">Basic Informations</h3>
                <table width="100%">
                <tr>
                <td align="center"><img style="border-radius: 15px;width: 80%;max-width: 300px;max-height: 300px;box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;" src="../media/users/<?php echo $image?>" alt="preview image" width="300px" height="300px"></td>
                </tr>
                </table>
                <table id="customers" class="mt-5">
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
                        <td><?php echo $id?></td>
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
                <table id="customers">
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
                <table id="customers" width="100%">
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
                <table id="customers">
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
</div><!-- Footer Area Start Here -->
<footer class="footer-wrap-layout1">
    <div class="copyright">© Copyrights <a href="#">Get Admitted Online Engineering College </a> 2018-<?php echo date('Y')?>.| P-1102 | V-1.1.2 |
        All rights reserved. Developed by Dhrubo</div>
</footer>
<!-- Footer Area End Here -->
</div>
</div>
<!-- Page Area End Here -->
</div>
<!-- jquery-->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Counterup Js -->
<script src="js/jquery.counterup.min.js"></script>
<!-- Moment Js -->
<script src="js/moment.min.js"></script>
<!-- Waypoints Js -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Scroll Up Js -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- Full Calender Js -->
<script src="js/fullcalendar.min.js"></script>
<!-- Select 2 Js -->
<script src="js/select2.min.js"></script>
<!-- Date Picker Js -->
<script src="js/datepicker.min.js"></script>
<!-- Chart Js -->
<script src="js/Chart.min.js"></script>
<!-- Scroll Up Js -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- Data Table Js -->
<script src="js/jquery.dataTables.min.js"></script>
<!-- validate JS -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- Custom Js -->
<script src="js/toastr.min.js"></script>
<!-- sweet alert JS -->
<script src="./js/sweetalert.min.js"></script>
<!-- summernote editor -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!--  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Custom Js -->
<script src="js/main.js"></script>
<script src="js/custom.php"></script>
<script src="js/validation.php"></script>

</body>

</html>