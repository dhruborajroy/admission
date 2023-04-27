
         <footer class="footer d-print-none">
            <div class="footer-top">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                        <div class="footer-widget footer-about">
                           <div class="footer-logo">
                              <img src="assets/img/logo.svg" alt="logo">
                           </div>
                           <div class="footer-about-content">
                              <p><?php echo $site_short_details?></p>
                              
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-6">
                        <div class="footer-widget footer-menu">
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-6">
                        <div class="footer-widget footer-menu">
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="footer-widget footer-contact">
                           <h2 class="footer-title">Address</h2>
                           <div class="footer-contact-info">
                              <div class="footer-address">
                                 <img src="assets/img/icon/icon-20.svg" alt="" class="img-fluid">
                                 <p> <?php echo $site_address?><br></p>
                              </div>
                              <p>
                                 <img src="assets/img/icon/icon-19.svg" alt="" class="img-fluid">
                                 <a href="mailto:<?php echo $site_email?>" class="__cf_email__" ><?php echo $site_email?></a>
                              </p>
                              <p class="mb-0">
                                 <img src="assets/img/icon/icon-21.svg" alt="" class="img-fluid">
                                 <?php echo $site_phone?>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-bottom">
               <div class="container">
                  <div class="copyright">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="privacy-policy">
                              <ul>
                                 <li><a href="term-condition.html">Terms</a></li>
                                 <li><a href="privacy-policy.html">Privacy</a></li>
                                 <li>Pay With  <img src="https://logos-download.com/wp-content/uploads/2022/01/BKash_Logo-700x287.png" alt="" width="50px"></li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="copyright-text">
                              <p class="mb-0">&copy; 2018-<?php echo date("Y")." ".NAME?>. All rights reserved.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="assets/plugins/feather/feather.min.js"></script>
      <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
      <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
      <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
      <script src="assets/plugins/apexchart/chart-data.js"></script>
      <script src="assets/js/datepicker.min.js"></script>
      <script src="assets/js/toastr.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="assets/plugins/dropzone/dropzone.min.js"></script>
      <script src="assets/js/md5.min.js"></script>
      <script src="assets/js/script.js"></script>
      <script>
         var x=1;
         function validateImage(event){
            var image=document.getElementById('image');
            var filename=image.value;
            if((event.target.files[0].size)/1024>=155){
               image.value="";
               jQuery("#photo").val(0);
               $("#submit").prop("disabled", true);
               toastr["error"]("Please select the photo size less than 150kb","Error");
               return false;
            }else{
               if(filename!=''){
                  var extdot=filename.lastIndexOf(".")+1;
                  var ext=filename.substr(extdot,filename.lenght).toLowerCase();
                  if(ext=="jpg" || ext=="png" || ext=="jpeg"){
                     document.getElementById('result').innerHTML='';
                     if(x==2){
                        document.getElementById('result').innerHTML="";
                        x=1;
                     }
                     const imageSize = 300; // size in pixels
                     const img = new Image();
                     var src=URL.createObjectURL(event.target.files[0]);
                     img.src=src;
                     img.onload = function() {
                        if (this.width === imageSize && this.height === imageSize) {
                           x=2;
                           jQuery("#photo").val(1);
                           document.getElementById('result').innerHTML='<img class="image-preview"  src="'+src+'"/>';
                        } else {
                           jQuery("#photo").val(0);
                           // x=1;
                           image.value="";
                           document.getElementById('result').innerHTML='<img class="image-preview"  src="https://dummyimage.com/300x300/fff&text=300x300"/>';
                           toastr["error"]("Image size is invalid. Please choose an image with dimensions 300x300.", "Image Error");
                           console.log("Image size is invalid. Please choose an image with dimensions 300x300.");
                        }
                     };
                     $("#submit").prop("disabled", false);
                  }else{
                     jQuery("#photo").val(0);
                     $("#submit").prop("disabled", false);
                     document.getElementById('result').innerHTML='Please select only jpg and png file';
                  }
               }else{
                  toastr["Error"]("You have to select image", "Image Error");
               }
            }
            var filename=image.value;
            if(filename==""){
               toastr["Error"]("You have to select image", "Image Error");
            }
         }
         //info
         //warning
         //success
         //error
         function toastrMsg(msgType,title,body){
            toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "30",
                  "hideDuration": "1000",
                  "timeOut": "30000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
            }
            toastr[msgType](body, title);
            }
            var captcha_value=document.getElementById("captcha_value").value;
            // console.log(captcha_value);
      </script>
   </body>
</html>
<?php
if(isset($_SESSION['TOASTR_MSG'])){?>
   <script>
      toastrMsg('<?php echo $_SESSION['TOASTR_MSG']['type']?>',"<?php echo $_SESSION['TOASTR_MSG']['body']?>","<?php echo $_SESSION['TOASTR_MSG']['title']?>");
   </script>
<?php 
unset($_SESSION['TOASTR_MSG']);
}
?>