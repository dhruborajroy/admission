<?php
session_start();
require("connection.inc.php");
require("constant.inc.php");
require("function.inc.php");
require_once("smtp/class.phpmailer.php");

$swl="select * from `applicants`";
$res=mysqli_query($con,$swl);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
		$row['image_base64']="data:image/png;base64,".base64_encode(file_get_contents('../media/users/'.$row['image']));
		$data[]=$row;	
	}
}
echo $json=json_encode($data);
?>