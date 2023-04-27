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
$sql="select * from subjects order by id desc";
$res=mysqli_query($con,$sql);
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
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Subjects</h3>
            </div>
            <div class="dropdown show">
                <div class="col-12 form-group mg-t-8">
                    <a href="manage_subjects"> <button type="submit"
                            class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add new Subject</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Subject Code</th>
                        <th>Full Mark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(mysqli_num_rows($res)>0){
                    $i=1;
                    while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1 dtr-control"><?php echo $row['name']?></td>
                        <td class="sorting_1 dtr-control"><?php echo $row['sub_code']?></td>
                        <td class="sorting_1 dtr-control"><?php echo $row['full_mark']?></td>
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
                                        href="manage_subjects?id=<?php echo $row['id']?>"><i
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