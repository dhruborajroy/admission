
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
<?php 
include('header.php');
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
<!-- Page Area Start Here -->
<div class="dashboard-content-one">
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Subjects</h3>
        <ul>
            <li>
                <a href="index">Home</a>
            </li>
            <li>All Subjects</li>
        </ul>
</div>
<!-- Breadcubs Area End Here -->
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
</div>
<?php include('footer.php');?>