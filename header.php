<?php 
session_start();
//session_regenerate_id();
require("./inc/connection.inc.php");
require("./inc/constant.inc.php");
require("./inc/function.inc.php");
require_once("./inc/smtp/class.phpmailer.php");
// if(!isset($_SESSION['APPLICANT_LOGIN'])){
//     redirect('login');
// }

$swl="select * from `site_details` where id=1";
$res=mysqli_query($con,$swl);
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    $site_name=$row['name'];
    $site_email=$row['email'];
    $site_address=$row['address'];
    $site_phone=$row['phone'];
    $site_facebook_link=$row['facebook_link'];
    $site_twitter_link=$row['twitter_link'];
    $site_youtube_link=$row['youtube_link'];
    $site_instagram_link=$row['instagram_link'];
    $site_short_details=$row['short_details'];
}else{
    $site_name="";
    $site_email="";
    $site_address="";
    $site_phone="";
    $site_facebook_link="";
    $site_twitter_link="";
    $site_youtube_link="";
    $site_instagram_link="";
    $site_short_details="";
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title><?php echo NAME." || ".TAGLINE?></title>
      <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg"> -->
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/feather.css">
      <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">      
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="assets/plugins/slick/slick.css">
      <link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">
      <link rel="stylesheet" href="assets/plugins/aos/aos.css">
      <link rel="stylesheet" href="assets/css/toastr.min.css">
      <link rel="stylesheet" href="assets/css/datepicker.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body class="pop-modal">
      <div class="main-wrapper pop-modal" >
         <header class="header header-page d-print-none">
            <div class="header-fixed">
               <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
                  <div class="container ">
                     <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        </span>
                        </a>
                        <a href="index" class="navbar-brand logo">
                        <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                        </a>
                     </div>
                     <div class="main-menu-wrapper">
                        <div class="menu-header">
                           <a href="index" class="menu-logo">
                              <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                           </a>
                              <a id="menu_close" class="menu-close" href="javascript:void(0);">
                              <i class="fas fa-times"></i>
                           </a>
                        </div>
                        <ul class="main-nav">
                           <li>
                              <a href="index">Home</a>
                           </li>
                           <?php if(isset($_SESSION['APPLICANT_ID'])){?>
                           <li>
                              <a href="dashboard">Dashboard</a>
                           </li>
                           <?php }else{?>
                           <!-- <li>
                              <a href="apply">Apply</a>
                           </li> -->
                           <li>
                              <a href="complete_payment">Complete Payment</a>
                           </li>
                           <?php }?>
                        </ul>
                     </div>
                     <ul class="nav header-navbar-rht">
                     <?php if(isset($_SESSION['APPLICANT_ID'])){?>
                        <li class="nav-item user-nav">
                           <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                              <span class="user-img">
                                 <img src="./media/users/<?php echo $_SESSION['IMAGE']?>" alt="">
                                    <span class="status online"></span>
                              </span>
                           </a>
                           <div class="users dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end">
                              <div class="user-header">
                                 <div class="avatar avatar-sm">
                                    <img src="./media/users/<?php echo $_SESSION['IMAGE']?>" alt="User Image" class="avatar-img rounded-circle">
                                 </div>
                                 <div class="user-text">
                                    <h6><?php echo  $_SESSION['APPLICANT_NAME']?></h6>
                                    <p class="text-muted mb-0"></p>
                                 </div>
                              </div>
                              <a class="dropdown-item" href="dashboard"><i class="feather-home me-1"></i> Dashboard</a>
                              <a class="dropdown-item" href="profile"><i class="feather-star me-1"></i> Edit Profile</a>
                              <a class="dropdown-item" href="logout"><i class="feather-log-out me-1"></i> Logout</a>
                           </div>
                        </li>
                     <?php }else{?>
                        <li >
                           <a class="nav-link header-login" href="login">Login</a>
                           </li>
                        <li class="nav-item">
                           <a class="nav-link header-sign" href="apply">Apply Now</a>
                        </li>
                     <?php }?>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>