<?php
session_start();
require("connection.inc.php");
require("constant.inc.php");
require("function.inc.php");
require_once("smtp/class.phpmailer.php");

$swl="select * from `applicants`";
$res=mysqli_query($con,$swl);
$data=array();
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
		$row['image']="data:image/jpeg;base64,".base64_encode(file_get_contents('../media/users/1711381508.jpg'));
		$data[]=$row;	
	}
}
echo $json=json_encode($data);
// echo base64_encode(file_get_contents('../media/users/1711381508.jpg'));
// echo $row['image_base64'];

//$json1=json_decode($json,1);
// echo $json1[0]['image']
?>
