
               <!-- navbar started -->
                  <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                     <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                           <div class="profile-bg">
                              <img src="assets/img/instructor-profile-bg.jpg" alt="">
                              <div class="profile-img">
                                 <a href="dashboard"><img src="./media/users/<?php echo $_SESSION['IMAGE']?>" alt=""></a>
                              </div>
                           </div>
                           <div class="profile-group">
                              <div class="profile-name text-center">
                                 <h4><a href="dashboard"><?php echo $_SESSION['APPLICANT_NAME']?></a></h4>
                                 <!-- <p>Student</p> -->
                              </div>
                              <!-- <div class="go-dashboard text-center">
                                 <a href="pdfreports/admit" class="btn btn-primary">Download Admit Card</a>
                              </div> -->
                           </div>
                        </div>
                     </div>
                     <div class="settings-widget account-settings">
                        <div class="settings-menu">
                           <h3>DASHBOARD</h3>
                           <ul>
                              <!-- active is a optional parameter for selecting menu -->
                              <li class="nav-item ">
                                 <a href="dashboard" class="nav-link <?php echo $dashboard_active?>" >
                                 <i class="feather-home"></i> My Dashboard
                                 </a>
                              </li>
                           </ul>
                           <div class="instructor-title">
                              <h3>ACCOUNT SETTINGS</h3>
                           </div>
                           <ul>
                              <li class="nav-item">
                                 <a href="profile" class="nav-link  <?php echo $profile_active?>">
                                 <i class="feather-settings"></i> Profile
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="payments" class="nav-link  <?php echo $payments_active?>">
                                 <i class="feather-dollar-sign"></i> Payment
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="logout" class="nav-link">
                                 <i class="feather-power"></i> Sign Out
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               <!-- navbar ended -->