<?php 
session_start();
// session_regenerate_id();
include('../inc/function.inc.php');
include('../inc/connection.inc.php');
include('../inc/constant.inc.php');
require_once("../inc/smtp/class.phpmailer.php");
$msg="";
// if(isset($_SESSION['ADMIN_LOGIN'])){
//     redirect('index.php');
// }
// if(isset($_POST['submit'])){
   	// $password=get_safe_value($_POST['password']);
   	// echo $sql="SELECT mark.* ,sum(mark) as total, RANK() OVER(ORDER BY sum(mark) DESC,mark desc,id desc) as `rank` FROM mark group by exam_roll";
	$sql="SELECT mark.*,sum(mark.mark) as total_mark FROM `mark` group by exam_roll order by sum(mark.mark) desc, exam_roll desc,mark.mark DESC";
    $res=mysqli_query($con,$sql);
    $i=1;
    while($row=mysqli_fetch_assoc($res)){
        // pr($row);
        $exam_roll=$row['exam_roll'];
        $rank_sql="update applicants set merit='$i' where examRoll='$exam_roll'";
        if(mysqli_query($con,$rank_sql)){
            echo "Rank Generated";
        }
        $i++;
    }
// }
?>