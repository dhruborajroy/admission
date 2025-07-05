<?php 
include('header.php');
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	// if($type=='delete'){
	// 	mysqli_query($con,"delete from applicants where id='$id'");
	// 	redirect('bus.php');
	// }
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
        $sql="update users set status='$status' where id='$id'";
		mysqli_query($con,$sql);
        $_SESSION['UPDATE']=1;
        redirect('./users.php');
	}

}
$sql="select applicants.*,bkash_online_payment.user_id from applicants,bkash_online_payment where bkash_online_payment.user_id=applicants.id and bkash_online_payment.status='Completed' order by id desc";
$res=mysqli_query($con,$sql);
?>
<!-- Page Area Start Here -->
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Applicants</h3>
            <ul>
                <li>
                    <a href="index">Home</a>
                </li>
                <li>All Applicants</li>
            </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Applicants</h3>
                </div>
                <div class="dropdown show">
                    <div class="col-12 form-group mg-t-8">
                    <a href="../pdfreports/student-details">
                                <button type="submit"
                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Print Applicant's Data</button>
                        </a>
                        <a href="../pdfreports/generate_rank">
                                <button type="submit"
                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Generate Merit List</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Father's Name</th>
                            <th>Merit</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if(mysqli_num_rows($res)>0){
                        $i=1;
                        while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <tr role="row" class="odd">
                            <td class="sorting_1 dtr-control"><?php echo $i?></td>
                                <td class="sorting_1 dtr-control">
                            <a href="<?php echo STUDENT_IMAGE.$row['image']?>" target="_blank" style="text-decoration:none;"><img class="rounded-circle w-75" src="<?php echo STUDENT_IMAGE.$row['image']?>"
                                    alt="student">
                            </a></td>
                            <td class="sorting_1 dtr-control"><?php echo $row['first_name'].' '.$row['last_name']?></td>
                            <td class="sorting_1 dtr-control"><?php echo $row['roll']?></td>
                            <td class="sorting_1 dtr-control"><?php echo $row['fName']?></td>
                            <td class="sorting_1 dtr-control"><?php echo addOrdinalNumberSuffix($row['merit'])?></td>
                            <td class="sorting_1 dtr-control"><?php echo $row['phoneNumber']?></td>
                            <td class="sorting_1 dtr-control"><?php echo $row['email']?></td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php if($row['status']=='1'){?>
                                            <a class="dropdown-item" href="?id=<?php echo $row['id']?>&type=deactive"><i
                                                    class="fas fa-times text-orange-red"></i>Deactivate</a>
                                        <?php }else{?>
                                            <a class="dropdown-item" href="?id=<?php echo $row['id']?>&type=active"><i
                                                    class="fas fa-times text-orange-red"></i>Active</a>
                                        <?php }?>
                                        <a class="dropdown-item"
                                            href="manageStudentProfile.php?id=<?php echo $row['id']?>"><i
                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                        <!-- <a class="dropdown-item" href="#"><i
                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a> -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php 
                           $i++;
                           } } else { ?>
                        <tr>
                            <td colspan="5">No data found</td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Teacher Table Area End Here -->
    <?php include('footer.php');?>